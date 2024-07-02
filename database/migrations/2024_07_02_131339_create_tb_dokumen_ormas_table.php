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
        Schema::create('tb_dokumen_ormas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_ormas')->constrained('tb_ormas');
            $table->string('file_surat_permohonan');
            $table->string('file_akte_pendirian');
            $table->string('file_ad_art');
            $table->string('file_proker_ormas');
            $table->string('file_sk_ormas');
            $table->string('file_biodata_pengurus');
            $table->string('file_pas_foto');
            $table->string('file_ktp_pengurus');
            $table->string('file_surat_keterangan_domisisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_dokumen_ormas');
    }
};
