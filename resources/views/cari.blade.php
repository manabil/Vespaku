@extends('layout.page')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/cari">Cari Pegawai</a></li>
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
          <form action="/cari" >
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Tuliskan Nama Pegawai">
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
          @if ($pegawai->isNotEmpty())
            @if (request('search'))
              <h2 class="entry-title mb-3">Ditemukan "{{ request('search') }}"</h2>
            @else
              <h2 class="entry-title mb-3">
                <a href="#">Daftar Pegawai</a>
              </h2>
            @endif

            <div class="table-responsive">
              <table class="table table-hover table-borderless entry-table">
                <thead>
                  <tr>
                    <th scope="col" class="no" colspan="2">Pegawai</th>
                    <th scope="col">Jabatan Terakhir</th>
                    <th scope="col">Pangkat Terakhir</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                @foreach ($pegawai as $p)
                  <tbody>
                    <tr>
                      <th scope="row" class="no"><img src="{{ ($p->foto=='') ? 'https://source.unsplash.com/400x400?profile' : $p->foto }}" style="border-radius: 50%; width:60px; height:60px; object-fit: cover;" alt="{{ $p->nama }}"></th>
                      <td>{{ $p->nama }}</td>
                      <td>{{ $p->jabatan->last()->nama }}</td>
                      <td>{{ $p->pangkat->last()->nama }}</td>
                      <td>{{ $p->nip }}</td>
                      @if (auth()->check())
                        <td><a href="{{ $p->id == auth()->user()->id ? '/dashboard' : '/cari/'. $p->username }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-eye" style="margin:auto 10px"></i>Lihat</a></td>
                      @else
                        <td><a href="/cari/{{ ($p->username) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-eye" style="margin:auto 10px"></i>Lihat</a></td>
                      @endif
                    </tr>
                  </tbody>
                @endforeach
              </table>
            </div>
          @else
            <h2 class="entry-title">
              <a href="#">Pencarian Tidak ditemukan</a>
            </h2>
          @endif

          <!-- Pagination -->
          <div class="d-flex justify-content-end">
            {{ $pegawai->links() }}
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