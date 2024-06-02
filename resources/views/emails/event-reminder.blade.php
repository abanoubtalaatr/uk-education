@component('mail::message')
{{ __('This e-mail is to remind you of upcoming event :event', ['event' => $event->name]) }}

{{ __('It is scheduled from :startDate to :endDate.', ['startDate' => $event->start_date->format('Y-m-d H:i'), 'endDate' => $event->end_date->format('Y-m-d H:i')]) }}

{{ __('If you did not register for this event, you may discard this email.') }}
@endcomponent
