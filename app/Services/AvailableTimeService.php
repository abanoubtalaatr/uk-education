<?php

namespace App\Services;

use App\Models\Tutor;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Label84\HoursHelper\Facades\HoursHelper;

class AvailableTimeService extends Controller
{
    public function availableTime($day, $tutorId)
    {
        $tutor = Tutor::find($tutorId);
        $currentDate = Carbon::now()->format('Y-m-d');
        $currentTime = Carbon::now();

        if ($day < $currentDate) {
            return [
                'message' => "Not exist time ",
                
            ];
        }

        $dayName = strtolower(Carbon::parse($day)->format('l'));
        $dayTime = $tutor->slots()->where('day', $dayName)->first();

        if (is_null($dayTime)) {
            return [
                'message' => "This day is off",
            ];
        }

        $start_time = Carbon::createFromTimeString($dayTime->start_time);
        $end_time = Carbon::createFromTimeString($dayTime->end_time);

        if ($day == $currentDate && $start_time->lessThanOrEqualTo($currentTime)) {
            $start_time = $currentTime;
        }

        if ($currentTime->greaterThan($end_time)) {
            return [];
        }

        $service_time = 120;

        $bookedTimes = Booking::where('tutor_id', $tutor->id)
            ->whereDate('date', $day)
            ->get()
            ->map(function ($booking) {
                return [
                    Carbon::parse($booking->start_at)->format('H:i'),
                    Carbon::parse($booking->end_at)->format('H:i')
                ];
            })
            ->toArray();

        $bookedTimes = array_merge(...$bookedTimes);

        if ($tutor->break_time_from && $tutor->break_time_to) {
            $break = [Carbon::parse($tutor->break_time_from)->format('H:i'), Carbon::parse($tutor->break_time_to)->format('H:i')];

            $breakStartTime = Carbon::parse($tutor->break_time_from);
            $breakEndTime = Carbon::parse($tutor->break_time_to)->addMinute();

            if (count($bookedTimes) == 2 && $start_time->format('H:i') == $bookedTimes[0]) {
                $start_time = Carbon::parse($bookedTimes[1])->addMinutes(1);
            }

            $slotsBeforeBreak = HoursHelper::create($start_time, $breakStartTime, $service_time, 'H:i', array_chunk(array_merge($break, $bookedTimes), 2))
                ->values()
                ->all();

            $slotsAfterBreak = HoursHelper::create($breakEndTime, $end_time, $service_time, 'H:i', array_chunk($bookedTimes, 2))
                ->values()
                ->all();

            $filteredSlots = array_merge($slotsBeforeBreak, $slotsAfterBreak);
        } else {
            if (count($bookedTimes) == 2 && $start_time->format('H:i') == $bookedTimes[0]) {
                $start_time = Carbon::parse($bookedTimes[1])->addMinutes(1);
            }

            $filteredSlots = HoursHelper::create($start_time, $end_time, $service_time, 'H:i', array_chunk($bookedTimes, 2))->values()->all();
        }

        return collect($filteredSlots)->map(function ($slot) use ($service_time) {
            $start = Carbon::createFromFormat('H:i', $slot);
            $end = $start->copy()->addMinutes($service_time);
            return $start->format('H:i') . ' - ' . $end->format('H:i');
        })->all();
    }
}
