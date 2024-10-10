<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'ein' => 'required|integer|min:8',
            'position' => 'required',
            'departmen_division' => 'required|string',
            'start_date' => 'required|date',
            'employment_status' => 'required',
            'base_salary' => 'required|integer',
            'bank_account' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.string' => 'Nama hanya boleh mengandung alphabet.',
            'name.max' => 'Nama maximal 255 karakter.',
            'ein.required' => 'Employee Identification Number tidak boleh kosong.',
            'ein.integer' => 'Employee Identification Number harus berupa angka.',
            'ein.min' => 'Employee Identification Number minimal 8 karakter.',
            'position.required' => 'Position tidak boleh kosong.',
            'departmen_division.required' => 'Division tidak boleh kosong.',
            'start_date.required' => 'Date tidak boleh kosong.',
            'start_date.date' => 'Date tidak valid.',
            'employment_status.required' => 'Employment Status tidak boleh kosong.',
            'base_salary.required' => 'Base salary tidak boleh kosong.',
            'base_salary.integer' => 'Base salary harus berupa angka.',
            'bank_account.required' => 'Bank account tidak boleh kosong.',
            'bank_account.integer' => 'Bank account harus berupa angka.',
        ];
    }
}
