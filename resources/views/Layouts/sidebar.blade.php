<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/" id="dashboard" class="nav-link">
            <i class="nav-icon fa-solid fa-house"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/alur-lapor-ormas') }}" class="nav-link {{ request()->is('alur-lapor-ormas*') ? 'active-custom' : '' }}">
                <i class="nav-icon fa-solid fa-pen"></i>
                <p>Alur Lapor Keberadaan Ormas</p>
            </a>
        </li>
        <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Formulis Keberadaan Ormas
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
                <li class="nav-item">
                    <a href="{{ url('/ormas') }}" class="nav-link {{ request()->is('ormas*') ? 'active-custom' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Ormas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/document-ormas') }}" class="nav-link {{ request()->is('document-ormas*') ? 'active-custom' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dokumen Persyaratan</p>
                    </a>
                </li>

            </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</aside>

