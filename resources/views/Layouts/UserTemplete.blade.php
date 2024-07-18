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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: "Inter", sans-serif; /* Pindahkan ke sini agar keseluruhan halaman menggunakan font Inter */
        }
        main.content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .footer-content {
            background-color: #102d50;
            color: white !important;
            padding: 1rem 0;
            width: 100%;
            text-align: center; /* Tengahkan teks di dalam footer */
        }
    </style>
</head>
<body class="d-flex flex-column">
    @include('Layouts.NavbarUser')
    <!-- content -->
    <div class="container d-flex flex-column py-5 my-5">
        @yield('content')
    </div>
    <!-- footer -->
    <div class="mt-auto footer-content fixed-bottom ">
        <div class="col-md-12 justify-content-center text-center font-kanit">
            <p>&copy; 2023 Kesbanpol</p>
        </div>
    </div>
    @include('Layouts.script')
    @yield('scripts')
</body>
</html>
