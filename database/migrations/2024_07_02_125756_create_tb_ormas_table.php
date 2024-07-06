<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_ormas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_ormas');
            $table->string('singkatan_ormas');
            $table->enum('bidang_ormas', [
                'sosial kemanusiaan', 'sosial kemasyarakatan', 'agama', 'pendidikan', 'ekonomi', 'budaya',
                'hukum dan politik', 'aliran keagamaan', 'nasional', 'lingkungan', 'perdagangan', 'hukum', 'kesehatan', 'seni', 'demokrasi dan kebangsaan',
                'olaharaga', 'sosial keagamaan'
            ]);
            $table->enum('legalitas_ormas', ['berbadan hukum', 'tidak berbadan hukum']);
            $table->string('alamat_kesekretariatan');
            $table->string('nama_ketua');
            $table->string('no_hp_ketua');
            $table->string('nama_sekretaris');
            $table->string('no_hp_sekretaris');
            $table->string('nama_bendahara');
            $table->string('no_hp_bendahara');
            $table->string('npwp');
            $table->date('tanggal_berdiri');
            $table->date('masa_berlaku_ormas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_ormas');
    }
};
