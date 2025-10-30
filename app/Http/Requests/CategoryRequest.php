<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'department_id' => 'required|exists:departments,id',
        ];

        // For update, ignore the current category name
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name'] .= ',' . $this->route('category')->id;
        } else {
            $rules['name'] .= '|unique:categories,name';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'department_id.exists' => 'The selected department does not exist.',
            'name.unique' => 'A category with this name already exists.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $this->merge([
                'name' => $this->name,
            ]);
        }
    }
}