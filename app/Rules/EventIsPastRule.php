<?php

namespace App\Rules;

use App\Models\Event;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EventIsPastRule implements ValidationRule
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
        if ($this->event->end_date->isPast()) {
            $fail(__('The event has already ended.'));
        }
    }
}
