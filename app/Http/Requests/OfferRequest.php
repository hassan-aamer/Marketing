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
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'new_price' => 'required|numeric|min:0',
            'old_price' => 'required|numeric|min:0',
            'status' => 'required',
            'description' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter the Offer name.',
            'image.required' => 'Please choose an image for the Offer.',
            'new_price.required' => 'Please enter the Offer new price.',
            'old_price.required' => 'Please enter the Offer old price.',
            'status.required' => 'Please specify the Offer status.',
            'description.required' => 'Please enter the Offer description.',
        ];
    }
}
