<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getMonthlyBookings(Request $request)
    {
        $year = $request->input('year', Carbon::now()->year);

        $bookings = Booking::whereYear('created_at', $year)
            ->with('user', 'tutor')
            ->get()
            ->groupBy(function ($booking) {
                return Carbon::parse($booking->created_at)->format('m');
            });

        $monthlyBookings = [];

        foreach ($bookings as $month => $monthBookings) {
            $monthlyBookings[(int) $month] = [
                'total' => $monthBookings->count(),
                'list' => $monthBookings->map(function ($booking) {
                    return [
                        'id' => $booking->id,
                        'date' => $booking->created_at->toDateString(),
                        'start_at' => $booking->start_at,
                        'end_at' => $booking->end_at,
                        'type' => $booking->type,
                        'tutor' => $booking->tutor ? $booking->tutor : null,
                        'user' => $booking->user ? $booking->user : null,
                    ];
                }),
            ];
        }

        return response()->json($monthlyBookings);
    }
}
