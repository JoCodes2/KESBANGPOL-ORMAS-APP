@extends('Layouts.master')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title"><i class="fas fa-list-alt pr-2"></i>Dashboard</h4>
            <h1></h1>
        </div>

        <!-- Card Section -->
        <div class="row py-4">
            <!-- Card Total -->
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <div class="card text-white card-hover card-shadow-blue" style="background-color: #0d47a1;">
                    <div class="card-body">
                        <h5 class="card-title">Produk Hukum</h5>
                        <h3 class="card-text" id="total-ProdukHukum">123</h3>
                    </div>
                </div>
            </div>

            <!-- Card Total Ditinjau -->
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <div class="card text-white card-hover card-shadow-green" style="background-color: #0ad05a;">
                    <div class="card-body">
                        <h5 class="card-title">Alur Lapor Keberadaan Ormas</h5>
                        <h3 class="card-text" id="total-ReportOrmas">45</h3>
                    </div>
                </div>
            </div>

            <!-- Card Total Belum Ditinjau -->
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <div class="card text-white card-hover card-shadow-orange" style="background-color: #e77510;">
                    <div class="card-body">
                        <h5 class="card-title">Data Ormas</h5>
                        <h3 class="card-text" id="total-Ormas">78</h3>
                    </div>
                </div>
            </div>

            <!-- Card Total Belum Ditinjau -->
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <div class="card text-white card-hover card-shadow-ligthblue" style="background-color: #64b5f6;">
                    <div class="card-body">
                        <h5 class="card-title">Dokumen Persyaratan</h5>
                        <h3 class="card-text" id="total-Document">78</h3>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center row">
                <div class="col-sm-7">
                    <div class="card-body ">
                        <h1 class=" text-primary fw-bold">Selamat Datang! 🎉 <span> @auth
                                {{ auth()->user()->name }}
                            @endauth</span></h1>
                        <br>
                        <h4 class="mb-5">SILADMAS, Sistem Informasi Layanan Dan Database Ormas.</h4>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-start">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('dist/img/welcome.png') }}" class="img-fluid" alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Card Section -->
    </div>
@endsection

@section('style')
    <style>
        .card-hover {
            transition: transform 0.3s ease-in-out;
        }

        .card-hover:hover {
            transform: scale(1.05);
        }

        .card-shadow-blue {
            box-shadow: -5px -10px 2px #0d48a160;
        }

        .card-shadow-green {
            box-shadow: -5px -10px 2px #0ad0596e;
        }

        .card-shadow-orange {
            box-shadow: -5px -10px 2px #e774108d;
        }

        .card-shadow-ligthblue {
            box-shadow: -5px -10px 2px #64b4f686;
        }

    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/v1/dashboard', // Ganti dengan endpoint yang benar
                method: 'GET',
                success: function(response) {
                    console.log(response);
                    $('#total-ProdukHukum').text(response.total_ProdukHukum);
                    $('#total-ReportOrmas').text(response.total_ReportOrmas);
                    $('#total-Ormas').text(response.total_Ormas);
                    $('#total-Document').text(response.total_Document);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    </script>
@endsection
