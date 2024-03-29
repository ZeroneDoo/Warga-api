<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => "required",
            'password' => "required",
            'no_ktp' => "required",
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "*Email tidak boleh kosong",
            'password.required' => "*Password tidak boleh kosong",
            'no_ktp.required' => "*Nomor KTP tidak boleh kosong",
        ];
    }
}
