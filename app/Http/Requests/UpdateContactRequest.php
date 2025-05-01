<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Allow all users to update the contact, you can add your own authorization logic here if needed
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
            'name' => 'required|string|max:100',      // Contact name is required, max length of 100 characters
            'phone' => 'required|string|max:20',      // Phone number is required, max length of 20 characters
            'email' => 'nullable|email|max:100',      // Email is optional, but if provided, must be a valid email and max length 100
             'contact_type' => ['required', 'in:client,supplier,partner'],  //contact type dropdown for users to choose from
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
