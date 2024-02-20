<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'product_id' => 'required_without:offer_id',
            'offer_id' => 'required_without:product_id',
            'email' => 'required|email|not_regex:/[<>]/',
            'phone' => 'required|string|regex:/^01[0125][0-9]{8}$/|size:11|not_regex:/[<>]/',
            'price' => 'required|numeric|min:0',
            'payment_id' => 'required',
            'location' => 'required|string|min:10|not_regex:/[<>]/',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required_without' => 'Please enter either product ID or offer ID.',
            'offer_id.required_without' => 'Please enter either product ID or offer ID.',
            'phone.required' => 'Please enter the phone.',
            'phone.regex' => 'The phone number is invalid. It must follow the correct format.',
            'phone.size' => 'The phone number must be 11 characters long.',
            'phone.not_regex' => 'Please cannot enter invalid codes.',
            'email.required' => 'Please enter the email.',
            'email.email' => 'The email must be a valid email address.',
            'email.not_regex' => 'Please cannot enter invalid codes.',
            'location.required' => 'Please enter the location.',
            'location.not_regex' => 'Please cannot enter invalid codes.',
        ];
    }
}
