<?php

namespace App\Http\Requests\Onboarding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserBrandRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand_id' => [
                'nullable',
                'exists:brands,id',
            ],
            'model' => [
                'nullable',
            ],
            'vehicle_type_id' => [
                'nullable',
                'exists:vehicle_types,id',
            ],
        ];
    }
}
