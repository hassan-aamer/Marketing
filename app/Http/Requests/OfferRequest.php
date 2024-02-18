<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:255|not_regex:/[<>]/',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'new_price' => 'required|numeric|min:0',
            'old_price' => 'required|numeric|min:0',
            'status' => 'required|not_regex:/[<>]/',
            'description' => 'required|string|min:10|not_regex:/[<>]/',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter the Offer name.',
            'name.not_regex' => 'Please cannot enter invalid codes.',
            'image.required' => 'Please choose an image for the Offer.',
            'new_price.required' => 'Please enter the Offer new price.',
            'old_price.required' => 'Please enter the Offer old price.',
            'status.required' => 'Please enter the Offer status.',
            'status.not_regex' => 'Please cannot enter invalid codes.',
            'description.required' => 'Please enter the Offer description.',
            'description.not_regex' => 'Please cannot enter invalid codes.',
        ];
    }
}
