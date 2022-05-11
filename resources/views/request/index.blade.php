{{-- @dd($get_requests->first()) --}}
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

          @if ($get_requests->where('aksi', 'proses')->isNotEmpty())
            <div class="table-responsive">

              @if (session()->has('request_accepted'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle-fill"></i>&nbsp;
                  {{ session('request_accepted') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif (session()->has('request_rejected'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle-fill"></i>&nbsp;
                  {{ session('request_rejected') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif

              <table class="table table-hover table-borderless entry-table " >
                <thead>
                  <tr>
                    <th scope="col" colspan="2">Username</th>
                    <th scope="col">File Yang Direquest</th>
                    <th scope="col">Tanggal Request</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($get_requests as $request)
                      @if ($request->aksi === 'proses')
                        <tr>
                            <td><img src="{{ ($request->user->foto === '') ? 'https://source.unsplash.com/400x400?profile' : $request->user->foto }}" style="border-radius: 50%; width:60px; height:60px; object-fit: cover;" alt="{{ $request->user->nama }}"></td>
                            <td>{{$request->user->nama}}</td>
                            <td>{{ $request->request_file }}</td>
                            <td>{{ $request->created_at }}</td>
                            <td>
                                <form action="{{ '/request/' . $request->slug }}" method="post" >
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $request->id }}">
                                  <input type="hidden" name="user_id" value="{{ $request->user->id }}">
                                  <input type="hidden" name="owner" value="{{ auth()->user()->id }}">
                                  <input type="hidden" name="request_file" value="{{ $request->request_file }}">
                                  <input type="hidden" name="tanggal_aksi" value="{{ now() }}">
                                  <input type="hidden" name="aksi" value="terima">
                                  <input type="hidden" name="token" value="{{ $token }}">
                                  <input type="hidden" name="surat_keterangan" value="{{ $request->surat_keterangan }}">
                                  <input type="hidden" name="slug" value="{{ $request->slug }}">
                                  <input type="hidden" name="is_downloaded" value="0">
                                  <button class="btn btn-sm btn-outline-success mx-2"><i class="bi bi-check-square"></i>&nbsp; Terima</button>
                                </form>
                                <form action="{{ '/request/' . $request->slug }}" method="post">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $request->id }}">
                                  <input type="hidden" name="user_id" value="{{ $request->user->id }}">
                                  <input type="hidden" name="owner" value="{{ auth()->user()->id }}">
                                  <input type="hidden" name="request_file" value="{{ $request->request_file }}">
                                  <input type="hidden" name="tanggal_aksi" value="{{ now() }}">
                                  <input type="hidden" name="aksi" value="tolak">
                                  <input type="hidden" name="token" value="">
                                  <input type="hidden" name="is_downloaded" value="0">
                                  <button class="btn btn-sm btn-outline-danger mx-2"><i class="bi bi-x-square"></i>&nbsp; Tolak</button>
                                </form>
                            </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
              </table>
            </div>
          @else
            <p class="text-danger">Tidak Ada Request Yang Masuk</p>
          @endif
          
          <h2 class="entry-title">
            <a href="blog-single.html">Riwayat Request</a>
          </h2>

          @if ($set_requests->isNotEmpty())
            <div class="table-responsive">
              @if (session()->has('request_added'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle-fill"></i>&nbsp;
                  {{ session('request_added') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <table class="table table-hover table-borderless entry-table ">
                <thead>
                  <tr>
                      <th scope="col" colspan="2">Username</th>
                      <th scope="col">File Yang Direquest</th>
                      <th scope="col">Tanggal Request</th>
                      <th scope="col">Tanggal Aksi</th>
                      <th scope="col">Token</th>
                      <th scope="col">Aksi</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($set_requests as $request)
                          <tr>
                            <td><img src="{{ ($request->user->foto === '') ? 'https://source.unsplash.com/400x400?profile' : $request->user->foto }}" style="border-radius: 50%; width:60px; height:60px; object-fit: cover;" alt="{{ $request->user->nama }}"></td>
                            <td>{{ $username->where('id', $request->owner)->pluck('nama')[0] }}</td>
                            <td>{{ $request->request_file }}</td>
                            <td>{{ $request->created_at }}</td>
                            <td>{{ $request->tanggal_aksi }}</td>
                            @if ($request->aksi === 'terima')
                              <td>{{ $request->token }}</td>
                              <td><a href="" class="btn btn-sm btn-outline-success disabled"><i class="bi bi-check-square"></i>&nbsp; Diterima</a></td>
                            @elseif ($request->aksi === 'proses')
                              <td> - </td>
                              <td><a href="" class="btn btn-sm btn-outline-warning disabled"><i class="bi bi-arrow-clockwise"></i>&nbsp; Diproses</a></td>
                            @else
                              <td> - </td>
                              <td><a href="" class="btn btn-sm btn-outline-danger disabled"><i class="bi bi-x-square"></i>&nbsp; Ditolak</a></td>
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