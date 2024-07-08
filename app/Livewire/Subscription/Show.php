<?php

namespace App\Livewire\Subscription;

use App\Mail\StudentBookingConfirmation;
use App\Models\Subscription;
use App\Services\BookingService;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Show extends Component
{
    public $subscription;

    public function mount(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    public function bookNow()
    {
        $data['user_id'] = auth('web')->user()->id;

        $data['bookable_type'] = "App\Models\Subscription";
        $data['bookable_id'] = $this->subscription->id;

        $user = auth('web')->user();

        (new BookingService())->store($data);

        
        // Send emails
        // Mail::to($user->email)->send(new StudentBookingConfirmation($user, $bookingDetails));
        // Mail::to($tutor->email)->send(new TutorBookingNotification($tutor, $bookingDetails));

        return redirect()->route('student-profile');

    }
    public function render()
    {
        return view('livewire.subscription.show')->layout('app');
    }
}
