<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            //
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', 'before:today'],
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'marital_status' => 'required|integer',
            'office_number' => 'nullable|string|max:13',
            'mobile_number' => 'required|string|max:13',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'personal_email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
        ];
    }
}
