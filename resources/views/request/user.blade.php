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
                <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="{{ $pegawai->nama }}" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-8">
              <h1 class="entry-heading">{{ $pegawai->nama }}</h1>
              
                <div class="table-responsive">
                  <table class="table table-borderless my-0">
                      <tr>
                        <td><h5>NIP</h5></td>
                        <td>:</td>
                        <td><h5>{{ $pegawai->nip }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Pangkat</h5></td>
                        <td>:</td>
                        <td>
                          @if ($pangkats->isNotEmpty())
                            @foreach ($pangkats->take(1) as $pangkat)
                            <h5>{{ $pangkat->pangkat->nama }}</h5>
                            @endforeach
                          @else
                            <h5 class="text-danger">Data Masih Kosong</h5>
                          @endif
                        </td>
                        
                      </tr>
                      <tr>
                        <td><h5>Jabatan</h5></td>
                        <td>:</td>
                        <td>
                          @if ($jabatans->isNotEmpty())
                            @foreach ($jabatans->take(1) as $jabatan)
                            <h5><strong>{{ $jabatan->jenis_jabatan->nama }}</strong> - {{ $jabatan->jabatan->nama }}</h5>
                            @endforeach
                          @else
                            <h5 class="text-danger">Data Masih Kosong</h5>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th><h5>Email</h5></th>
                        <td>:</td>
                        <td><h5>{{ $pegawai->email }}</h5></td>
                      </tr>
                  </table>
                </div>  
                
              </div>
          </div>

          <h2 class="entry-title">
            <a href="blog-single.html">Daftar Kepangkatan</a>
          </h2>

          @if ($pangkats->isNotEmpty())
            <div class="table-responsive">
              <table class="table table-hover table-borderless entry-table ">
                <thead>
                  <tr>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">No. SK</th>
                    <th scope="col">Tanggal Ditambah</th>
                    <th scope="col">Diubah</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($pangkats as $pangkat)
                    <tr>
                        <th scope="row">{{ $pangkat->pangkat->nama }}</th>
                        <td>{{ date('Y', strtotime($pangkat->tmt)) }}</td>
                        <td>{{ $pangkat->no_surat_keterangan }}</td>
                        <td>{{ $pangkat->created_at }}</td>
                        <td>{{ $pangkat->updated_at->diffForHumans() }}</td>
                        <td>
                          <form action="{{ '/cari/'.$pangkat->slug.'/token' }}" method="get">
                            <input type="hidden" name="username" value="{{ $pegawai->username }}">
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-download"></i>&nbsp; Unduh</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          @else
            <p class="text-danger">Data Masih Kosong.</p>
            @endif
            
            <h2 class="entry-title">
              <a href="blog-single.html">Daftar Jabatan</a>
            </h2>
            
          @if ($jabatans->isNotEmpty())
            <div class="table-responsive">
              <table class="table table-hover table-borderless entry-table ">
                <thead>
                  <tr>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">No. SK</th>
                    <th scope="col">Tanggal Ditambah</th>
                    <th scope="col">Diubah</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($jabatans as $jabatan)
                    <tr>
                        <th scope="row">{{ $jabatan->jabatan->nama }}</th>
                        <td>{{ date('Y', strtotime($jabatan->tmt)) }}</td>
                        <td>{{ $jabatan->no_surat_keterangan }}</td>
                        <td>{{ $jabatan->created_at }}</td>
                        <td>{{ $jabatan->updated_at->diffForHumans() }}</td>
                        <td>
                          <form action="{{ '/cari/'.$jabatan->slug.'/token' }}" method="get">
                            <input type="hidden" name="username" value="{{ $pegawai->username }}">
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-download"></i>&nbsp; Unduh</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          @else
            <p class="text-danger">Data Masih Kosong.</p>
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