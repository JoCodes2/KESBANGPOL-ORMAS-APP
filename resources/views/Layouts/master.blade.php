<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lapor Ormas</title>

    @include('Layouts.style')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('custom/asset/Group 168.png') }}" type="image/png" />


</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('Layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content-header')
            <!-- Main content -->
            <section class="content pt-2">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <footer class="main-footer fixed-bottom">
        <div class="float-right d-none d-sm-inline-block">
            <small>Copy Right © By Jocodes</small>
            <b>Version</b> 1.0.0
        </div>
    </footer>

    @include('Layouts.script')
    @yield('script')

</body>

</html>
