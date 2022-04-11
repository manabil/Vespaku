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
                  <div class="entry-image card">
                    <img src="https://source.unsplash.com/400x400?profile" alt="" class="card-img">
                    <div class="card-img-overlay d-flex align-items-center">
                      <a href="" class="text-center m-auto"><i class="bi bi-pen btn btn-outline-light btn-lg"></i></a>

                    </div>
                  </div>
              </div>
              <div class="col-lg-8">
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

                  <a href="" class="btn btn-lg btn-outline-success" style="margin: 20px 0 0 30px"> <i class="bi bi-pen" style="margin-right: 15px"></i>Ubah Data</a>
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
                  @foreach ($pangkats as $pangkat)
                  <tr>
                      <th scope="row">{{ $pangkat->pangkat->nama }}</th>
                      <td>{{ $pangkat->tahun_masuk }}</td>
                      <td>{{ $pangkat->no_surat_keterangan }}</td>
                      <td>{{ $pangkat->created_at }}</td>
                      <td>{{ $pangkat->updated_at }}</td>
                      <td>
                        <a href="/dashboard/pangkat/{{ $pangkat->id }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-eye mx-0"></i></a>
                        <a href="" class="btn btn-sm btn-outline-success"><i class="bi bi-pen mx-0"></i></a>
                        <a href="" class="btn btn-sm btn-outline-primary"><i class="bi bi-download mx-0"></i></a>
                        <a href="" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash mx-0"></i></a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

          <a href="" class="btn btn-lg btn-outline-success" style="margin: 0 0 10px 0"> <i class="bi bi-plus" style="margin-right: 15px"></i>Tambah Pangkat</a>
          
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
                  @foreach ($jabatans as $jabatan)
                  <tr>
                      <th scope="row">{{ $jabatan->jabatan->nama }}</th>
                      <td>{{ $jabatan->tahun_masuk }}</td>
                      <td>{{ $jabatan->no_surat_keterangan }}</td>
                      <td>{{ $jabatan->created_at }}</td>
                      <td>{{ $jabatan->updated_at }}</td>
                      <td>
                        <a href="/dashboard/jabatan/{{ $jabatan->id }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-eye mx-0"></i></a>
                        <a href="" class="btn btn-sm btn-outline-success"><i class="bi bi-pen mx-0"></i></a>
                        <a href="" class="btn btn-sm btn-outline-primary"><i class="bi bi-download mx-0"></i></a>
                        <a href="" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash mx-0"></i></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>

          <a href="" class="btn btn-lg btn-outline-success" style="margin: 0 0 10px 0"> <i class="bi bi-plus" style="margin-right: 15px"></i>Tambah Jabatan</a>

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