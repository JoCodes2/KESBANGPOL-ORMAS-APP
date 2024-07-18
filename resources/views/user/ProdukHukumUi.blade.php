@extends('Layouts.UserTemplete')
@section('content')
    <div class="py-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
            <h3 class="m-0 font-weight-bold "><i class=""></i>PRODUK HUKUM</h3>
        </div>

        {{-- card header --}}
        <div class="">
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
    </div>
@endsection
@section('scripts')
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
                                "' class='btn btn-success'></i>Download</a>";
                            tableBody += "</td>";
                            tableBody += "</tr>";
                        });

                        $("#loadData tbody").html(tableBody);

                        $("#loadData").DataTable({
                            "responsive": true,
                            "lengthChange": true,
                            "lengthMenu": [10, 20, 30, 40, 50],
                            "autoWidth": false,
                            "language": {
                                "lengthMenu": "MENU",
                                "zeroRecords": "<i class='fas fa-sad-tear pr-2'></i>Tidak ada data yang ditemukan",
                                "info": "Menampilkan halaman PAGE dari PAGES",
                                "infoEmpty": "Tidak ada data tersedia",
                                "infoFiltered": "(difilter dari MAX total data)",
                                "paginate": {
                                    "first": "Pertama",
                                    "last": "Terakhir",
                                    "next": "Selanjutnya",
                                    "previous": "Sebelumnya"
                                }
                            }
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

        })
    </script>
@endsection
