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
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|numeric|min:0',
            'status' => 'required',
            'description' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter the product name.',
            'image.required' => 'Please choose an image for the product.',
            'price.required' => 'Please enter the product price.',
            'status.required' => 'Please specify the product status.',
            'description.required' => 'Please enter the product description.',
        ];
    }
}
