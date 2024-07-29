<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrmasModel extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'tb_ormas';
    protected $fillable = [
        'id',
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
        'no_hp_ormas',
        'no_badan_hukum',
        'created_at',
        'updated_at',
    ];
    public function documentOrmas()
    {
        return $this->hasOne(DocumentOrmasModel::class, 'id_ormas');
    }
}
