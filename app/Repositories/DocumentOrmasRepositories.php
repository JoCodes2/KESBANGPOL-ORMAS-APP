<?php

namespace App\Repositories;

use App\Interfaces\DocumentOrmasInterfaces;
use App\Models\DocumentOrmasModel;
use App\Models\OrmasModel;
use App\Traits\HttpResponseTraits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DocumentOrmasRepositories implements DocumentOrmasInterfaces
{
    use HttpResponseTraits;
    protected $documentOrmasModel;
    protected $ormasModel;
    public function __construct(DocumentOrmasModel $documentOrmasModel, OrmasModel $ormasModel)
    {
        $this->documentOrmasModel = $documentOrmasModel;
        $this->ormasModel = $ormasModel;
    }
    public function getAllData()
    {
        $data = $this->documentOrmasModel::with('ormas')->get();
        if ($data->isEmpty()) {
            return $this->dataNotFound();
        } else {
            return $this->success($data);
        }
    }
    public function deleteData($id)
    {
        try {
            // Temukan data dokumen berdasarkan id
            $documentOrmas = $this->documentOrmasModel::findOrFail($id);

            // Ambil id_ormas dari dokumen
            $id_ormas = $documentOrmas->id_ormas;

            // Daftar field dan folder terkait
            $fields = [
                'file_surat_permohonan' => 'surat-permohonan',
                'file_akte_pendirian' => 'akte-pendirian',
                'file_ad_art' => 'ad-art',
                'file_proker_ormas' => 'proker-ormas',
                'file_sk_ormas' => 'sk-ormas',
                'file_biodata_pengurus' => 'biodata-pengurus',
                'file_pas_foto' => 'pas-foto',
                'file_ktp_pengurus' => 'ktp-pengurus',
                'file_surat_keterangan_domisili' => 'surat-keterangan-domisili'
            ];

            // Loop melalui setiap field untuk memeriksa dan menghapus file
            foreach ($fields as $field => $folder) {
                if ($documentOrmas->$field) {
                    $filePath = public_path('uploads/' . $folder . '/' . $documentOrmas->$field);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            // Hapus dokumen ormas
            $documentOrmas->delete();

            // Temukan data ormas berdasarkan id_ormas dan hapus
            $ormas = $this->ormasModel::findOrFail($id_ormas);
            $ormas->delete();
            return $this->delete();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Gagal menghapus data', 'error' => $th->getMessage()], 400);
        }
    }
}
