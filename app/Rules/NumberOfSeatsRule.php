<?php

namespace App\Rules;

use App\Models\Event;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NumberOfSeatsRule implements ValidationRule
{
    public function __construct(
        public Event $event
    ) {
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->event->users()->count() >= $this->event->number_of_seats) {
            $fail(__('Event has reached maximum number of seats'));
        }
    }
}
