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
                'Lingkungan Hidup', 'Energi atau Sumberdaya Alam', 'Pendidikan', 'Ekonomi', 'Seni', 'Sosial', 'Budaya',
                'Hukum', 'Hobi, Minat, atau Bakat', 'Perlindungan HAM', 'Kemanusiaan', 'Kebudayaan dan/atau Adat Istiadat',
                'Agama', 'Kepercayaan Kepada Tuhan Yang Maha Esa', 'Penelitian dan Pengembangan', 'Penguatan Kapasitas',
                'Sumber Daya Manusia', 'Ketenagakerjaan', 'Pertanian', 'Peternakan', 'Kelautan dan Perikanan', 'Kehutanan',
                'Kesehatan', 'Kepemudaan dan Olahraga dan/atau Bela Diri', 'Demokrasi dan/atau Politik', 'Pelayanan Masyarakat',
                'Pemberdayaan Masyarakat', 'Industri dan Konstruksi', 'Pariwisata', 'Kebencanaan', 'Jurnalistik', 'Ketertiban atau Keamanan',
                'Pertahanan dan Belanegara', 'Pemerintahan', 'Pekerjaan Umum dan Penataan Ruang', 'Perumahan Rakyat dan Kawasan Pemukiman',
                'Ketentetaman, Ketertiban Umum, dan Perlindungan Masyarakat', 'Pemberdayaan Perempuan dan Perlindungan Anak', 'Pangan',
                'Pertanahan', 'Pemberdayaan Desa', 'Perhubungan', 'Komunikasi dan Informatika', 'Penanaman Modal', 'Perdagangan', 'Transmigrasi',
                'Statistik', 'Kepustakaan', 'Kearsipan', 'Koperasi, Usaha Kecil, dan Menengah', 'Kependudukan', 'Lainnya'
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
            $table->string('no_hp_ormas');
            $table->string('no_badan_hukum');
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
