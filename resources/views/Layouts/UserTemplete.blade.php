<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('custom/asset/Group 168.png') }}" type="image/png" />
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
    <style>
        /* CSS untuk dropdown menu */
        .navbar-collapse {
            display: none;
        }

        .navbar-collapse.show {
            display: block;
        }
        .navbar-toggler-icon i {
            color: white;
        }
        </style>

</head>
<body class="d-flex flex-column ">
    @include('Layouts.NavbarUser')
    <!-- content -->
    <div class="container d-flex flex-column py-5 my-5">
        @yield('content')
    </div>
    <!-- footer -->
    <div class="mt-auto footer-content fixed-bottom ">
        <div class="col-md-12 justify-content-center text-center font-kanit">
            <p>&copy; 2024 Kesbangpol</p>
        </div>
    </div>
    @include('Layouts.script')
    @yield('scripts')
    <script>
        $(document).ready(function(){
            if (window.location.pathname.includes('/alur-lapor')) {
                $('.register-ormas').addClass('br-bottom');
                $('.search-ormas').addClass('br-left br-bottom');
            }
            if (window.location.pathname.includes('/register')) {
                $('.alur-lapor').addClass('br-bottom');
                $('.search-ormas').addClass('br-bottom');
            }
            if (window.location.pathname.includes('/search')) {
                $('.alur-lapor').addClass('br-bottom');
                $('.register-ormas').addClass('br-bottom');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Event handler untuk tombol toggle
            $('.navbar-toggler').click(function() {
            var target = $($(this).data('bs-target'));
            // Toggle kelas 'show' pada menu
            target.toggleClass('show');
            // Toggle aria-expanded atribut
            var isExpanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', !isExpanded);
            });

            // Menutup menu jika area di luar menu diklik
            $(document).click(function(event) {
            if (!$(event.target).closest('.navbar-toggler, .navbar-collapse').length) {
                $('.navbar-collapse').removeClass('show');
                $('.navbar-toggler').attr('aria-expanded', 'false');
            }
            });
        });
    </script>
</body>
</html>
