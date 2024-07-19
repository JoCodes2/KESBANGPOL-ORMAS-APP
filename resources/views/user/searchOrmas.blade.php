@extends('Layouts.UserTemplete')

@section('content')
    <div class="py-4">
        <div class="py-4 d-flex flex-row align-items-center justify-content-center">
            <h3 class="m-0 font-weight-bold">LAPOR KEBERADAAN ORMAS</h3>
        </div>

        <div class="d-flex justify-content-around position-relative">
            <a href="/alur-lapor"
                class="btn btn-link text-dark {{ request()->is('alur-lapor*') ? 'border-bottom-right' : '' }}">Alur Lapor
                Keberadaan Ormas</a>
            <a href="/register"
                class="btn btn-link text-dark {{ request()->is('register*') ? 'border-top-active ' : '' }}">Formulir Lapor
                Keberadaan Ormas</a>
            <a href="/search" class="btn btn-link text-dark {{ request()->is('search*') ? 'border-bottom-left' : '' }}">Revisi
                Lapor Keberadaan Ormas</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Silahkan Input Nama/Singkatan Ormas</h3>
        </div>
        <div class="card-body">
            <form id="searchForm">
                <div class="form-group">
                    <input type="text" id="search" name="keyword" class="form-control" placeholder="Search Ormas...">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <ul id="results" class="list-group mt-2"></ul>
            <p id="no-results" class="text-muted mt-2" style="display: none;">Tidak ada data</p>
        </div>
    </div>
    <!-- Container untuk menampilkan detail data -->
    <div id="ormasDetail" style="display: none;"></div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Menggunakan event submit form untuk melakukan pencarian
            $('#searchForm').submit(function(event) {
                event.preventDefault(); // Mencegah form untuk melakukan submit standar

                var keyword = $('#search').val();
                if (keyword.length > 0) {
                    $.ajax({
                        url: '/v1/ormas/search-ormas', // Pastikan URL ini benar
                        method: 'GET',
                        data: {
                            keyword: keyword
                        },
                        success: function(response) {
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
                $.ajax({
                    url: '/v1/ormas/get-by-name',
                    method: 'GET',
                    data: {
                        nama_ormas: namaOrmas
                    },
                    success: function(response) {
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
                            $('#ormasDetail').html(tableHtml)
                                .show(); // Menampilkan tabel dengan detail data
                            $('#searchForm').hide(); // Menyembunyikan form pencarian
                        } else {
                            $('#ormasDetail').html('<p>Data tidak ditemukan</p>').show();
                        }
                    },
                    error: function() {
                        $('#ormasDetail').html('<p>Gagal memuat data</p>').show();
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
                }
            });
        });
    </script>
@endsection
