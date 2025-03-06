<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
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
            'StudentID' => 'required|exists:students,id',
            'SubjectID' => 'required|exists:subjects,id'
        ];
    }
    public function messages(): array
    {
        return [
            'StudentID.required' => 'Vui lòng chọn sinh viên.',
            'StudentID.exists' => 'Sinh viên không hợp lệ.',
            'SubjectID.required' => 'Vui lòng chọn môn học.',
            'SubjectID.exists' => 'Môn học không hợp lệ.',
        ];
    }
}
