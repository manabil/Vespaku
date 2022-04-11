@extends('layout.page')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="#">Manajemen Request</a></li>
    </ol>
    <h2>{{ $title }}</h2>
  </div>
</section><!-- End Breadcrumbs -->
@endsection

<!-- ======= Blog Single Section ======= -->
@section('content')
<section id="blog" class="blog">
  

  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="entries">
        
        <article class="entry entry-single">
          <h2 class="entry-title">
            <a href="blog-single.html">Daftar Request</a>
          </h2>

          <div class="table-responsive">
            <table class="table table-hover table-borderless entry-table ">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Username</th>
                  <th scope="col">File Yang Direquest</th>
                  <th scope="col">Tanggal Request</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
                <tbody>
                  <tr>
                      <th scope="row">1</th>
                      <td>cecep_wahidin</td>
                      <td>SK CPNS</td>
                      <td>02-02-2022 18:18:16</td>
                      <td>
                        <a href="" class="btn btn-sm btn-outline-success mx-2 mb-2"><i class="bi bi-check-square"></i>Terima</a>
                        <a href="" class="btn btn-sm btn-outline-danger mx-2"><i class="bi bi-x-square"></i>Tolak</a>
                      </td>
                    </tr>
                </tbody>
            </table>
          </div>
          
          <h2 class="entry-title">
            <a href="blog-single.html">Riwayat Request</a>
          </h2>

          <div class="table-responsive">
            <table class="table table-hover table-borderless entry-table ">
              <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">File Yang Direquest</th>
                    <th scope="col">Tanggal Request</th>
                    <th scope="col">Tanggal Aksi</th>
                    <th scope="col">Aksi</th>
                </tr>
              </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>cecep_wahidin</td>
                    <td>SK CPNS</td>
                    <td>02-02-2022 18:18:16</td>
                    <td>02-02-2022 18:18:16</td>
                    <td>
                      <a href="" class="btn btn-sm btn-outline-success disabled"><i class="bi bi-check-square"></i>Diterima</a>
                    </td>
                    </tr>
                </tbody>
            </table>
          </div>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection


@section('footer')
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

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