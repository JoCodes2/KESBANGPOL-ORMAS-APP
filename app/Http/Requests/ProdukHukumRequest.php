<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdukHukumRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'nama_produk_hukum' => 'required|string|max:255',
            'file_produk_hukum' => 'mimes:pdf|max:2048',
        ];

        if ($this->is('v1/produk-hukum/create')) {
            $rules['file_produk_hukum'] = 'required|' . $rules['file_produk_hukum'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nama_produk_hukum.required' => 'Nama produk hukum wajib diisi!',
            'nama_produk_hukum.string' => 'Nama produk hukum harus berupa string!',
            'nama_produk_hukum.max' => 'Nama produk hukum tidak boleh lebih dari 255 karakter!',
            'file_produk_hukum.required' => 'File produk hukum wajib diisi!',
            'file_produk_hukum.mimes' => 'File harus berformat pdf.',
            'file_produk_hukum.max' => 'File tidak boleh lebih dari 2MB.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'code' => 422,
            'message' => 'Check your validation',
            'errors' => $validator->errors()
        ]));
    }
}
