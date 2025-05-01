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
        return true; // You can add custom authorization logic here if needed
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
            'username' => 'required|unique:users,username,' . $userId . '|min:4|max:50',
            'password' => 'nullable|min:6',
            'full_name' => 'required|string|max:100',
            'contact_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $userId,
            'role' => 'required|in:user,admin', // New rule for role
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
            'role.required' => 'The user role is required.',
            'role.in' => 'The selected role is invalid. Choose either "user" or "admin".',
        ];
    }
}
