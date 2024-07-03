<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FlowReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'file_alur_lapor' => 'mimes:jpg,png,jpeg|max:2048',
        ];

        if ($this->is('v1/flow-report/create')) {
            $rules['file_alur_lapor'] = 'required|' . $rules['file_alur_lapor'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'file_alur_lapor.required' => 'Form wajib diisi!',
            'file_alur_lapor.mimes' => 'File harus berformat jpg, png, atau jpeg.',
            'file_alur_lapor.max' => 'File tidak boleh lebih dari 2MB.',
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
