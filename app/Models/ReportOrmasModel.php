<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportOrmasModel extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'tb_alur_lapor';
    protected $fillable = [
        'id',
        'file_alur_lapor',
        'created_at',
        'updated_at',
    ];
}
