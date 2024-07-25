<?php

namespace App\Livewire;

use App\Mail\StudentBookingConfirmation;
use App\Mail\TutorBookingNotification;
use App\Models\Tutor;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class BookNowComponent extends Component
{
    public $buttonName = 'Book now', $tutor, $start_at, $end_at, $bookable_type, $bookable_id, $date;

    public function mount($buttonName = null, $date = null, $start_at = null, $end_at = null, $bookable_type = null, $bookable_id = null, $tutor = null)
    {
        if ($buttonName) {
            $this->buttonName = $buttonName;
        }

        $this->start_at = $start_at ?? null;
        $this->end_at = $end_at ?? null;
        $this->bookable_type = $bookable_type ?? null;
        $this->bookable_id = $bookable_id ?? null;
        $this->date = $date ?? null;
        $this->tutor = $tutor ?? null;

    }

    public function bookNow()
    {
        $user = auth('web')->user();
        $tutor = $this->tutor ?? Tutor::find($this->tutor);

        $data['user_id'] = auth('web')->id();
        $data['date'] = $this->date;
        $data['tutor_id'] = $this->tutor;
        $data['start_at'] = $this->start_at;
        $data['end_at'] = $this->end_at;
        $data['bookable_type'] = $this->bookable_type;
        $data['bookable_id'] = $this->bookable_id;

        $booking = (new BookingService())->store($data);

        $bookingDetails = [
            'tutor_name' => $tutor?->name,
            'date' => $this->date,
            'link' => $booking->model?->link,
            'user' => $user,
            'tutor' => $tutor,
            'course_name' => $booking->model?->name, // Assuming title is the course name
        ];

        if (!$booking->date) {
            $booking->update([
                'date' => $booking->model?->date,
                'start_at' => Carbon::parse($booking->model?->date)->format('H:i'),
            ]);
        }

        // Send emails
        Mail::to($user->email)->send(new StudentBookingConfirmation($user, $bookingDetails));
        if ($tutor) {
            Mail::to($tutor->email)->send(new TutorBookingNotification($tutor, $bookingDetails));
        }

        return redirect()->route('student-profile');
    }

    public function render()
    {
        return view('livewire.book-now-component');
    }
}
