<?php

namespace App\Http\Requests\Onboarding;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'show_events_my_city' => [
                'required',
            ],
            'show_events_ksa' => [
                'required',
            ],
            'show_event_attendance' => [
                'required',
            ],
            'notifications_via_mail' => [
                'required',
            ],
            'notifications_via_sms' => [
                'required',
            ],
            'notifications_via_whatsapp' => [
                'required',
            ],
            'show_personal_information' => [
                'required',
            ],
        ];
    }
}
