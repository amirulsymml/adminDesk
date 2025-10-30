<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'customer_id' => 'required|exists:users,id',
            'assigned_user_id' => 'nullable|exists:users,id',
            'priority_id' => 'required|exists:priorities,id',
            'status_id' => 'required|exists:statuses,id',
            'type_id' => 'required|exists:types,id',
            'department_id' => 'required|exists:departments,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:categories,id',
            'attachments.*' => 'nullable|file|max:10240', // Max 10MB per file
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'customer_id.exists' => 'The selected customer does not exist.',
            'assigned_user_id.exists' => 'The selected assigned user does not exist.',
            'priority_id.exists' => 'The selected priority does not exist.',
            'status_id.exists' => 'The selected status does not exist.',
            'type_id.exists' => 'The selected type does not exist.',
            'department_id.exists' => 'The selected department does not exist.',
            'category_id.exists' => 'The selected category does not exist.',
            'sub_category_id.exists' => 'The selected sub-category does not exist.',
        ];
    }
}