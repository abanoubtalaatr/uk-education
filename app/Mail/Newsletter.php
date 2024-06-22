<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $messageText;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        
        $this->messageText = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.news_letter')
                    ->subject('Our Latest Newsletter')
                    ->with(['messageText' => $this->messageText]);
    }
}
