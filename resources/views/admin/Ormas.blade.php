@extends('Layouts.master')

@section('content')

 <div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h3 class="m-0 font-weight-bold "><i class="fa-solid fa-book pr-2"></i>Data Ormas</h3>
        <button type="button" class="btn btn-outline-primary ml-auto" id="exportData">
            <i class="fa-solid fa-file-export pr-2"></i>Export Data
        </button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="loadData" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Singkatan/Nama Ormas</th>
                    <th>Bidang Ormas</th>
                    <th>Legalitas Ormas</th>
                    <th>Alamat Kesekretariatan</th>
                    <th>Nama/No Hp Ketua</th>
                    <th>Nama/No Hp Sekretaris</th>
                    <th>Nama/No Hp Bendahara</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>
    </div>

    {{-- update ormas --}}
    <div class="modal fade show" id="formDataModal" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-data">
                    <h4 class="modal-title"><i class="fa-solid fa-book-medical pr-2"></i>Form Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-light">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="upsertData" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="id" id="id">

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
                    </form>

                </div>
                <div class="modal-footer ">
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" id="simpanData" class="btn-simpan-data">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- detail ormas --}}
    <div class="modal fade show" id="detailOrmasModal" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-data">
                    <h4 class="modal-title"><i class="fa-solid fa-book-medical pr-2"></i>Detail Ormas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-light">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover text-nowrap">
                        <tr>
                            <td style="width: 50px"><strong>Nama Ormas</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailNamaOrmas"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>Singkatan</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailSingkatan"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>Bidang Ormas</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailBidangOrmas"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>Legalitas Ormas</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailLegalitasOrmas"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>Alamat Kesekretariatan</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailAlamat"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>Nama Ketua</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailNamaKetua"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>No. Telepon/Hp Ketua</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailTlpnKetua"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>Nama Sekretaris</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailNamaSekretaris"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>No. Telepon/Hp Sekretaris</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailTlpnSekretaris"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>Nama Bendahara</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailNamaBendahara"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>No. Telepon/Hp Bendahara</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailTlpnBendahara"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>NPWP</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailNPWP"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>Tanggal Berdiri</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailTglBerdiri"></span></td>
                        </tr>
                        <tr>
                            <td style="width: 50px"><strong>Masa Berlaku Kepengurusan</strong></td>
                            <td style="width: 20px">:</td>
                            <td><span id="detailMasaBerlaku"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
 </div>


@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#exportData').click(function() {
            let page = $('#loadData').DataTable().page.info().page + 1;
            window.location.href = `v1/ormas/export-data?page=${page}`;
        });

        $('#no_hp_ketua, #no_hp_sekretaris, #no_hp_bendahara').on('input', function() {
            var input = $(this).val();
            if (!/^[0-9]*$/.test(input)) {
                $(this).val(input.slice(0, -1));
            }
        });

        function mapBidangOrmas(value) {
            const bidangMapping = {
                'sosial kemanusiaan': 'Bidang Sosial Kemanusiaan',
                'sosial kemasyarakatan': 'Bidang Sosial Kemasyarakatan',
                'agama': 'Bidang Agama',
                'pendidikan': 'Bidang Pendidikan',
                'ekonomi': 'Bidang Ekonomi',
                'budaya': 'Bidang Budaya',
                'hukum dan politik': 'Bidang Hukum dan Politik',
                'aliran keagamaan': 'Bidang Aliran Kepercayaan',
                'nasional': 'Bidang Nasionalis, Sosial Kemasyarakatan',
                'lingkungan': 'Bidang Lingkungan',
                'perdagangan': 'Bidang Perdagangan',
                'hukum': 'Bidang Hukum',
                'kesehatan': 'Bidang Kesehatan',
                'seni': 'Bidang Seni',
                'demokrasi dan kebangsaan': 'Bidang Demokrasi dan Kebangsaan',
                'olahraga': 'Bidang Olahraga',
                'sosial keagamaan': 'Bidang Sosial Keagamaan'
            };

            return bidangMapping[value] || value;
        }

        function mapHukumOrmas(value) {
            const bidangMapping = {
                'berbadan hukum': 'Berbadan Hukum',
                'tidak berbadan hukum': 'Tidak berbadan Hukum',
            };

            return bidangMapping[value] || value;
        }

        function getData() {
            $.ajax({
                url: `/v1/ormas`,
                method: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let tableBody = "";
                    $.each(response.data, function(index, item) {
                        tableBody += "<tr>";
                        tableBody += "<td>" + (index + 1) + "</td>";
                        tableBody += "<td class ='text-center'><strong class ='fw-bold fs-10'>" + item.singkatan_ormas + "</strong><br>" + item.nama_ormas + "</td>";
                        tableBody += "<td>" + mapBidangOrmas(item.bidang_ormas) + "</td>";
                        tableBody += "<td>" + mapHukumOrmas(item.legalitas_ormas) + "</td>";
                        tableBody += "<td>" + item.alamat_kesekretariatan + "</td>";
                        tableBody += "<td class ='text-center'><strong class ='fw-bold fs-10'>" + item.nama_ketua  + "</strong><br>" + item.no_hp_ketua + "</td>";
                        tableBody += "<td class ='text-center'><strong class ='fw-bold fs-10'>" + item.nama_sekretaris  + "</strong><br>" + item.no_hp_sekretaris + "</td>";
                        tableBody += "<td class ='text-center'><strong class ='fw-bold fs-10'>" + item.nama_bendahara  + "</strong><br>" + item.no_hp_bendahara + "</td>";

                        tableBody += "<td>";
                            tableBody += "<button type='button' class='btn btn-outline-success detail-ormas' data-id='" + item.id + "'><i class='fa-solid fa-eye'></i></button>";
                            tableBody += "<button type='button' class='btn btn-outline-primary edit-ormas' data-id='" + item.id + "'><i class='fa-solid fa-pen-to-square'></i></button>";
                            tableBody += "<button type='button' class='btn btn-outline-danger delete-confirm' data-id='" + item.id + "'><i class='fa fa-trash'></i></button>";
                        tableBody += "</td>";
                        tableBody += "</tr>";
                    });

                    $("#loadData tbody").html(tableBody);

                    $("#loadData").DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        "lengthMenu": [10, 20, 30, 40, 50],
                        "autoWidth": false,
                    });


                },
                error: function() {
                    console.log("Gagal mengambil data dari server");
                }
            });
        }

        getData();

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



        // detail ormas
        $(document).on('click', '.detail-ormas', function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/v1/ormas/get/${id}`, // Adjust the URL based on your API endpoint
                method: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    // Populate modal fields with data
                    $('#detailNamaOrmas').text(response.data.nama_ormas);
                    $('#detailSingkatan').text(response.data.singkatan_ormas);
                    $('#detailBidangOrmas').text(mapBidangOrmas(response.data.bidang_ormas)); // Assuming you have a mapping function
                    $('#detailLegalitasOrmas').text(mapHukumOrmas(response.data.legalitas_ormas)); // Assuming you have a mapping function
                    $('#detailAlamat').text(response.data.alamat_kesekretariatan);
                    $('#detailNamaKetua').text(response.data.nama_ketua);
                    $('#detailTlpnKetua').text(response.data.no_hp_ketua);
                    $('#detailNamaSekretaris').text(response.data.nama_sekretaris);
                    $('#detailTlpnSekretaris').text(response.data.no_hp_sekretaris);
                    $('#detailNamaBendahara').text(response.data.nama_bendahara);
                    $('#detailTlpnBendahara').text(response.data.no_hp_bendahara);
                    $('#detailNPWP').text(response.data.npwp);
                    $('#detailTglBerdiri').text(response.data.tanggal_berdiri);
                    $('#detailMasaBerlaku').text(response.data.masa_berlaku_ormas);

                    // Show the modal
                    $('#detailOrmasModal').modal('show');
                },
                error: function() {
                    console.log("Gagal mengambil data dari server");
                }
            });
        });

        // get data byId
        function getDetailData(id) {
            $.ajax({
                url: `/v1/ormas/get/${id}`,
                method: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#id').val(response.data.id);
                    $('#nama_ormas').val(response.data.nama_ormas);
                    $('#singkatan_ormas').val(response.data.singkatan_ormas);
                    $('#bidang_ormas').val(response.data.bidang_ormas);
                    $('#legalitas_ormas').val(response.data.legalitas_ormas);
                    $('#alamat_kesekretariatan').val(response.data.alamat_kesekretariatan);
                    $('#nama_ketua').val(response.data.nama_ketua);
                    $('#no_hp_ketua').val(response.data.no_hp_ketua);
                    $('#nama_sekretaris').val(response.data.nama_sekretaris);
                    $('#no_hp_sekretaris').val(response.data.no_hp_sekretaris);
                    $('#nama_bendahara').val(response.data.nama_bendahara);
                    $('#no_hp_bendahara').val(response.data.no_hp_bendahara);
                    $('#npwp').val(response.data.npwp);
                    $('#tanggal_berdiri').val(response.data.tanggal_berdiri);
                    $('#masa_berlaku_ormas').val(response.data.masa_berlaku_ormas);

                    $('#formDataModal').modal('show');
                },
                error: function() {
                    console.log("Gagal mengambil data detail dari server");
                }
            });
        }

        $(document).on('click', '.edit-ormas', function() {
            var id = $(this).data('id');
            getDetailData(id);
        });


        // update
        $(document).on('click', '#simpanData', function(e) {
            $('.text-danger').text('');
            e.preventDefault();

            let id = $('#id').val();
            let formData = new FormData($('#upsertData')[0]);
            loadingAllert();

            $.ajax({
                type: 'POST',
                url: `/v1/ormas/update/${id}`,
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

        // delete data
        $(document).on('click', '.delete-confirm', function () {
            let id = $(this).data('id');

            // Function to delete data
            function deleteData() {
                $.ajax({
                    type: 'DELETE',
                    url: `/v1/ormas/delete/${id}`,
                    success: function (response) {
                        if (response.code === 200) {
                            successAlert();
                            reloadBrowsers();
                        } else {
                            errorAlert();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
            // Show confirmation alert
            confirmAlert('Apakah Anda yakin ingin menghapus data?', deleteData);
        });

    })
</script>
@endsection

