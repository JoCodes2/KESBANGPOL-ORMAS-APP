@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Search Ormas</h3>
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


@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            var cardHtml = '<div class="card mt-3">' +
                                '<div class="card-header">' +
                                '<h5>' + ormas.nama_ormas + '</h5>' +
                                '</div>' +
                                '<div class="card-body">' +
                                '<p>Singkatan: ' + ormas.singkatan_ormas + '</p>' +
                                '<p>Bidang: ' + ormas.bidang_ormas + '</p>' +
                                '<p>Legalitas: ' + ormas.legalitas_ormas + '</p>' +
                                '<p>Alamat: ' + ormas.alamat_kesekretariatan + '</p>' +
                                '<p>Ketua: ' + ormas.nama_ketua + '</p>' +
                                '<p>No. HP Ketua: ' + ormas.no_hp_ketua + '</p>' +
                                '<p>Sekretaris: ' + ormas.nama_sekretaris + '</p>' +
                                '<p>No. HP Sekretaris: ' + ormas.no_hp_sekretaris + '</p>' +
                                '<p>Bendahara: ' + ormas.nama_bendahara + '</p>' +
                                '<p>No. HP Bendahara: ' + ormas.no_hp_bendahara + '</p>' +
                                '<p>NPWP: ' + ormas.npwp + '</p>' +
                                '<p>Tanggal Berdiri: ' + ormas.tanggal_berdiri + '</p>' +
                                '<p>Masa Berlaku: ' + ormas.masa_berlaku_ormas + '</p>' +
                                '</div>' +
                                '</div>';
                            $('#ormasDetail').html(cardHtml)
                                .show(); // Menampilkan card dengan detail data
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
                }
            });
        });
    </script>
@endsection
