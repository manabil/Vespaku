<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  
    <a href="/" class="logo d-flex align-items-center">
        <img src="{{ asset('template/img/logo.png') }}" alt="">
        <span>VESPaKU</span>
    </a>
  
    <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto {{ $title === 'Cari Pegawai' ? 'active' : ''}}" href="/cari">Cari Pegawai</a></li>
        <li><a class="nav-link scrollto {{ $title === 'Visualisasi Pegawai' ? 'active' : ''}}" href="/graph">Visualisasi</a></li>
        @auth
            <li><a class="nav-link scrollto" href="/request"><i class="bi bi-bell"></i></a></li>   
            <li class="dropdown"><a href="#"><span class="btn btn-outline-primary btn-sm"> {{ openssl_decrypt(str_replace('-', '/', auth()->user()->username), 'AES-128-ECB', 'VESPaKU') }}</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="/dashboard">User Profile</a></li>
                    @canany(['admin', 'super_admin'])
                        <li><a href="/user">Data User</a></li>
                        <li><a href="/pangkat">Data Pangkat</a></li>
                        <li><a href="/jabatan">Data Jabatan</a></li>
                    @endcan 
                    <li class="dropdown-divider"></li>
                    <li>
                        <form id="form-submit" action="/logout" method="post">
                            @csrf
                            <a href="#" onclick="button_logout()" type="submit">Log out</a>
                        </form>
                    </li>
                </ul>
            </li>
        @else
            <li><a class="nav-link scrollto {{ $title === 'Login' ? 'active' : ''}}" href="/login">Login</a></li>
            <li><a class="getstarted scrollto {{ $title === 'Daftar' ? 'active' : ''}}" href="/daftar">Daftar</a></li>
        @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar --> 
  
    </div>
</header><!-- End Header -->