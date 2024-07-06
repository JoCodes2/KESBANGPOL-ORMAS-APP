<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentOrmasModel extends Model
{
    use HasFactory, HasUuids;
    // Nama tabel
    protected $table = 'tb_dokumen_ormas';

    // Mass assignable attributes
    protected $fillable = [
        'id',
        'id_ormas',
        'file_surat_permohonan',
        'file_akte_pendirian',
        'file_ad_art',
        'file_proker_ormas',
        'file_sk_ormas',
        'file_biodata_pengurus',
        'file_pas_foto',
        'file_ktp_pengurus',
        'file_surat_keterangan_domisili',
        'created_at',
        'updated_at',
    ];

    // Relasi dengan model Ormas
    public function ormas()
    {
        return $this->belongsTo(OrmasModel::class, 'id_ormas');
    }
}
