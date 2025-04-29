<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // This will allow all users to create a contact.
        // You can modify this if you need specific permission checks.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',       // Name is required and can have a maximum of 100 characters
            'phone' => 'required|string|max:20',       // Phone number is required and can have a maximum of 20 characters
            'email' => 'nullable|email|max:100',       // Email is optional, but if provided, it must be a valid email and no longer than 100 characters
        ];
    }

    /**
     * Customize the error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The contact name is required.',
            'phone.required' => 'The phone number is required.',
            'email.email' => 'The email must be a valid email address.',
        ];
    }
}
