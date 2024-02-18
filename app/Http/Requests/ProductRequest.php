<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'status' => 'required|not_regex:/[<>]/',
            'description' => 'required|string|min:10|not_regex:/[<>]/',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter the product name.',
            'name.not_regex' => 'Please cannot enter invalid codes.',
            'image.required' => 'Please choose an image for the product.',
            'price.required' => 'Please enter the product price.',
            'status.required' => 'Please enter the product status.',
            'status.not_regex' => 'Please cannot enter invalid codes.',
            'description.required' => 'Please enter the product description.',
            'description.not_regex' => 'Please cannot enter invalid codes.',
        ];
    }
}
