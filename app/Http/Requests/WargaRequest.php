<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class WargaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:dns',
            'password' => 'required',
            'no_ktp' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'A email is required',
            'password.required'  => 'A password is required',
            'no_ktp.required'  => 'A no ktp is required',
        ];
    }

    protected function formatErrors(Validator $validator){
        return $validator->errors()->all();
    }
}
