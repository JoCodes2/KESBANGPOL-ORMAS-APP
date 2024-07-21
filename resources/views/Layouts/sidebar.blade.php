<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/cms/dashboard" class="brand-link">
        <img src="{{ asset('custom/asset/Group 2.png') }}" alt="AdminLTE Logo" class="img-fluid"
            style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/cms/dashboard" class="nav-link {{ request()->is('cms/dashboard*') ? 'active-custom' : '' }}">
                        <i class="nav-icon fa-solid fa-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cms/produk-hukum') }}"
                        class="nav-link {{ request()->is('cms/produk-hukum*') ? 'active-custom' : '' }}">
                        <i class="nav-icon fa-solid fa-book"></i>
                        <p>Produk Hukum</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cms/alur-lapor-ormas') }}"
                        class="nav-link {{ request()->is('cms/alur-lapor-ormas*') ? 'active-custom' : '' }}">
                        <i class="nav-icon fa-solid fa-pen"></i>
                        <p>Alur Lapor Ormas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cms/ormas') }}"
                        class="nav-link {{ request()->is('cms/ormas*') ? 'active-custom' : '' }}">
                        <i class="nav-icon fa-solid fa-database"></i>
                        <p>Data Ormas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cms/document-ormas') }}"
                        class="nav-link {{ request()->is('cms/document-ormas*') ? 'active-custom' : '' }}">
                        <i class="fa-solid fa-file nav-icon"></i>
                        <p>Dokumen Persyaratan</p>
                    </a>
                </li>

                @if (auth()->check() && auth()->user()->role =='admin')
                <li class="nav-item">
                    <a href="{{ url('/cms/user') }}" class="nav-link {{ request()->is('cms/user*') ? 'active-custom' : '' }}">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
