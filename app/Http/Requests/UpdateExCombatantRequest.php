<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExCombatantRequest extends FormRequest
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
            'name' => 'required|string',
            'claimant_name' => 'required|string',
            'nin' => 'required|string|unique:ex_combatants,nin,except,id|max:13',
            'bank' => 'required|string',
            'amount' => 'required|numeric',
            'account_name' => 'required|string',
            'account_number' => 'required|numeric|unique:ex_combatants,account_number,except,id',
            'village' => 'required|string',
            'parish' => 'required|string',
            'rank' => 'required|string',
            'telephone' => 'required|string',
            'living_status' => 'required',
            'file_status' => 'required',
        ];
    }
}
