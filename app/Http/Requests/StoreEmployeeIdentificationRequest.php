<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeIdentificationRequest extends FormRequest
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
            'nin' => 'required|unique:users,nin,'.$this->id,
            'tin' => 'required|unique:users,tin,'.$this->id,
            'nssf_number' => 'required|unique:users,nssf_number,'.$this->id,
            'passport_number' => 'nullable|unique:users,passport_number,'.$this->id,
            'insurance_number' => 'nullable|unique:users,insurance_number,'.$this->id,
            'insurance_number' => ['nullable','integer', 'unique:users'],
            'language' => 'nullable|string|max:255',
            'skills' => 'nullable|string|max:255',
        ];
    }
}
