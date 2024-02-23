<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
            'phone' => ['required','string','regex:/^01[0125][0-9]{8}$/','size:11','not_regex:/[<>]/',Rule::unique('contacts')->ignore($this->id)],
            'email' => ['required','email','not_regex:/[<>]/', Rule::unique('contacts')->ignore($this->id)],
            'url_facebook' => 'required|url',
            'url_instagram' => 'required|url',
            'url_twitter' => 'required|url',
            'url_youtube' => 'required|url',
            'location' => 'required|string|min:5|not_regex:/[<>]/',
        ];
    }
    public function messages()
    {
        return [
            'phone.required' => 'Please enter the phone.',
            'phone.unique' => 'The phone number is already in use.',
            'phone.regex' => 'The phone number is invalid. It must follow the correct format.',
            'phone.size' => 'The phone number must be 11 characters long.',
            'phone.not_regex' => 'Please cannot enter invalid codes.',
            'email.required' => 'Please enter the email.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'email.not_regex' => 'Please cannot enter invalid codes.',
            'url_facebook.required' => 'Please enter the url_facebook.',
            'url_instagram.required' => 'Please enter the url_instagram.',
            'url_twitter.required' => 'Please enter the url_twitter.',
            'url_youtube.required' => 'Please enter the url_youtube.',
            'location.required' => 'Please enter the location.',
            'location.not_regex' => 'Please cannot enter invalid codes.',
        ];
    }
}
