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

          @if ($requests->isNotEmpty())
            <div class="table-responsive">
              <table class="table table-hover table-borderless entry-table ">
                <thead>
                  <tr>
                    <th scope="col" colspan="2">Username</th>
                    <th scope="col">File Yang Direquest</th>
                    <th scope="col">Tanggal Request</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($requests as $request)
                      @if ($request->aksi === 'proses')
                        <tr>
                            <td><img src="{{ ($request->user->foto === '') ? 'https://source.unsplash.com/400x400?profile' : $request->user->foto }}" style="border-radius: 50%; width:60px; height:60px; object-fit: cover;" alt="{{ $request->user->nama }}"></td>
                            <td>{{$request->user->nama}}</td>
                            <td>{{ $request->request_file }}</td>
                            <td>{{ $request->created_at }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-outline-success mx-2"><i class="bi bi-check-square"></i>&nbsp; Terima</a>
                                <a href="" class="btn btn-sm btn-outline-danger mx-2"><i class="bi bi-x-square"></i>&nbsp; Tolak</a>
                            </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
              </table>
            </div>
          @else
            <h5 class="text-danger">Data Masih Kosong</h5>
          @endif
          
          <h2 class="entry-title">
            <a href="blog-single.html">Riwayat Request</a>
          </h2>

          @if ($requests->isNotEmpty())
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
                    @foreach ($requests as $request)
                        @if ($request->aksi !== 'proses')
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $request->user->nama }}</td>
                            <td>{{ $request->request_file }}</td>
                            <td>{{ $request->created_at }}</td>
                            <td>{{ $request->tanggal_aksi }}</td>
                            <td>
                              @if ($request->aksi === 'terima')
                                <a href="" class="btn btn-sm btn-outline-success disabled"><i class="bi bi-check-square"></i>&nbsp; Diterima</a>
                              @else
                                <a href="" class="btn btn-sm btn-outline-danger disabled"><i class="bi bi-x-square"></i>&nbsp; Ditolak</a>
                              @endif
                            </td>
                          </tr>
                        @endif
                    @endforeach
                  </tbody>
              </table>
            </div>
          @else
            <h5 class="text-danger">Data Masih Kosong</h5>
          @endif

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