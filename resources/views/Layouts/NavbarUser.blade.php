  <!-- navbar -->
  <nav class="navbar navbar-expand-lg font-popins fixed-top navbar-custom ">
    <div class="container">
      <a class="navbar-brand " href="#">
        <img src="{{ asset('custom/asset/Group 2.png') }}" alt="Logo" class="img-fluid">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end text-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item" >
            <a class="nav-link"  href="/">BERANDA</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/">PRODUK HUKUM</a>
          </li>
          <li class="nav-item ">
            <a href="{{ url('/database') }}" class="nav-link {{ request()->is('database*') ? 'active-user' : '' }}">DATABASE ORMAS</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/">LAYANAN ORMAS</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end navbar -->
