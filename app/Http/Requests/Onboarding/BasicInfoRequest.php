<?php

namespace App\Http\Requests\Onboarding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BasicInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'job_title' => [
                'required',
                'string',
            ],
            'city' => [
                'required',
                'exists:cities,id',
            ],
            'birth_date' => [
                'required',
                'date',
            ],
            'gender' => [
                'required',
                'string',
            ],
            'brand_id' => [
                'nullable',
                'exists:brands,id',
            ],
            'model' => [
                'required_if:brand_id,!null',
            ],
            'vehicle_type_id' => [
                'nullable',
                'exists:vehicle_types,id',
            ],
            'three_habit_certificate' => [
                'nullable',
            ],
        ];
    }
}
