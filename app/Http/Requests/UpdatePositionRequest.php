<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePositionRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'band' => ['required', 'integer'],
            'team' => ['required', 'integer'],
            'category1' => ['required', 'integer'],
            'category2' => ['required', 'integer'],
            'details' => ['nullable', 'string', 'max:255'],
            'supervisor' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ];
    }
}
