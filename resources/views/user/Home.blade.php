
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Image/sps.png') }}" type="image/png" />
    <title>Lapor Ormas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('Layouts.style')
    <link rel="stylesheet" href="{{ asset('custom/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('custom/css/hero.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
        background-image: url("{{ asset("custom/asset/78786.jpg") }}");
        background-size: cover;
        font-family: "Inter", sans-serif;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-transparent fixed-top">
        <div class="container col-md-8">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('custom/asset/Group 168.png') }}" alt="Logo" class="img-fluid">
            </a>
        </div>
    </nav>
    <main class="hero-section container col-md-8">
        <div class="text-center">
            <h2 class="title-welcome fw-bold ">SELAMAT DATANG DI SILADMAS</h2>
            <h5 class="title-desc fw-bold">(SISTEM INFORMASI LAYANAN DAN DATABASE ORMAS)</h5>
        </div>
        <div class="card-hero pt-5 mt-4">
            <div class="row justify-content-center">
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="card text-center">
                        <div class="d-flex justify-content-center pt-4">
                            <img src="{{ asset('custom/asset/treaty_4960697.png') }}" alt="...">
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <h5 class="card-title fw-bold"><a href="/" class="text-dark">PRODUK HUKUM</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="card text-center">
                        <div class="d-flex justify-content-center pt-4">
                            <img src="{{ asset('custom/asset/networking_1239719.png') }}"  alt="...">
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <h5 class="card-title fw-bold"><a href="/database" class="text-dark">DATABASE ORMAS</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="card text-center">
                        <div class="d-flex justify-content-center pt-4">
                            <img src="{{ asset('custom/asset/collaboration_16089714.png') }}"  alt="...">
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <h5 class="card-title fw-bold"><a href="/alur-lapor" class="text-dark">LAYANAN ORMAS</a></h5>
                        </div>
                    </div>
                </div>
            </div>
    </main>
   <footer class="fixed-bottom container">
        <div class="col-md-8 mx-auto text-center desc">
            <p class="fw-bold">copyright © 2023 Kesbangpol</p>
            <p class="fw-bold">BADAN KESATUAN BANGSA DAN POLITIK <br> PROVINSI SULAWESI TENGAH</p>
        </div>
    </footer>
    @include('Layouts.script')
    <script>

    </script>
</body>

</html>
