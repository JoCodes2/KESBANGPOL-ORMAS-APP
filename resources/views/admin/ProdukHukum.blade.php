@extends('Layouts.master')

@section('content')
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold "><i class="fa-solid fa-book pr-2"></i>Produk Hukum</h3>
            <button type="button" class="btn btn-outline-primary ml-auto" id="myBtn">
                <i class="fa-solid fa-plus pr-2"></i>Tambah Data
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="loadData" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>

        <div class="modal fade show" id="formDataModal" aria-modal="true" role="dialog">
            <div class="modal-dialog">
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
                                <div class="form-group">
                                    <label for="nama_produk_hukum">Nama Produk Hukum</label>
                                    <input type="text" class="form-control" name="nama_produk_hukum"
                                        id="nama_produk_hukum">
                                    <small id="nama_produk_hukum-error" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="file_produk_hukum">File Produk Hukum</label>
                                    <input type="file" class="form-control" name="file_produk_hukum"
                                        id="file_produk_hukum">
                                    <small id="file_produk_hukum-error" class="text-danger"></small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="button" id="simpanData" class="btn-simpan-data">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                function getData() {
                    $.ajax({
                        url: `/v1/produk-hukum`,
                        method: "GET",
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            let tableBody = "";
                            $.each(response.data, function(index, item) {
                                tableBody += "<tr>";
                                tableBody += "<td>" + (index + 1) + "</td>";
                                tableBody += "<td>" + item.nama_produk_hukum + "</td>";
                                tableBody += "<td>";
                                tableBody += "<a href='/uploads/file-produk-hukum/" + item
                                    .file_produk_hukum + "' download='" + item.file_produk_hukum +
                                    "' class='btn btn-outline-primary'><i class='fa-solid fa-eye pr-2'></i>Detail</a>";
                                tableBody +=
                                    "<button type='button' class='btn btn-outline-danger delete-confirm' data-id='" +
                                    item.id + "'><i class='fa fa-trash'></i></button>";
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
                function loadingAllert() {
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

                $('#myBtn').click(function() {
                    $('#formDataModal').modal('show');
                    $('.text-danger').text('');
                    $('#upsertData')[0].reset();
                });

                $('#formDataModal').on('show.bs.modal', function() {
                    $('#upsertData')[0].reset();
                    $('#exampleInputFile').next('.custom-file-label').html('Choose file');
                });

                // create
                $(document).on('click', '#simpanData', function(e) {
                    $('.text-danger').text('');
                    e.preventDefault();

                    let id = $('#id').val();
                    let formData = new FormData($('#upsertData')[0]);
                    loadingAllert();

                    $.ajax({
                        type: 'POST',
                        url: '/v1/produk-hukum/create',
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
                $(document).on('click', '.delete-confirm', function() {
                    let id = $(this).data('id');

                    // Function to delete data
                    function deleteData() {
                        $.ajax({
                            type: 'DELETE',
                            url: `/v1/produk-hukum/delete/${id}`,
                            success: function(response) {
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
