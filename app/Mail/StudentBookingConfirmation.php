<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentBookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $bookingDetails;

    public function __construct($user, $bookingDetails)
    {
        $this->user = $user;
        $this->bookingDetails = $bookingDetails;
    }

    public function build()
    {
        return $this->view('emails.student_booking')
                    ->subject('Booking Confirmation');
    }
}
