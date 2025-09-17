<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'applicant_name' => 'required|string',
            'applicant_email' => 'nullable|string',
            'applicant_phone' => 'required|string',
            'applicant_address' => 'string',
            'expected_salary' => 'string',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:2048',
            'job_posting_id' => 'required',
        ];
    }
}
