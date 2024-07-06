<?php

namespace App\Livewire\Student;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Outl1ne\NovaSettings\NovaSettings;

class Profile extends Component
{
    public $tutor, $information, $subscriptions, $courses, $mockExams, $crashCourses, $slots = [];
    public $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    public $weekOffset = 0;
    public $bookings = [];
    public $currentWeek;
    public $settings;

    public function mount()
    {
        $this->information = auth('web')->user()->toArray();
        $this->subscriptions = auth('web')->user()->subscriptions;
        $this->courses = auth('web')->user()->courses;
        $this->mockExams = auth('web')->user()->mockExams;
        $this->crashCourses = auth('web')->user()->crashCourses;
        $this->settings = NovaSettings::getSettings();
    }

    public function loadBookings()
    {
        $userId = Auth::id();

        $startOfWeek = now()->startOfWeek()->addWeeks($this->weekOffset);
        $endOfWeek = now()->endOfWeek()->addWeeks($this->weekOffset);

        $bookings = Booking::where('user_id', $userId)
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
    public function render()
    {

        return view('livewire.student.profile')->layout('app');
    }
}
