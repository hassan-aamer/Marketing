<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:255|not_regex:/[<>]/',
            'description' => 'required|string|min:50|not_regex:/[<>]/'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Please enter the About title.',
            'description.required' => 'Please enter the About description.',
            'description.not_regex' => 'Please cannot enter invalid codes.',
            'title.not_regex' => 'Please cannot enter invalid codes.',
        ];
    }
}
