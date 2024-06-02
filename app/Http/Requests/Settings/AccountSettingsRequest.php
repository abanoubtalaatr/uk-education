<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class AccountSettingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'job_title' => [
                'required',
                'string',
            ],
            'city_id' => [
                'required',
                'exists:cities,id',
            ],
            'birth_date' => [
                'required',
                'date',
            ],
            'phone' => [
                'required',
                'string',
            ],
            'profile_picture_removed' => [
                'nullable',
            ],
            'profile_picture' => [
                'nullable',
                'image',
                'max:1024'
            ],
        ];
    }
}
