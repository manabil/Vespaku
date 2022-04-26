@extends('layout.page')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="#">Dashboard</a></li>
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
                  <div class="entry-image card">
                    @if (auth()->user()->foto)
                      <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="{{ auth()->user()->nama }}" style="height:400px; object-fit:cover" class="card-img">
                    @else
                      <img src="https://source.unsplash.com/400x400?profile" alt="" class="card-img">
                    @endif
                    <div class="card-img-overlay d-flex align-items-center">
                      <a href="/dashboard/profile/{{ openssl_encrypt(auth()->user()->username, 'AES-128-CBC', 'VESPaKu',0,'1234567891234567') }}" class="text-center m-auto"><i class="bi bi-pen btn btn-outline-light btn-lg"></i></a>
                    </div>
                  </div>
              </div>
              <div class="col-lg-8">
                @if (session()->has('alert_profile'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i>&nbsp;
                    {{ session('alert_profile') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <h1 class="entry-heading">{{ auth()->user()->nama }}</h1>
                
                <div class="table-responsive">
                  <table class="table table-borderless my-0">
                      <tr>
                        <td><h5>Username</h5></td>
                        <td>:</td>
                        <td><h5>{{ auth()->user()->username }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>NIP</h5></td>
                        <td>:</td>
                        <td><h5>{{ auth()->user()->nip }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Tanggal Lahir</h5></td>
                        <td>:</td>
                        <td><h5>{{ auth()->user()->tanggal_lahir }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Pangkat</h5></td>
                        <td>:</td>
                        <td>
                          @foreach ($pangkats->take(1) as $pangkat)
                          <h5>{{ $pangkat->pangkat->nama }}</h5>
                          @endforeach
                        </td>
                      </tr>
                      <tr>
                        <td><h5>Jabatan</h5></td>
                        <td>:</td>
                        <td>
                          @foreach ($jabatans->take(1) as $jabatan)
                          <h5><strong>{{ $jabatan->jenis_jabatan->nama }}</strong> - {{ $jabatan->jabatan->nama }}</h5>
                          @endforeach
                        </td>
                      </tr>
                      <tr>
                        <th><h5>Email</h5></th>
                        <td>:</td>
                        <td><h5>{{ auth()->user()->email }}</h5></td>
                      </tr>
                    </table>
                  </div>
                  <a href="/dashboard/profile/{{ openssl_encrypt(auth()->user()->username, 'AES-128-CBC', 'VESPaKu',0,'1234567891234567') }}" class="btn btn-lg btn-outline-warning" style="margin: 20px 0 0 30px"> <i class="bi bi-pen"></i>&nbsp; Ubah Data</a>
              </div>
          </div>

          <h2 class="entry-title my-3">
            <a href="blog-single.html">Daftar Kepangkatan</a>
          </h2>

          @if (session()->has('alert_pangkat'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle-fill"></i>&nbsp;
              {{ session('alert_pangkat') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @elseif (session()->has('pangkat_dihapus'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle-fill"></i>&nbsp;
              {{ session('pangkat_dihapus') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

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
                  @foreach ($pangkats as $pangkat)
                  <tr>
                      <th scope="row">{{ $pangkat->pangkat->nama }}</th>
                      <td>{{ date('Y',strtotime($pangkat->tmt)) }}</td>
                      <td>{{ $pangkat->no_surat_keterangan }}</td>
                      <td>{{ $pangkat->created_at }}</td>
                      <td>{{ $pangkat->updated_at->diffForHumans() }}</td>
                      <td>
                        <div class="container d-flex justify-content-center">
                            <a href="/dashboard/pangkat/{{ $pangkat->slug }}" class="btn btn-sm btn-outline-primary mx-1"><i class="bi bi-eye mx-0"></i></a>
                            <a href="{{ asset('storage/' . $pangkat->surat_keterangan) }}" class="btn btn-sm btn-outline-success mx-1"><i class="bi bi-download mx-0"></i></a>
                            <a href="/dashboard/pangkat/{{ $pangkat->slug }}/edit" class="btn btn-sm btn-outline-warning mx-1"><i class="bi bi-pen mx-0"></i></a>
                            <form action="/dashboard/pangkat/{{ $pangkat->slug }}" method="post">
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

          <a href="/dashboard/pangkat/create" class="btn btn-lg btn-outline-success" style="margin: 0 0 10px 0"> <i class="bi bi-plus"></i>&nbsp; Tambah Pangkat</a>
          
          <h2 class="entry-title my-3">
            <a href="blog-single.html">Daftar Jabatan</a>
          </h2>

          <div class="table-responsive">
            @if (session()->has('alert_jabatan'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i>&nbsp;
                {{ session('alert_jabatan') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @elseif (session()->has('jabatan_dihapus'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i>&nbsp;
                {{ session('jabatan_dihapus') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <table class="table table-hover table-borderless entry-table ">
              <thead>
                <tr>
                  <th scope="col">Jabatan</th>
                  <th scope="col">Jenis Jabatan</th>
                  <th scope="col">Tahun</th>
                  <th scope="col">No. SK</th>
                  <th scope="col">Tanggal Ditambah</th>
                  <th scope="col">Tanggal Diubah</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
                <tbody>
                  @foreach ($jabatans as $jabatan)
                  <tr>
                      <th scope="row">{{ $jabatan->jabatan->nama }}</th>
                      <td>{{ $jabatan->jenis_jabatan->nama }}</td>
                      <td>{{ date('Y',strtotime($jabatan->tmt)) }}</td>
                      <td>{{ $jabatan->no_surat_keterangan }}</td>
                      <td>{{ $jabatan->created_at }}</td>
                      <td>{{ $jabatan->updated_at->diffForHumans() }}</td>
                      <td>
                        <div class="container d-flex justify-content-center">
                            <a href="/dashboard/jabatan/{{ $jabatan->slug }}" class="btn btn-sm btn-outline-primary mx-1"><i class="bi bi-eye mx-0"></i></a>
                            <a href="{{ asset('storage/' . $jabatan->surat_keterangan) }}" class="btn btn-sm btn-outline-success mx-1"><i class="bi bi-download mx-0"></i></a>
                            <a href="/dashboard/jabatan/{{ $jabatan->slug }}/edit" class="btn btn-sm btn-outline-warning mx-1"><i class="bi bi-pen mx-0"></i></a>
                            <form action="/dashboard/jabatan/{{ $jabatan->slug }}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn btn-sm btn-outline-danger mx-1" onclick="return confirm('Apakah anda yakin akan menghapus')"><i class="bi bi-trash mx-0"></i></button>
                            </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>

          <a href="/dashboard/jabatan/create" class="btn btn-lg btn-outline-success" style="margin: 0 0 10px 0"> <i class="bi bi-plus"></i>&nbsp; Tambah Jabatan</a>

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