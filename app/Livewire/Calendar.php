<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Calendar extends Component
{
    public $weekOffset = 0;
    public $bookings = [];
    public $currentWeek;

    public function mount()
    {
        $this->loadBookings();
    }

    public function loadBookings()
    {
        $startOfWeek = now()->startOfWeek()->addWeeks($this->weekOffset);
        $endOfWeek = now()->endOfWeek()->addWeeks($this->weekOffset);

        if(auth('web')->user()){
            $bookings = Booking::where('user_id', auth()->id())
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->with('user')
            ->get();
        }else{
            $bookings = Booking::where('tutor_id', auth()->id())
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->with('user')
            ->get();
        }
        

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
        $this->weekOffset--;
        $this->loadBookings();
    }

    public function nextWeek()
    {
        $this->weekOffset++;
        $this->loadBookings();
    }

    public function render()
    {
        return view('livewire.student.calendar')->layout('app');
    }
}
