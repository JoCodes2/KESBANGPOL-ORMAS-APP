@extends('Layouts.master')

@section('content')

<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h3 class="m-0 font-weight-bold "><i class="fa-solid fa-book pr-2"></i>Pendaftaran Ormas</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="upsertData" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card" >
                <div class="card-title">
                    <button type="button" class="btn btn-default btn-lg" id="toggleDocumentPersyaratan"><i class="fa-solid fa-book pr-2"></i>Data Ormas</button>
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
                                <option value="sosial kemanusiaan">Bidang Sosial Kemanusiaan</option>
                                <option value="sosial kemasyarakatan">Bidang Sosial Kemasyarakatan</option>
                                <option value="agama">Bidang Agama</option>
                                <option value="pendidikan">Bidang Pendidikan</option>
                                <option value="ekonomi">Bidang Ekonomi</option>
                                <option value="budaya">Bidang Budaya</option>
                                <option value="hukum dan politik">Bidang Hukum dan Politik</option>
                                <option value="aliran keagamaan">Bidang Aliran Kepercayaan</option>
                                <option value="nasional">Bidang Nasionalis, Sosial Kemasyarakatan</option>
                                <option value="lingkungan">Bidang Lingkungan</option>
                                <option value="perdagangan">Bidang Perdagangan</option>
                                <option value="hukum">Bidang Hukum</option>
                                <option value="kesehatan">Bidang Kesehatan</option>
                                <option value="seni">Bidang Seni</option>
                                <option value="demokrasi dan kebangsaan">Bidang Demokrasi dan Kebangsaan</option>
                                <option value="olaharaga">Bidang Olahraga</option>
                                <option value="sosial keagamaan">Bidang Sosial Keagamaan</option>
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
                </div>
            </div>
            <div class="card">
                <div class="card-title">
                     <button type="button" class="btn btn-default btn-lg" id="toggleDataOrmas"><i class="fa-solid fa-file pr-2"></i>Dokumen Persyaratan</button>
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
            <div class="card-footer">
                <button type="button" id="simpanData" class="btn-simpan-data">Daftar</button>
            </div>
        </form>
    </div>

</div>
@endsection
@section('script')
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

        $('#no_hp_ketua, #no_hp_sekretaris, #no_hp_bendahara').on('input', function() {
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

        // confirm alert
        function confirmAlert(message, callback) {
            Swal.fire({
                title: '<span style="font-size: 22px"> Konfirmasi!</span>',
                text: message,
                showCancelButton: true,
                showConfirmButton: true,
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya',
                reverseButtons: true,
                confirmButtonColor: '#063158 ',
                cancelButtonColor: '#EFEFEF',
                cancelButtonText: 'Tidak',
                customClass: {
                    cancelButton: 'text-dark'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    callback();
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
