<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:statuses,slug',
        ];

        // For update, ignore the current status name and slug
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name'] .= ',' . $this->route('status')->id;
            $rules['slug'] .= ',' . $this->route('status')->id;
        } else {
            $rules['name'] .= '|unique:statuses,name';
            $rules['slug'] .= '|unique:statuses,slug';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'A status with this name already exists.',
        ];
    }
}