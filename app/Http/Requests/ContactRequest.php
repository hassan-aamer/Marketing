<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'phone' => 'required|string|unique:contacts,phone|regex:/^01[0125][0-9]{8}$/|size:11',
            'email' => 'required|email|unique:contacts,email',
            'url_facebook' => 'required|string',
            'url_instagram' => 'required|string',
            'url_twitter' => 'required|string',
            'url_youtube' => 'required|string',
            'location' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'phone.required' => 'Please enter the phone.',
            'phone.unique' => 'The phone number is already in use.',
            'phone.regex' => 'The phone number is invalid. It must follow the correct format.',
            'phone.size' => 'The phone number must be 11 characters long.',
            'email.required' => 'Please enter the email.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'url_facebook.required' => 'Please enter the url_facebook.',
            'url_instagram.required' => 'Please enter the url_instagram.',
            'url_twitter.required' => 'Please enter the url_twitter.',
            'url_youtube.required' => 'Please enter the url_youtube.',
            'location.required' => 'Please enter the location.',
        ];
    }
}
