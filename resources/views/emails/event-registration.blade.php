@component('mail::message')
{{ __('You have chosen to attend event :event', ['event' => $event->name]) }}

{{ __('Please find attached event calendar open it to add to your calendar.') }}

{{ __('Please provide the QR code below when asked by the event coordinators.') }}

<img src="{{$message->embed($image)}}" style="width:30%" alt="QR Code">

{{ __('If you did not register for this event, you may discard this email.') }}
@endcomponent
