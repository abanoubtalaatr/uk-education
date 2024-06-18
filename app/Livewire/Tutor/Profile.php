<?php

namespace App\Livewire\Tutor;

use Carbon\Carbon;
use App\Models\Slot;
use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $tutor, $information, $subscriptions, $courses, $mockExams, $crashCourses, $slots = [];
    public $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    public $weekOffset = 0;
    public $bookings = [];
    public $currentWeek;

    public function mount()
    {
        $this->information = auth('tutor')->user()->toArray();
        $this->subscriptions = auth('tutor')->user()->subscriptions;
        $this->courses = auth('tutor')->user()->courses;
        $this->mockExams = auth('tutor')->user()->mockExams;
        $this->crashCourses = auth('tutor')->user()->crashCourses;

        // Initialize $slots
        $this->initializeSlots();
        $this->loadBookings();
    }

    public function loadBookings()
    {
        $tutorId = Auth::id();

        $startOfWeek = now()->startOfWeek()->addWeeks($this->weekOffset);
        $endOfWeek = now()->endOfWeek()->addWeeks($this->weekOffset);

        $bookings = Booking::where('tutor_id', $tutorId)
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->with('user')
            ->get();

        $groupedBookings = [];
        foreach ($bookings as $booking) {
            $dayOfWeek = Carbon::parse($booking->date)->format('l');
            $groupedBookings[$dayOfWeek][] = $booking;
        }

        $this->bookings = $groupedBookings;
        $this->currentWeek = $startOfWeek->format('Y-m-d') . ' To ' . $endOfWeek->format('Y-m-d');
    }
    public function previousWeek()
    {
        logger('Previous week called');
        $this->weekOffset--;
        $this->loadBookings();
    }
    
    public function nextWeek()
    {
        logger('Next week called');
        $this->weekOffset++;
        $this->loadBookings();
    }
    

    public function initializeSlots()
    {
        $allSlots = Slot::whereIn('day', $this->daysOfWeek)->get();

        foreach ($this->daysOfWeek as $day) {
            $slot = $allSlots->where('day', $day)->where('start_time', '!=', null)->where('end_time', '!=', null)->first();

            $this->slots[$day] = [
                'start_time' => $slot ? $slot->start_time : null,
                'end_time' => $slot ? $slot->end_time : null,
                'working' => $slot ? true : false,
            ];
        }
    }

    public function save()
    {
        foreach ($this->daysOfWeek as $day) {
            $slot = $this->slots[$day];

            if ($slot['start_time'] === null && $slot['end_time'] === null) {
                $this->slots[$day]['working'] = false;
            } else {
                $this->slots[$day]['working'] = true;

                Slot::updateOrCreate(
                    ['day' => $day],
                    [
                        'tutor_id' => auth('tutor')->user()->id,
                        'start_time' => $slot['start_time'],
                        'end_time' => $slot['end_time'],
                        'type' => 'work',
                    ]
                );
            }
        }

        session()->flash('message', 'Schedule saved successfully.');
    }

    public function changePassword()
    {
        $user = auth('tutor')->user();

        if (!Hash::check($this->oldPassword, $user->password)) {
            session()->flash('error', 'Old password does not match.');
            return;
        }

        if ($this->newPassword !== $this->rePassword) {
            session()->flash('error', 'New password and retype password do not match.');
            return;
        }

        $user->update(['password' => Hash::make($this->newPassword)]);
        session()->flash('message', 'Password changed successfully.');
    }

    public function render()
    {
        return view('livewire.tutor.profile')->layout('app');
    }
}
