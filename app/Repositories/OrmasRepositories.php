<?php

namespace App\Repositories;

use App\Http\Requests\OrmasRequest;
use App\Interfaces\OrmasInterfaces;
use App\Models\DocumentOrmasModel;
use App\Models\OrmasModel;
use App\Traits\HttpResponseTraits;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use PDF;

class OrmasRepositories implements OrmasInterfaces
{
    use HttpResponseTraits;

    protected $ormasModel;
    protected $documentOrmasModel;

    public function __construct(OrmasModel $ormasModel, DocumentOrmasModel $documentOrmasModel)
    {
        $this->ormasModel = $ormasModel;
        $this->documentOrmasModel = $documentOrmasModel;
    }

    public function getAllData()
    {
        $data = $this->ormasModel::with('documentOrmas')->get();
        if ($data->isEmpty()) {
            return $this->dataNotFound();
        } else {
            return $this->success($data);
        }
    }

    private function uploadFile($request, $fieldName, $storageFolder, $prefix = null)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $extension = $file->getClientOriginalExtension();

            // Generate a random filename
            $randomString = Str::random(20);

            // If prefix is provided, prepend it to the random string
            if ($prefix) {
                $filename = $prefix . '-' . $randomString . '.' . $extension;
            } else {
                $filename = $randomString . '.' . $extension;
            }

            // Create directory if not exists
            Storage::makeDirectory('uploads/' . $storageFolder);

            // Move file to storage
            $file->move(public_path('uploads/' . $storageFolder), $filename);

            return $filename;
        }

        return null;
    }

    public function createData(OrmasRequest $request)
    {
        try {
            $ormas = new $this->ormasModel;
            $ormas->nama_ormas = $request->input('nama_ormas');
            $ormas->singkatan_ormas = $request->input('singkatan_ormas');
            $ormas->bidang_ormas = $request->input('bidang_ormas');
            $ormas->legalitas_ormas = $request->input('legalitas_ormas');
            $ormas->alamat_kesekretariatan = $request->input('alamat_kesekretariatan');
            $ormas->nama_ketua = $request->input('nama_ketua');
            $ormas->no_hp_ketua = $request->input('no_hp_ketua');
            $ormas->nama_sekretaris = $request->input('nama_sekretaris');
            $ormas->no_hp_sekretaris = $request->input('no_hp_sekretaris');
            $ormas->nama_bendahara = $request->input('nama_bendahara');
            $ormas->no_hp_bendahara = $request->input('no_hp_bendahara');
            $ormas->npwp = $request->input('npwp');
            $ormas->tanggal_berdiri = $request->input('tanggal_berdiri');
            $ormas->masa_berlaku_ormas = $request->input('masa_berlaku_ormas');
            $ormas->save();

            $documetOrmas = new $this->documentOrmasModel;
            $documetOrmas->id_ormas = $ormas->id;

            // Upload each file with appropriate prefix
            $documetOrmas->file_surat_permohonan = $this->uploadFile($request, 'file_surat_permohonan', 'surat-permohonan', 'Surat-Permohonan');
            $documetOrmas->file_akte_pendirian = $this->uploadFile($request, 'file_akte_pendirian', 'akte-pendirian', 'Akte-Pendirian');
            $documetOrmas->file_ad_art = $this->uploadFile($request, 'file_ad_art', 'ad-art', 'AD-ART');
            $documetOrmas->file_proker_ormas = $this->uploadFile($request, 'file_proker_ormas', 'proker-ormas', 'Program-Kerja');
            $documetOrmas->file_sk_ormas = $this->uploadFile($request, 'file_sk_ormas', 'sk-ormas', 'SK-Ormas');
            $documetOrmas->file_biodata_pengurus = $this->uploadFile($request, 'file_biodata_pengurus', 'biodata-pengurus', 'Biodata-Ormas');
            $documetOrmas->file_pas_foto = $this->uploadFile($request, 'file_pas_foto', 'pas-foto', 'Pas-Foto');
            $documetOrmas->file_ktp_pengurus = $this->uploadFile($request, 'file_ktp_pengurus', 'ktp-pengurus', 'Foto-KTP');
            $documetOrmas->file_surat_keterangan_domisili = $this->uploadFile($request, 'file_surat_keterangan_domisili', 'surat-keterangan-domisili', 'Surat Domisili');

            $documetOrmas->save();

            return $this->success($ormas);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function getDataById($id)
    {
        $data = $this->ormasModel::with('documentOrmas')->where('id', $id)->first();
        if ($data) {
            return $this->success($data);
        } else {
            return $this->idOrDataNotFound();
        }
    }

    public function updateDataById(OrmasRequest $request, $id)
    {
        try {
            $ormas = $this->ormasModel::where('id', $id)->first();
            if (!$ormas) {
                return $this->idOrDataNotFound();
            }
            $ormas->nama_ormas = $request->input('nama_ormas');
            $ormas->singkatan_ormas = $request->input('singkatan_ormas');
            $ormas->bidang_ormas = $request->input('bidang_ormas');
            $ormas->legalitas_ormas = $request->input('legalitas_ormas');
            $ormas->alamat_kesekretariatan = $request->input('alamat_kesekretariatan');
            $ormas->nama_ketua = $request->input('nama_ketua');
            $ormas->no_hp_ketua = $request->input('no_hp_ketua');
            $ormas->nama_sekretaris = $request->input('nama_sekretaris');
            $ormas->no_hp_sekretaris = $request->input('no_hp_sekretaris');
            $ormas->nama_bendahara = $request->input('nama_bendahara');
            $ormas->no_hp_bendahara = $request->input('no_hp_bendahara');
            $ormas->npwp = $request->input('npwp');
            $ormas->tanggal_berdiri = $request->input('tanggal_berdiri');
            $ormas->masa_berlaku_ormas = $request->input('masa_berlaku_ormas');
            $ormas->save();

            return $this->success($ormas);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function deleteData($id)
    {
        try {
            // Find the ormas record by ID
            $ormas = $this->ormasModel::findOrFail($id);

            $documentOrmas = $this->documentOrmasModel::where('id_ormas', $ormas->id)->first();

            if ($documentOrmas) {
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

                // Loop through each field to check and delete the files
                foreach ($fields as $field => $folder) {
                    if ($documentOrmas->$field) {
                        $filePath = public_path('uploads/' . $folder . '/' . $documentOrmas->$field);
                        if (file_exists($filePath)) {
                            unlink($filePath);
                        }
                    }
                }

                $documentOrmas->delete();
            }

            $ormas->delete();

            return $this->success(null, 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 400, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function searchByNameOrAbbreviation($keyword)
    {
        $results = $this->ormasModel::where('nama_ormas', 'like', '%' . $keyword . '%')
            ->orWhere('singkatan_ormas', 'like', '%' . $keyword . '%')
            ->get();

        return $results;
    }

    public function findByName($namaOrmas)
    {
        return $this->ormasModel::where('nama_ormas', $namaOrmas)->first();
    }


    public function exportData(Request $request)
    {
        $page = $request->query('page', 1);
        $perPage = 10;
        $ormas = $this->ormasModel::skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get([
                'nama_ormas',
                'singkatan_ormas',
                'bidang_ormas',
                'legalitas_ormas',
                'alamat_kesekretariatan',
                'nama_ketua',
                'no_hp_ketua',
                'nama_sekretaris',
                'no_hp_sekretaris',
                'nama_bendahara',
                'no_hp_bendahara',
                'npwp',
                'tanggal_berdiri',
                'masa_berlaku_ormas',
            ]);

        $pdf = PDF::loadView('admin.export', compact('ormas'))
            ->setPaper('f4', 'landscape');
        $fileName = Str::random(10) . '-data-ormas.pdf';
        return $pdf->download($fileName);
    }
}
