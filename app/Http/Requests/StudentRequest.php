<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'StudentName' => 'required|string|max:255',
            'birthday' => 'required|date',
            'ClassID' => 'required|exists:classes,id'
        ];
    }
    public function messages(): array
    {
        return [
            'StudentName.required' => 'Tên sinh viên là bắt buộc.',
            'birthday.required' => 'Ngày sinh là bắt buộc.',
            'ClassID.required' => 'Lớp học là bắt buộc.',
            'ClassID.exists' => 'Lớp học không hợp lệ.',
        ];
    }
}
