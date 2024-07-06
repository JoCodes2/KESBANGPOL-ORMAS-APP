<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrmasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Menentukan apakah ini adalah permintaan update berdasarkan URL yang diakses
        $isOrmasUpdate = $this->is('v1/ormas/update/*');
        $isDocumentUpdate = $this->is('v1/document/ormas/update/*');

        // Inisialisasi aturan validasi file
        $fileRules = '';

        // Atur aturan validasi file berdasarkan kondisi route
        if (!$isOrmasUpdate && !$isDocumentUpdate) {
            $fileRules = 'required|file|mimes:pdf|max:2048';
        } elseif ($isDocumentUpdate) {
            $fileRules = 'file|mimes:pdf|max:2048';
        }

        return [
            'nama_ormas' => 'required|string|max:255',
            'singkatan_ormas' => 'required|string|max:255',
            'bidang_ormas' => 'required|in:sosial kemanusiaan,sosial kemasyarakatan,agama,pendidikan,ekonomi,budaya,hukum dan politik,aliran keagamaan,nasional,lingkungan,perdagangan,hukum,kesehatan,seni,demokrasi dan kebangsaan,olahraga,sosial keagamaan',
            'legalitas_ormas' => 'required|in:berbadan hukum,tidak berbadan hukum',
            'alamat_kesekretariatan' => 'required|string|max:255',
            'nama_ketua' => 'required|string|max:255',
            'no_hp_ketua' => 'required|string|max:15',
            'nama_sekretaris' => 'required|string|max:255',
            'no_hp_sekretaris' => 'required|string|max:15',
            'nama_bendahara' => 'required|string|max:255',
            'no_hp_bendahara' => 'required|string|max:15',
            'npwp' => 'required|string|max:20',
            'tanggal_berdiri' => 'required|date',
            'masa_berlaku_ormas' => 'required|date',
            'file_surat_permohonan' => $fileRules,
            'file_akte_pendirian' => $fileRules,
            'file_ad_art' => $fileRules,
            'file_proker_ormas' => $fileRules,
            'file_sk_ormas' => $fileRules,
            'file_biodata_pengurus' => $fileRules,
            'file_pas_foto' => $fileRules,
            'file_ktp_pengurus' => $fileRules,
            'file_surat_keterangan_domisili' => $fileRules,
        ];
    }

    public function messages(): array
    {
        return [
            'nama_ormas.required' => 'Nama ormas wajib diisi.',
            'singkatan_ormas.required' => 'Singkatan ormas wajib diisi.',
            'bidang_ormas.required' => 'Bidang ormas wajib diisi.',
            'bidang_ormas.in' => 'Bidang ormas tidak valid.',
            'legalitas_ormas.required' => 'Legalitas ormas wajib diisi.',
            'legalitas_ormas.in' => 'Legalitas ormas tidak valid.',
            'alamat_kesekretariatan.required' => 'Alamat kesekretariatan wajib diisi.',
            'nama_ketua.required' => 'Nama ketua wajib diisi.',
            'no_hp_ketua.required' => 'Nomor HP ketua wajib diisi.',
            'no_hp_ketua.max' => 'Nomor HP ketua maksimal 15 karakter.',
            'nama_sekretaris.required' => 'Nama sekretaris wajib diisi.',
            'no_hp_sekretaris.required' => 'Nomor HP sekretaris wajib diisi.',
            'no_hp_sekretaris.max' => 'Nomor HP sekretaris maksimal 15 karakter.',
            'nama_bendahara.required' => 'Nama bendahara wajib diisi.',
            'no_hp_bendahara.required' => 'Nomor HP bendahara wajib diisi.',
            'no_hp_bendahara.max' => 'Nomor HP bendahara maksimal 15 karakter.',
            'npwp.required' => 'NPWP wajib diisi.',
            'npwp.max' => 'NPWP maksimal 20 karakter.',
            'tanggal_berdiri.required' => 'Tanggal berdiri wajib diisi.',
            'tanggal_berdiri.date' => 'Tanggal berdiri harus berupa tanggal yang valid.',
            'masa_berlaku_ormas.required' => 'Masa berlaku ormas wajib diisi.',
            'masa_berlaku_ormas.date' => 'Masa berlaku ormas harus berupa tanggal yang valid.',

            'file_surat_permohonan.required' => 'Form wajib diisi.',
            'file_surat_permohonan.mimes' => 'File yang diupload harus berupa file PDF.',
            'file_surat_permohonan.max' => 'Ukuran file maksimal 2MB.',

            'file_akte_pendirian.required' => 'Form wajib diisi.',
            'file_akte_pendirian.mimes' => 'File yang diupload harus berupa file PDF.',
            'file_akte_pendirian.max' => 'Ukuran file maksimal 2MB.',

            'file_ad_art.required' => 'Form wajib diisi.',
            'file_ad_art.mimes' => 'File yang diupload harus berupa file PDF.',
            'file_ad_art.max' => 'Ukuran file maksimal 2MB.',

            'file_proker_ormas.required' => 'Form wajib diisi.',
            'file_proker_ormas.mimes' => 'File yang diupload harus berupa file PDF.',
            'file_proker_ormas.max' => 'Ukuran file maksimal 2MB.',

            'file_sk_ormas.required' => 'Form wajib diisi.',
            'file_sk_ormas.mimes' => 'File yang diupload harus berupa file PDF.',
            'file_sk_ormas.max' => 'Ukuran file maksimal 2MB.',

            'file_biodata_pengurus.required' => 'Form wajib diisi.',
            'file_biodata_pengurus.mimes' => 'File yang diupload harus berupa file PDF.',
            'file_biodata_pengurus.max' => 'Ukuran file maksimal 2MB.',

            'file_pas_foto.required' => 'Form wajib diisi.',
            'file_pas_foto.mimes' => 'File yang diupload harus berupa file PDF.',
            'file_pas_foto.max' => 'Ukuran file maksimal 2MB.',

            'file_ktp_pengurus.required' => 'Form wajib diisi.',
            'file_ktp_pengurus.mimes' => 'File yang diupload harus berupa file PDF.',
            'file_ktp_pengurus.max' => 'Ukuran file maksimal 2MB.',

            'file_surat_keterangan_domisili.required' => 'Form wajib diisi.',
            'file_surat_keterangan_domisili.mimes' => 'File yang diupload harus berupa file PDF.',
            'file_surat_keterangan_domisili.max' => 'Ukuran file maksimal 2MB.',
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
