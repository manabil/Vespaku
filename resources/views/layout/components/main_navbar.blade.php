<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="http://vespaku.test/" class="logo d-flex align-items-center">
        <img src="template/img/logo.png" alt="">
        <span>VESPaKU</span>
    </a>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#values">Fitur</a></li>
            <li><a class="nav-link scrollto" href="#footer">Tentang</a></li>
        @auth
            <li class="dropdown"><a href="#"><span class="btn btn-outline-primary btn-sm"> {{ auth()->user()->username }}</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="/dashboard">User Profile</a></li>
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
            <li><a class="nav-link scrollto" href="/login">Login</a></li>
            <li><a class="getstarted scrollto" href="/daftar">Daftar</a></li>
        @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar --> 

    </div>
</header><!-- End Header --> 