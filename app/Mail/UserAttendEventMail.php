<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\User;
use BaconQrCode\Renderer\GDLibRenderer;
use BaconQrCode\Writer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Spatie\CalendarLinks\Link;

class UserAttendEventMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * @var \App\Models\Event
     */
    public Event $event;

    public $url;

    /**
     * Create a new message instance.
     */
    public function __construct(Event $event, User $user)
    {
        $this->event = $event;

        $link = Link::create($event->name, $event->start_date, $event->end_date)
            ->description($event->description);

        if ($event->location_url) {
            $link->address($event->location_link);
        }

        $this->url = $link->ics([], ['format' => 'file']);

        $renderer = new GDLibRenderer(400);
        $writer = new Writer($renderer);
        $writer->writeFile(URL::route('events.attend.qr', [$event, $user]), 'qrcode.png');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Event Registration',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.event-registration',
            with: [
                'event' => $this->event,
                'image' => URL::to('qrcode.png'),
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => $this->url, 'Calendar event.ics'),
        ];
    }
}
