@extends('layout.page')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="#">Cari Pegawai</a></li>
    </ol>
    <h2>{{ $title }}</h2>
  </div>
</section><!-- End Breadcrumbs -->
@endsection

<!-- ======= Search Bar ======= -->
@section('search_bar')
<footer id="footer" class="footer">
  <div class="footer-newsletter">
    <div class="container" data-aos="fade-down" data-aos-duration="1000">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <form action="" method="post">
            <input type="email" name="email" placeholder="Tuliskan Nama Pegawai">
            <input type="submit" value="Cari">
          </form>
        </div>
      </div>
    </div>
  </div>
</footer>
@endsection

<!-- ======= Blog Single Section ======= -->
@section('content')
<section id="blog" class="blog">
  

  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="entries">

        <article class="entry entry-single">

          <h2 class="entry-title">
            <a href="blog-single.html">Daftar Pegawai</a>
          </h2>

          <div class="table-responsive">
            <table class="table table-hover table-borderless entry-table">
              <thead>
                <tr>
                  <th scope="col" class="no">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nama Jabatan Terakhir</th>
                  <th scope="col">Jenis Jabatan Terakhir</th>
                  <th scope="col">NIP</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              @foreach ($pegawai as $no=>$p)
                <tbody>
                  <tr>
                    <th scope="row" class="no">{{ $no+1 }}</th>
                    <td>{{ $p->pegawai->nama }}</td>
                    <td>{{ $p->jabatan->nama }}</td>
                    <td>{{ $p->jenis_jabatan->nama }}</td>
                    <td>{{ $p->pegawai->nip }}</td>
                    <td><a href="/cari/{{ $p->pegawai->username }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-eye" style="margin:auto 10px"></i>Lihat</a></td>
                  </tr>
                </tbody>
              @endforeach
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