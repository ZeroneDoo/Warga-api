<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateWargaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required',
            'email' => 'required|email:dns',
            'alamat' => 'required',
            'no_ktp' => 'required',
            'no_telepon' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => '*Nama tidak boleh kosong!',
            'email.required' => '*Email tidak boleh kosong!',
            'alamat.required' => '*Alamat tidak boleh kosong!',
            'no_ktp.required' => '*Nomor KTP tidak boleh kosong!',
            'no_telepon.required' => '*Nomor Telepon tidak boleh kosong!',
            'tanggal_lahir.required' => '*Tanggal Lahir tidak boleh kosong!',
            'jk.required' => '*Jenis kelamin tidak boleh kosong!'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'validate errrors',
            'data' => $validator->errors()
        ]));
    }
}
