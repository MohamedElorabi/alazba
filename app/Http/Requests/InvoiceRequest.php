<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'total' => 'required',
            'paid' => 'required',
            'debit' => 'required',
            'status' => 'required',
            'date' => 'required|date',
            'expiry_date' => 'required|date',
            'payment_method_id' => 'required',
            'object_id'  => 'required',
            'price'  => 'required',
            'type'  => 'required',
        ];
    }
}
