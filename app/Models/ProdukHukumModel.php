<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukHukumModel extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'tb_produk_hukum';
    protected $fillable = [
        'id',
        'nama_produk_hukum',
        'file_produk_hukum',
        'created_at',
        'updated_at',
    ];
}
