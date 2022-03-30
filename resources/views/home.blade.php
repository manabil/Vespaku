@extends('layout.main')

<!-- ======= Hero Section ======= -->
@section('content')
<section id="hero" class="hero d-flex align-items-center">

<div class="container">
    <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Visualisasi Elektronik Sistem Pola Karir Utama</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">Merupakan aplikasi yang memberikan gambaran utama pola kinerja pegawai internal BPMPK</h2>
        <div data-aos="fade-up" data-aos-delay="600">
        <div class="text-center text-lg-start">
            <a href="http://vespaku.test/cari" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
            <span>Cari Pegawai</span>
            <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        </div>
    </div>
    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="template/img/hero-img.png" class="img-fluid" alt="">
    </div>
    </div>
</div>

</section><!-- End Hero -->
@endsection

<!-- ======= Values Section ======= -->
@section('features')
<main id="main">
<section id="values" class="values">

    <div class="container" data-aos="fade-up">

    <header class="section-header">
        <h2>Kelebihan</h2>
        <p>Mengapa perlu menggunakan VESPaKU</p>
    </header>

    <div class="row">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="box">
            <img src="template/img/values-3.png" class="img-fluid" alt="">
            <h3>Cepat dan Mudah</h3>
            <p>Akses, monitoring, dan unduh berkas menjadi lebih mudah dan cepat.</p>
        </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
        <div class="box">
            <img src="template/img/values-2.png" class="img-fluid" alt="">
            <h3>Aman dan Handal</h3>
            <p>Dengan sistem request membuat setiap berkas yang diunduh menjadi lebih aman.</p>
        </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
        <div class="box">
            <img src="template/img/values-1.png" class="img-fluid" alt="">
            <h3>Sistem Termanajemen</h3>
            <p>Setiap pengguna dapat mengatur pangkat, jabatan, dan berkas dengan lebih mudah.</p>
        </div>
        </div>

    </div>

    </div>

</section><!-- End Values Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

    <div class="row gy-4">

        <div class="col-lg-3 col-md-6">
        <div class="count-box">
            <i class="bi bi-people"></i>
            <div>
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Pegawai</p>
            </div>
        </div>
        </div>

        <div class="col-lg-3 col-md-6">
        <div class="count-box">
            <i class="bi bi-download" style="color: #ee6c20;"></i>
            <div>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Berkas Diunduh</p>
            </div>
        </div>
        </div>

        <div class="col-lg-3 col-md-6">
        <div class="count-box">
            <i class="bi bi-briefcase" style="color: #15be56;"></i>
            <div>
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Jabatan</p>
            </div>
        </div>
        </div>

        <div class="col-lg-3 col-md-6">
        <div class="count-box">
            <i class="bi bi-person-badge" style="color: #bb0852;"></i>
            <div>
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Pangkat</p>
            </div>
        </div>
        </div>

    </div>

    </div>
</section><!-- End Counts Section -->

</main><!-- End #main -->
@endsection

<!-- ======= Footer ======= -->
@section('footer')
<footer id="footer" class="footer">

<div class="footer-top">
    <div class="container">
    <div class="row gy-4">
        <div class="col-lg-7 col-md-12 footer-info">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="template/img/logo.png" alt="">
            <span>VESPaKU</span>
        </a>
        <p>Visualisasi Elektronik Sistem Pola Karir Utama (VESPaKU) merupakan produk dari Balai Pengembangan Multimedia Pendidikan dan Kebudayaan, KEMDIKBUD. Aplikasi web ini dibuat untuk mempermudah dalam memanajemen pangkat dan jabatan setiap pegawai di BPMPK.</p>
        <div class="social-links mt-3">
            <a href="https://twitter.com/bpmpk_kemdikbud" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/medukasi" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/bpmpk_kemdikbud/" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCnrUNgD_hlY6rRHEszYIIEA" class="youtube"><i class="bi bi-youtube"></i></a>
        </div>
        </div>

        
        <div class="col-lg-5 col-md-12 footer-contact text-center text-md-start">
        <h4>Hubungi Kami</h4>
        <p>
            Jl. Mr. Koessoebiyono Tjondro Wibowo <br>
            Kel. Pakintelan, Kec Gunung Pati, Kodya Semarang 50227 <br>
            Jawa Tengah - Indonesia <br><br>
            <strong>Fax:</strong> 024-8310051<br>
            <strong>Phone:</strong> 024-8314292<br>
            <strong>Email:</strong> bpmultimedia@kemdikbud.go.id<br>
        </p>

        </div>

    </div>
    </div>
</div>

<div class="container">
    <div class="copyright">
    Copyright &copy; <strong><span>Balai Pengembangan Multimedia Pendidikan dan Kebudayaan</span></strong>
    </div>
    <div class="credits">
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</div>
</footer><!-- End Footer -->
@endsection