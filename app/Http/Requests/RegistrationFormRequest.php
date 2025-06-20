<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationFormRequest extends FormRequest
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
    public function rules()
{
    return [
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
            'unique:users,email'
        ],
        'password' => [
            'required',
            'min:8',
            'regex:/[A-Z]/',         // Ít nhất 1 chữ in hoa
            'regex:/[^a-zA-Z0-9]/'   // Ít nhất 1 ký tự đặc biệt
        ],
    ];
}

public function messages()
{
    return [
        'name.required' => 'Tên không được để trống.',
        'email.required' => 'Email không được để trống.',
        'email.email' => 'Email không hợp lệ.',
        'email.regex' => 'Email phải có định dạng @gmail.com (ví dụ: tenban@gmail.com).',
        'email.unique' => 'Email này đã được sử dụng.',
        'password.required' => 'Mật khẩu không được để trống.',
        'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
        'password.regex' => 'Mật khẩu phải chứa ít nhất 1 chữ cái in hoa và 1 ký tự đặc biệt (ví dụ: Abc@1234).',
    ];
}
}
