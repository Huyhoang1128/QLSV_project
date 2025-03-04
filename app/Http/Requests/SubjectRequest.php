<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'SubjectName' => 'required|string|max:255',
            'description' => 'nullable|string'
        ];
    }
    public function messages(): array
    {
        return [
            'SubjectName.required' => 'Tên môn học là bắt buộc.',
        ];
    }
}
