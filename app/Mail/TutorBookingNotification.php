<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorBookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $tutor;
    public $bookingDetails;

    public function __construct($tutor, $bookingDetails)
    {
        $this->tutor = $tutor;
        $this->bookingDetails = $bookingDetails;
    }

    public function build()
    {
        return $this->view('emails.tutor_booking')
                    ->subject('New Booking Notification');
    }
}
