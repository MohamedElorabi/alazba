<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'property_id' => 'required',
            'floor_number' => 'required|number',
            'distance' => 'required',
            'rent_amount' => 'required',
        ];
    }
}
