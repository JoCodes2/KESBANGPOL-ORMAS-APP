@extends('Layouts.UserTemplete')

@section('content')
    <div class="py-4">
        <div class="py-4 d-flex flex-row align-items-center justify-content-center">
            <h3 class="m-0 font-weight-bold">LAPOR KEBERADAAN ORMAS</h3>
        </div>
        <div class="btn-group d-flex align-items-center justify-content-center ">
            <a href="/alur-lapor"
                class="btn btn-link text-dark alur-lapor {{ request()->is('alur-lapor*') ? 'border-bottom-right' : '' }}">Alur
                Lapor Keberadaan Ormas</a>
            <a href="/register"
                class="btn btn-link text-dark register-ormas {{ request()->is('register*') ? 'border-top-active' : '' }}">Formulir
                Lapor Keberadaan Ormas</a>
            <a href="/search"
                class="btn btn-link text-dark search-ormas {{ request()->is('search*') ? 'border-bottom-left' : '' }}">Revisi
                Lapor Keberadaan Ormas</a>
        </div>

        <div class="py-3">
            <div class="card">
                <div class="card-header">
                    <h6 id="searchPrompt">Silahkan Input Nama/Singkatan Ormas</h6>
                </div>
                <div class="card-body">
                    <form id="searchForm">
                        <div class="form-group">
                            <input type="text" id="search" name="keyword" class="form-control"
                                placeholder="Search Ormas...">
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                    <ul id="results" class="list-group mt-2"></ul>
                    <p id="no-results" class="text-muted mt-2" style="display: none;">Tidak ada data</p>
                </div>
            </div>
            <!-- Container untuk menampilkan detail data -->
            <div id="ormasDetail" style="display: none;"></div>
            <button id="clearButton" class="btn btn-secondary mt-3" style="display:none;">Kembali</button>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        // loading alerts
        function loadingAlert() {
            Swal.fire({
                title: 'Loading...',
                text: 'Please wait',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        }

        $(document).ready(function() {
            // Menggunakan event submit form untuk melakukan pencarian
            $('#searchForm').submit(function(event) {
                event.preventDefault(); // Mencegah form untuk melakukan submit standar

                var keyword = $('#search').val();
                if (keyword.length > 0) {
                    loadingAlert(); // Menampilkan loading alert
                    $.ajax({
                        url: '/v1/ormas/search-ormas', // Pastikan URL ini benar
                        method: 'GET',
                        data: {
                            keyword: keyword
                        },
                        success: function(response) {
                            Swal.close(); // Menutup loading alert
                            console.log(response);
                            $('#results').empty();
                            if (response.data.length > 0) {
                                $('#no-results').hide();
                                response.data.forEach(function(ormas) {
                                    $('#results').append(
                                        '<li class="list-group-item search-item" data-nama-ormas="' +
                                        ormas.nama_ormas + '">' +
                                        ormas.nama_ormas + ' (' + ormas
                                        .singkatan_ormas + ')' +
                                        '</li>'
                                    );
                                });
                            } else {
                                $('#results').empty();
                                $('#no-results').show();
                            }
                        },
                        error: function() {
                            Swal.close(); // Menutup loading alert
                            $('#results').empty();
                            $('#no-results').show();
                        }
                    });

                } else {
                    $('#results').empty();
                    $('#no-results').hide(); // Sembunyikan pesan "Tidak ada data"
                }
            });

            // Menampilkan detail data saat item pencarian di klik
            $(document).on('click', '.search-item', function() {
                var namaOrmas = $(this).data('nama-ormas'); // Ambil nama Ormas dari data attribute
                loadingAlert(); // Menampilkan loading alert
                $.ajax({
                    url: '/v1/ormas/get-by-name',
                    method: 'GET',
                    data: {
                        nama_ormas: namaOrmas
                    },
                    success: function(response) {
                        Swal.close(); // Menutup loading alert
                        console.log(response);
                        if (response.success) {
                            var ormas = response.data;
                            var tableHtml = '<div class="card mt-3">' +
                                '<div class="card-header">' +
                                '<h5>' + ormas.nama_ormas + '</h5>' +
                                '</div>' +
                                '<div class="card-body">' +
                                '<table class="table table-striped">' +
                                '<tr><td><strong>Singkatan</strong></td><td>' + ormas
                                .singkatan_ormas + '</td></tr>' +
                                '<tr><td><strong>Bidang</strong></td><td>' + ormas
                                .bidang_ormas + '</td></tr>' +
                                '<tr><td><strong>Legalitas</strong></td><td>' + ormas
                                .legalitas_ormas + '</td></tr>' +
                                '<tr><td><strong>Alamat</strong></td><td>' + ormas
                                .alamat_kesekretariatan + '</td></tr>' +
                                '<tr><td><strong>Ketua</strong></td><td>' + ormas.nama_ketua +
                                '</td></tr>' +
                                '<tr><td><strong>No. HP Ketua</strong></td><td>' + ormas
                                .no_hp_ketua + '</td></tr>' +
                                '<tr><td><strong>Sekretaris</strong></td><td>' + ormas
                                .nama_sekretaris + '</td></tr>' +
                                '<tr><td><strong>No. HP Sekretaris</strong></td><td>' + ormas
                                .no_hp_sekretaris + '</td></tr>' +
                                '<tr><td><strong>Bendahara</strong></td><td>' + ormas
                                .nama_bendahara + '</td></tr>' +
                                '<tr><td><strong>No. HP Bendahara</strong></td><td>' + ormas
                                .no_hp_bendahara + '</td></tr>' +
                                '<tr><td><strong>NPWP</strong></td><td>' + ormas.npwp +
                                '</td></tr>' +
                                '<tr><td><strong>Tanggal Berdiri</strong></td><td>' + ormas
                                .tanggal_berdiri + '</td></tr>' +
                                '<tr><td><strong>Masa Berlaku</strong></td><td>' + ormas
                                .masa_berlaku_ormas + '</td></tr>' +
                                '</table>' +
                                '</div>' +
                                '</div>';
                            $('#results').empty(); // Menghapus hasil pencarian sebelumnya
                            $('#ormasDetail').html(tableHtml)
                        .show(); // Menampilkan tabel dengan detail data
                            $('#searchForm').hide(); // Menyembunyikan form pencarian
                            $('#searchPrompt').hide(); // Menyembunyikan prompt pencarian
                            $('#clearButton').show(); // Menampilkan tombol clear
                        } else {
                            $('#ormasDetail').html('<p>Data tidak ditemukan</p>').show();
                            $('#clearButton')
                        .show(); // Menampilkan tombol clear meski data tidak ditemukan
                        }
                    },
                    error: function() {
                        Swal.close(); // Menutup loading alert
                        $('#ormasDetail').html('<p>Gagal memuat data</p>').show();
                        $('#clearButton').show(); // Menampilkan tombol clear saat terjadi error
                    }
                });
            });

            // Hover effect
            $(document).on('mouseenter', '.search-item', function() {
                $(this).css('background-color', '#f0f0f0');
            });
            $(document).on('mouseleave', '.search-item', function() {
                $(this).css('background-color', '');
            });

            // Reset form when input is cleared
            $('#search').on('keyup', function() {
                if ($(this).val().length === 0) {
                    $('#results').empty();
                    $('#no-results').hide();
                    $('#searchForm').show(); // Menampilkan kembali form pencarian saat input dikosongkan
                    $('#ormasDetail').hide(); // Sembunyikan detail data saat input dikosongkan
                    $('#searchPrompt').show(); // Menampilkan prompt pencarian
                    $('#clearButton').hide(); // Sembunyikan tombol clear
                }
            });

            // Event handler for Clear button
            $('#clearButton').on('click', function() {
                $('#ormasDetail').empty().hide(); // Menghapus dan menyembunyikan detail data
                $('#searchForm').show(); // Menampilkan kembali form pencarian
                $('#searchPrompt').show(); // Menampilkan prompt pencarian
                $('#clearButton').hide(); // Menyembunyikan tombol clear
                $('#search').val(''); // Kosongkan input pencarian
            });
        });
    </script>
@endsection
