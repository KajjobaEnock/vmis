<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateEmployeePersonalRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->id,
            //'username' => 'required|unique:users,username,'.$this->id,
            'personal_email' => 'nullable|string|email|max:255|unique:users,personal_email,'.$this->id,
            'nin' => 'required|unique:users,nin,'.$this->id,
            'tin' => 'required|unique:users,tin,'.$this->id,
            'nssf_number' => 'required|unique:users,nssf_number,'.$this->id,
            'passport_number' => 'nullable|unique:users,passport_number,'.$this->id,
            'insurance_number' => 'nullable|unique:users,insurance_number,'.$this->id,
            'language' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
        ];
    }
}
