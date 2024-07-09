@extends('Layouts.master')

@section('content')

<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h3 class="m-0 font-weight-bold "><i class="fa-solid fa-book pr-2"></i>Dokumen Persyaratan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="loadData" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Surat Permohonan Pendaftaran</th>
                    <th>Akte Pendirian atau Status Orkesmas Yang Disahkan Notaris</th>
                    <th>Anggaran Dasar dan Anggaran Rumah Tangga</th>
                    <th>Tujuan dan Program Organisasi</th>
                    <th>Surat Keputusan Tentang Susunan Orkesmas</th>
                    <th>Biodata Pengurus Organisasi</th>
                    <th>Pas Foto Pengurus</th>
                    <th>Surat Keterangan Domisili Organisasi</th>
                    <th>Foto Copy Kartu Tanda Penduduk Pengurus Organisasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tbody" class="text-center">

            </tbody>
        </table>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        function getData() {
            $.ajax({
                url: '/v1/document-ormas/', // Ganti URL sesuai dengan endpoint Anda
                method: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let tableBody = "";
                    $.each(response.data, function(index, item) {
                        tableBody += "<tr>";
                        tableBody += "<td>" + (index + 1) + "</td>";
                        tableBody += "<td>" + createDownloadLink(item.file_surat_permohonan, 'surat-permohonan') + "</td>";
                        tableBody += "<td>" + createDownloadLink(item.file_akte_pendirian, 'akte-pendirian') + "</td>";
                        tableBody += "<td>" + createDownloadLink(item.file_ad_art, 'ad-art') + "</td>";
                        tableBody += "<td>" + createDownloadLink(item.file_proker_ormas, 'proker-ormas') + "</td>";
                        tableBody += "<td>" + createDownloadLink(item.file_sk_ormas, 'sk-ormas') + "</td>";
                        tableBody += "<td>" + createDownloadLink(item.file_biodata_pengurus, 'biodata-pengurus') + "</td>";
                        tableBody += "<td>" + createDownloadLink(item.file_pas_foto, 'pas-foto') + "</td>";
                        tableBody += "<td>" + createDownloadLink(item.file_surat_keterangan_domisili, 'surat-keterangan-domisili') + "</td>";
                        tableBody += "<td>" + createDownloadLink(item.file_ktp_pengurus, 'ktp-pengurus') + "</td>";
                        tableBody += "<td>";
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

                    // Event listener for download links
                    $("#loadData tbody").on('click', '.document-link', function() {
                        var url = $(this).data('url');
                        window.location.href = url;
                    });
                },
                error: function() {
                    console.log("Gagal mengambil data dari server");
                }
            });
        }

        function createDownloadLink(filename, folder) {
            if (filename) {
                var url = '/uploads/' + folder + '/' + filename;
                return '<span class="document-link" data-url="' + url + '" style="color: #063158; cursor: pointer;"><i class="fa fa-file"></i> Detail</span>';
            }
            return 'N/A';
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


        // delete data
        $(document).on('click', '.delete-confirm', function () {
            let id = $(this).data('id');

            // Function to delete data
            function deleteData() {
                $.ajax({
                    type: 'DELETE',
                    url: `/v1/document-ormas/delete/${id}`,
                    success: function (response) {
                        console.log(response);
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
    });
</script>
@endsection
