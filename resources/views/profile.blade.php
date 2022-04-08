@extends('layout.page')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/cari">Cari Pegawai</a></li>
      <li><a href="#">Profile Pegawai</a></li>
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
          <div class="row">
              <div class="col-lg-4">
                  <div class="entry-image">
                    <img src="https://source.unsplash.com/400x400?profile" alt="" class="img-fluid">
                  </div>
              </div>
              <div class="col-lg-8">
                  <h5>INI MENU DASHBOARD</h5>
                  
              </div>
          </div>

          <h2 class="entry-title">
            <a href="blog-single.html">Daftar Kepangkatan</a>
          </h2>

          <div class="table-responsive">
            <table class="table table-hover table-borderless entry-table ">
              <thead>
                <tr>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Tahun</th>
                  <th scope="col">No. SK</th>
                  <th scope="col">Tanggal Ditambah</th>
                  <th scope="col">Tanggal Diubah</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
                <tbody>
                  <tr>
                      <th scope="row">Pengatur Muda II / IV A</th>
                      <td>2022</td>
                      <td>123/5654/ 654/54</td>
                      <td>02-02-2022 18:18:16</td>
                      <td>02-02-2022 18:18:16</td>
                      <td>
                        <a href="" class="btn btn-sm btn-outline-primary"><i class="bi bi-download"></i>Unduh</a>
                      </td>
                    </tr>
                </tbody>
            </table>
          </div>
          
          <h2 class="entry-title">
            <a href="blog-single.html">Daftar Jabatan</a>
          </h2>

          <div class="table-responsive">
            <table class="table table-hover table-borderless entry-table ">
              <thead>
                <tr>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Tahun</th>
                  <th scope="col">No. SK</th>
                  <th scope="col">Tanggal Ditambah</th>
                  <th scope="col">Tanggal Diubah</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
                <tbody>
                  <tr>
                      <th scope="row">Analis Data dan Kepegawaian</th>
                      <td>2022</td>
                      <td>123/5654/ 654/54</td>
                      <td>02-02-2022 18:18:16</td>
                      <td>02-02-2022 18:18:16</td>
                      <td>
                        <a href="" class="btn btn-sm btn-outline-primary"><i class="bi bi-download"></i>Unduh</a>
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