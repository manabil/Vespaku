@extends('layout.page')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/jabatan">Manajemen Jabatan</a></li>
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
          <form action="/jabatan" >
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Tuliskan Jabatan">
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
          @if ($jabatans->isNotEmpty())
            @if (request('search'))
              <h2 class="entry-title mb-3">Ditemukan "{{ request('search') }}"</h2>
            @else
              <h2 class="entry-title mb-3"><a href="#">Daftar Jabatan</a></h2>
            @endif

            <a href="/jabatan/create" class="btn btn-lg btn-outline-success mt-3" style="margin: 0 0 10px 0"> <i class="bi bi-plus"></i>&nbsp; Tambah Jabatan</a>

            <div class="table-responsive">
              @if (session()->has('alert_jabatan'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('alert_jabatan') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @elseif (session()->has('jabatan_dihapus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('jabatan_dihapus') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              <table class="table table-hover table-borderless entry-table ">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($jabatans as $jabatan)
                    <tr>
                        <th scope="row">{{ $loop->iteration + ($page == '' ? 0 : (($page*10) - 10)) }}</th>
                        <td>{{ $jabatan->nama }}</td>
                        <td>{{ $jabatan->slug }}</td>
                        <td>
                          <div class="container d-flex justify-content-center">
                            <a href="/jabatan/{{ $jabatan->slug }}/edit" class="btn btn-sm btn-outline-warning mx-1"><i class="bi bi-pen mx-0"></i></a>
                            <form action="/jabatan/{{ $jabatan->slug }}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn btn-sm btn-outline-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus ?')"><i class="bi bi-trash"></i></button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          
          @else
            <h2 class="entry-title"><a href="#">Pencarian Tidak ditemukan</a></h2>
          @endif

          <!-- Pagination -->
          <div class="d-flex justify-content-end">
            {{ $jabatans->links() }}
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