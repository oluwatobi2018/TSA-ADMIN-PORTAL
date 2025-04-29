<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can add custom logic here to check if the user is authorized to update their information.
        // For now, let's allow all users to update their data.
        return true; // Allow all users (you can modify this as needed)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId = $this->route('user'); // Get the user ID from the route parameter

        return [
            'username' => 'required|unique:users,username,' . $userId . '|min:4|max:50', // Make sure the username is unique, except for the current user
            'password' => 'nullable|min:6',  // Password is optional. If provided, it must be at least 6 characters long
            'full_name' => 'required|string|max:100', // Full name is required
            'contact_number' => 'nullable|string|max:20', // Contact number is optional, but if provided, max 20 characters
            'email' => 'required|email|unique:users,email,' . $userId, // Make sure the email is unique, except for the current user
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
            'password.min' => 'The password must be at least 6 characters.',
            'full_name.required' => 'The full name is required.',
            'email.required' => 'The email address is required.',
            'email.unique' => 'The email address has already been taken.',
        ];
    }
}
