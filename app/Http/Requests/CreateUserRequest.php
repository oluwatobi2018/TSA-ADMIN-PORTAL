<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can add custom logic to determine if the user is authorized to create a user
        return true; // Allow all users to create a user (modify as needed)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:users|min:4|max:50', // Username is required and must be unique in the `users` table
            'password' => 'required|min:6',                      // Password is required and must be at least 6 characters
            'full_name' => 'required|string|max:100',            // Full name is required and max length of 100 characters
            'contact_number' => 'nullable|string|max:20',        // Contact number is optional, but if provided, max 20 characters
            'email' => 'required|email|unique:users|max:100',    // Email is required and must be unique in the `users` table
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
            'username.required' => 'The username is required.',
            'username.unique' => 'The username has already been taken.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'full_name.required' => 'The full name is required.',
            'email.required' => 'The email address is required.',
            'email.unique' => 'The email address has already been taken.',
        ];
    }
}
