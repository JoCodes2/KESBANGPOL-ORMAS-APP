@extends('Layouts.UserTemplete')

@section('content')
<div class="py-4">
    <div class="py-4 d-flex flex-row align-items-center justify-content-center">
        <h3 class="m-0 font-weight-bold">LAPOR KEBERADAAN ORMAS</h3>
    </div>

    <div class="btn-group d-flex align-items-center justify-content-center ">
        <a href="/alur-lapor" class="btn btn-link text-dark alur-lapor {{ request()->is('alur-lapor*') ? 'border-bottom-right' : '' }}">Alur Lapor Keberadaan Ormas</a>
        <a href="/register" class="btn btn-link text-dark register-ormas {{ request()->is('register*') ? 'border-top-active' : '' }}">Formulir Lapor Keberadaan Ormas</a>
        <a href="/search" class="btn btn-link text-dark search-ormas {{ request()->is('search*') ? 'border-bottom-left' : '' }}">Revisi Lapor Keberadaan Ormas</a>
    </div>

    <div class="py-3">
        <div class="py-3 card">
            <form id="upsertData" method="POST" enctype="multipart/form-data" class="py-1 px-2">
                @csrf
                <div class="card" >
                    <div class="title-button">
                        <button type="button" class="btn btn-link btn-lg " id="toggleDocumentPersyaratan"><i class="fa-solid fa-book pr-2"></i>Data Ormas</button>
                    </div>
                    <div class="card-body" id="dataOrmasForm">
                        <div class="form-group row">
                            <label for="nama_ormas" class="col-sm-3 col-form-label">Nama Ormas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_ormas" id="nama_ormas" >
                                <small id="nama_ormas-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="singkatan_ormas"  class="col-sm-3 col-form-label">Singkatan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="singkatan_ormas" id="singkatan_ormas"  >
                                <small id="singkatan_ormas-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bidang_ormas" class="col-sm-3 col-form-label">Bidang Ormas</label>
                            <div class="col-sm-9">
                                <select name="bidang_ormas" id="bidang_ormas" class="form-control">
                                    <option value="" selected disabled>--Pilih--</option>
                                    <option value="Lingkungan Hidup">Bidang Lingkungan Hidup</option>
                                    <option value="Energi atau Sumberdaya Alam">Bidang Energi atau Sumberdaya Alam</option>
                                    <option value="Pendidikan">Bidang Pendidikan</option>
                                    <option value="Ekonomi">Bidang Ekonomi</option>
                                    <option value="Seni">Bidang Seni</option>
                                    <option value="Sosial">Bidang Sosial</option>
                                    <option value="Budaya">Bidang Budaya</option>
                                    <option value="Hukum">Bidang Hukum</option>
                                    <option value="Hobi, Minat, atau Bakat">Bidang Hobi, Minat, atau Bakat</option>
                                    <option value="Perlindungan HAM">Bidang Perlindungan HAM</option>
                                    <option value="Kemanusiaan">Bidang Kemanusiaan</option>
                                    <option value="Kebudayaan dan/atau Adat Istiadat">Bidang Kebudayaan dan/atau Adat Istiadat</option>
                                    <option value="Agama">Bidang Agama</option>
                                    <option value="Kepercayaan Kepada Tuhan Yang Maha Esa">Bidang Kepercayaan Kepada Tuhan Yang Maha Esa</option>
                                    <option value="Penelitian dan Pengembangan">Bidang Penelitian dan Pengembangan</option>
                                    <option value="Penguatan Kapasitas">Bidang Penguatan Kapasitas</option>
                                    <option value="Sumber Daya Manusia">Bidang Sumber Daya Manusia</option>
                                    <option value="Ketenagakerjaan">Bidang Ketenagakerjaan</option>
                                    <option value="Pertanian">Bidang Pertanian</option>
                                    <option value="Peternakan">Bidang Peternakan</option>
                                    <option value="Kelautan dan Perikanan">Bidang Kelautan dan Perikanan</option>
                                    <option value="Kehutanan">Bidang Kehutanan</option>
                                    <option value="Kesehatan">Bidang Kesehatan</option>
                                    <option value="Kepemudaan dan Olahraga dan/atau Bela Diri">Bidang Kepemudaan dan Olahraga dan/atau Bela Diri</option>
                                    <option value="Demokrasi dan/atau Politik">Bidang Demokrasi dan/atau Politik</option>
                                    <option value="Pelayanan Masyarakat">Bidang Pelayanan Masyarakat</option>
                                    <option value="Pemberdayaan Masyarakat">Bidang Pemberdayaan Masyarakat</option>
                                    <option value="Industri dan Konstruksi">Bidang Industri dan Konstruksi</option>
                                    <option value="Pariwisata">Bidang Pariwisata</option>
                                    <option value="Kebencanaan">Bidang Kebencanaan</option>
                                    <option value="Jurnalistik">Bidang Jurnalistik</option>
                                    <option value="Ketertiban atau Keamanan">Bidang Ketertiban atau Keamanan</option>
                                    <option value="Pertahanan dan Belanegara">Bidang Pertahanan dan Belanegara</option>
                                    <option value="Pemerintahan">Bidang Pemerintahan</option>
                                    <option value="Pekerjaan Umum dan Penataan Ruang">Bidang Pekerjaan Umum dan Penataan Ruang</option>
                                    <option value="Perumahan Rakyat dan Kawasan Pemukiman">Bidang Perumahan Rakyat dan Kawasan Pemukiman</option>
                                    <option value="Ketentetaman, Ketertiban Umum, dan Perlindungan Masyarakat">Bidang Ketentetaman, Ketertiban Umum, dan Perlindungan Masyarakat</option>
                                    <option value="Pemberdayaan Perempuan dan Perlindungan Anak">Bidang Pemberdayaan Perempuan dan Perlindungan Anak</option>
                                    <option value="Pangan">Bidang Pangan</option>
                                    <option value="Pertanahan">Bidang Pertanahan</option>
                                    <option value="Pemberdayaan Desa">Bidang Pemberdayaan Desa</option>
                                    <option value="Perhubungan">Bidang Perhubungan</option>
                                    <option value="Komunikasi dan Informatika">Bidang Komunikasi dan Informatika</option>
                                    <option value="Penanaman Modal">Bidang Penanaman Modal</option>
                                    <option value="Perdagangan">Bidang Perdagangan</option>
                                    <option value="Transmigrasi">Bidang Transmigrasi</option>
                                    <option value="Statistik">Bidang Statistik</option>
                                    <option value="Kepustakaan">Bidang Kepustakaan</option>
                                    <option value="Kearsipan">Bidang Kearsipan</option>
                                    <option value="Koperasi, Usaha Kecil, dan Menengah">Bidang Koperasi, Usaha Kecil, dan Menengah</option>
                                    <option value="Kependudukan">Bidang Kependudukan</option>
                                    <option value="Lainnya">Bidang Lainnya</option>
                                </select>
                                <small id="bidang_ormas-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="legalitas_ormas" class="col-sm-3 col-form-label">Legalitas Ormas</label>
                            <div class="col-sm-9">
                                <select name="legalitas_ormas" id="legalitas_ormas" class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="berbadan hukum">Berbadan Hukum</option>
                                    <option value="tidak berbadan hukum">Tidak Berbadan Hukum</option>
                                </select>
                                <small id="legalitas_ormas-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat_kesekretariatan" class="col-sm-3 col-form-label">Alamat Kesekretariatan</label>
                            <div class="col-sm-9">
                                <textarea name="alamat_kesekretariatan" id="alamat_kesekretariatan" class="form-control" rows="2"></textarea>
                                <small id="alamat_kesekretariatan-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_ketua" class="col-sm-3 col-form-label">Nama Ketua</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_ketua" id="nama_ketua" >
                                <small id="nama_ketua-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_hp_ketua" class="col-sm-3 col-form-label">No. Telepon/Hp Ketua</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_hp_ketua" id="no_hp_ketua" >
                                <small id="no_hp_ketua-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_sekretaris" class="col-sm-3 col-form-label">Nama Sekretaris</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_sekretaris" id="nama_sekretaris" >
                                <small id="nama_sekretaris-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_hp_sekretaris" class="col-sm-3 col-form-label">No. Telepon/Hp Sekretaris</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_hp_sekretaris" id="no_hp_sekretaris" >
                                <small id="no_hp_sekretaris-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_bendahara" class="col-sm-3 col-form-label">Nama Bendahara</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_bendahara" id="nama_bendahara" >
                                <small id="nama_bendahara-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_hp_bendahara" class="col-sm-3 col-form-label">No. Telepon/Hp Bendahara</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_hp_bendahara" id="no_hp_bendahara" >
                                <small id="no_hp_bendahara-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="npwp" class="col-sm-3 col-form-label">NPWP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="npwp" id="npwp" >
                                <small id="npwp-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_berdiri" class="col-sm-3 col-form-label">Tanggal Berdiri</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_berdiri" id="tanggal_berdiri" >
                                <small id="tanggal_berdiri-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="masa_berlaku_ormas" class="col-sm-3 col-form-label">Masa Berlaku Kepengurusan</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="masa_berlaku_ormas" id="masa_berlaku_ormas" >
                                <small id="masa_berlaku_ormas-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_hp_ormas" class="col-sm-3 col-form-label">No.Telepon Ormas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_hp_ormas" id="no_hp_ormas" >
                                <small id="no_hp_ormas-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_badan_hukum" class="col-sm-3 col-form-label">No.Badan Hukum</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_badan_hukum" id="no_badan_hukum" >
                                <small id="no_badan_hukum-error" class="text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="title-button">
                        <button type="button" class="btn btn-link btn-lg " id="toggleDataOrmas"><i class="fa-solid fa-file pr-2"></i>Dokumen Persyaratan</button>
                    </div>
                    <div class="card-body" id="DocumentPersyaratanForm" style="display: none;">
                        <div class="form-group row">
                            <label for="file_surat_permohonan" class="col-form-label">Surat Permoohonan Pendaftaran</label>

                                <input type="file" class="form-control" name="file_surat_permohonan" id="file_surat_permohonan">
                                <small id="file_surat_permohonan-error" class="text-danger"></small>

                        </div>

                        <div class="form-group row">
                            <label for="file_akte_pendirian" class="col-form-label">Akte Pendirian Atau Status Orkesmas Yang Disahkan Notaris</label>

                                <input type="file" class="form-control" name="file_akte_pendirian" id="file_akte_pendirian">
                                <small id="file_akte_pendirian-error" class="text-danger"></small>

                        </div>

                        <div class="form-group row">
                            <label for="file_ad_art" class="col-form-label">Anggaran Dasar dan anggaran Rumah Tangga</label>

                                <input type="file" class="form-control" name="file_ad_art" id="file_ad_art">
                                <small id="file_ad_art-error" class="text-danger"></small>

                        </div>

                        <div class="form-group row">
                            <label for="file_proker_ormas" class="col-form-label">Tujuan dan Program Organisasi</label>

                                <input type="file" class="form-control" name="file_proker_ormas" id="file_proker_ormas">
                                <small id="file_proker_ormas-error" class="text-danger"></small>

                        </div>

                        <div class="form-group row">
                            <label for="file_sk_ormas" class="col-form-label">Surat Keputusan Tentang Susunan Orkesmas Secara Lengkap Yang Sah Sesuai Anggaran Dasar dan Anggaran Rumah Tangga</label>

                                <input type="file" class="form-control" name="file_sk_ormas" id="file_sk_ormas">
                                <small id="file_sk_ormas-error" class="text-danger"></small>

                        </div>

                        <div class="form-group row">
                            <label for="file_biodata_pengurus" class="col-form-label">Biodata Pengurus Organisasi, Yaitu Ketua, Sekretaris dan Bendahara Atau Sebutan Lainnya</label>

                                <input type="file" class="form-control" name="file_biodata_pengurus" id="file_biodata_pengurus">
                                <small id="file_biodata_pengurus-error" class="text-danger"></small>

                        </div>

                        <div class="form-group row">
                            <label for="file_pas_foto" class="col-form-label">Pas Foto Pengurus Berwarna Ukuran 4 x 6, Terbaru Dalam 3 (tiga Bulan Terakhir (SKB))</label>

                                <input type="file" class="form-control" name="file_pas_foto" id="file_pas_foto">
                                <small id="file_pas_foto-error" class="text-danger"></small>

                        </div>

                        <div class="form-group row">
                            <label for="file_ktp_pengurus" class="col-form-label">Foto Copy Kartu Tanda Penduduk Pengurus Organisasi (KSB)</label>

                                <input type="file" class="form-control" name="file_ktp_pengurus" id="file_ktp_pengurus">
                                <small id="file_ktp_pengurus-error" class="text-danger"></small>

                        </div>

                        <div class="form-group row">
                            <label for="file_surat_keterangan_domisili" class="col-form-label">Surat Keterangan Domisili Organisasi Dari Kepala Desa/Lurah/Camat atau Sebutan Lainnya</label>

                                <input type="file" class="form-control" name="file_surat_keterangan_domisili" id="file_surat_keterangan_domisili">
                                <small id="file_surat_keterangan_domisili-error" class="text-danger"></small>

                        </div>
                    </div>
                </div>
                <div class="">
                    <button type="button" id="simpanData" class="btn-simpan-data ">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#toggleDocumentPersyaratan').click(function() {
            $('#dataOrmasForm').show();
            $('#DocumentPersyaratanForm').hide();
        });

        $('#toggleDataOrmas').click(function() {
            $('#DocumentPersyaratanForm').show();
            $('#dataOrmasForm').hide();
        });

        $('#no_hp_ketua, #no_hp_sekretaris, #no_hp_bendahara,#no_hp_ormas').on('input', function() {
            var input = $(this).val();
            if (!/^[0-9]*$/.test(input)) {
                $(this).val(input.slice(0, -1));
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // messeage alert
        // alert success message
        function successAlert(message) {
            Swal.fire({
                title: 'Berhasil!',
                text: message,
                icon: 'success',
                showConfirmButton: false,
                timer: 1000,
            })
        }

        // alert error message
        function errorAlert() {
            Swal.fire({
                title: 'Error',
                text: 'Terjadi kesalahan!',
                icon: 'error',
                showConfirmButton: false,
                timer: 1000,
            });
        }


        // funtion reload
        function reloadBrowsers() {
            setTimeout(function() {
                location.reload();
            }, 1500);
        }

        // loading alerts
        function loadingAllert(){
            Swal.fire({
                title: 'Loading...',
                text: 'Please wait',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }

        // create
        $(document).on('click', '#simpanData', function(e) {
            $('.text-danger').text('');
            e.preventDefault();

            let id = $('#id').val();
            let formData = new FormData($('#upsertData')[0]);
            loadingAllert();

            $.ajax({
                type: 'POST',
                url: '/v1/ormas/create',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    Swal.close();
                    if (response.code === 422) {
                        let errors = response.errors;
                        $.each(errors, function(key, value) {
                            $('#' + key + '-error').text(value[0]);
                        });
                    } else if (response.code === 200) {
                        successAlert();
                        reloadBrowsers();
                    } else {
                        errorAlert();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.close();
                }
            });
        });
    });
</script>
@endsection

