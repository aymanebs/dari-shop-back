<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'orderId' => 'required',
            'card_holder' => 'required|string|min:3',
            'card_number' => 'required|string|digits:16',
            'exp_month' => 'required|numeric|digits:2',
            'exp_year' => 'required|numeric|digits:2',
            'cvc' => 'required|numeric|digits:3',


        ];
    }
}
