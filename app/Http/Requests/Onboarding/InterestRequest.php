<?php

namespace App\Http\Requests\Onboarding;

use Illuminate\Foundation\Http\FormRequest;

class InterestRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'interests' => [
                'nullable',
                'array',
            ],
            'interests.*' => [
                'nullable',
                'exists:interests,id',
            ],
            'show_interests' => [
                'nullable',
            ]
        ];
    }
}
