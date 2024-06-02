<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BikeRequest extends FormRequest
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
                'required',
                'exists:brands,id',
            ],
            'model' => [
                'nullable',
                'string'
            ],
            'vehicle_type_id' => [
                'required',
                'exists:vehicle_types,id',
            ],
        ];
    }
}
