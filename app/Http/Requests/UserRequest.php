<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'nullable|string|max:20',
            'role' => 'required|in:admin,customer',
            'avatar' => 'nullable|string|max:255',
        ];

        // For update, ignore the current user's email and username
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $user = $this->route('user');
            $rules['email'] = ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)];
            $rules['username'] = ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id)];
            
            // Password is optional on update
            $rules['password'] = 'nullable|string|min:8|confirmed';
        } else {
            // Password is required on create
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'A user with this email already exists.',
            'username.unique' => 'This username is already taken.',
            'role.in' => 'The selected role is invalid.',
            'password.confirmed' => 'Password confirmation does not match.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            // Remove password from validation if it's empty
            if (empty($this->password)) {
                $this->request->remove('password');
            }
        }
    }
}