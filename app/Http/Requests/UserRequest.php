<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:50',
            // 'username' => 'required|max:25|unique:users,username',
            'username' => $this->is('v1/user/update/*') ? 'required|max:25'  : 'required|max:25|unique:users,username',

            'devisi' => 'required',
            'password' => $this->is('v1/user/update/*') ? 'nullable|min:8'  : 'required|min:8',
            'password_confirmation' => $this->is('v1/user/update/*') ? 'nullable|same:password'  : 'required|same:password',
            'role' => 'required|in:admin,user',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 50 karakter.',
            'username.required' => 'Username wajib diisi',
            'username.max' => 'Username tidak boleh melebihi dari 25 karakter',
            'username.unique' => 'Username sudah digunakan',
            'devisi.required' => 'Devisi wajib diisi',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus memiliki setidaknya 8 karakter.',
            'password_confirmation.required' => 'Konfirmasi Password wajib diisi.',
            'password_confirmation.same' => 'Password tidak sama.',
            'role.required' => 'Role wajib diisi.',
            'role.in' => 'Role harus dipilih dari opsi yang tersedia.',
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
