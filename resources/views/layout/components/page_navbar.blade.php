<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  
    <a href="http://vespaku.test/" class="logo d-flex align-items-center">
        <img src="{{ asset('template/img/logo.png') }}" alt="">
        <span>VESPaKU</span>
    </a>
  
    <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto {{ $title === 'Home' ? 'active' : ''}}" href="/">Home</a></li>
        <li><a class="nav-link scrollto {{ $title === 'Cari Pegawai' ? 'active' : ''}}" href="/cari">Cari Pegawai</a></li>
        <li><a class="nav-link scrollto {{ $title === 'Login' ? 'active' : ''}}" href="/login">Login</a></li>
        <li><a class="getstarted scrollto {{ $title === 'Daftar' ? 'active' : ''}}" href="/daftar">Daftar</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar --> 
  
    </div>
</header><!-- End Header -->