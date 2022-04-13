@extends('layout.form')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="#">Tambah Jabatan</a></li>
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

      <div class="entries ">
        
        <article class="entry entry-single daftar-entry">
          <main class="form-daftar">
            <h1 class="h3 mb-3 fw-normal">Tambah Jabatan</h1>

            @if (session()->has('jabatan_sudah_ada'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('jabatan_sudah_ada') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="/dashboard/jabatan" method="post">
              @csrf
              <div class="form-floating rounded-top"> 
                <select class="custom-select form-control @error('jabatan_id') is-invalid @enderror" id="jabatan_id" name="jabatan_id" placeholder="jabatan_id" required value="{{ old('jabatan_id') }}">
                  <option selected value="">Jabatan / Pangkat</option>
                    @foreach ($jabatans as $jabatan)
                      @if (old('jabatan_id') == $jabatan->id)
                        <option selected value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                      @else
                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                      @endif
                    @endforeach
                  </select>
                @error('jabatan_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating rounded-top"> 
                <select class="custom-select form-control @error('jenis_jabatan_id') is-invalid @enderror" id="jenis_jabatan_id" name="jenis_jabatan_id" placeholder="jenis_jabatan_id" required value="{{ old('jenis_jabatan_id') }}">
                    <option selected value="">Jenis Jabatan</option>
                    @foreach ($jenis_jabatans as $jenis_jabatan)
                    @if (old('jenis_jabatan_id') == $jenis_jabatan->id)
                      <option selected value="{{ $jenis_jabatan->id }}">{{ $jenis_jabatan->nama }}</option>
                    @endif
                      <option value="{{ $jenis_jabatan->id }}">{{ $jenis_jabatan->nama }}</option>
                    @endforeach
                  </select>
                @error('jenis_jabatan_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" class="form-control @error('no_surat_keterangan') is-invalid @enderror" id="no_surat_keterangan" name="no_surat_keterangan" placeholder="no_surat_keterangan" required value="{{ old('no_surat_keterangan') }}">
                <label for="no_surat_keterangan">No Surat Keterangan</label>
                @error('no_surat_keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
                <div class="form-floating">
                  <input type="date" class="form-control @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk" name="tahun_masuk" placeholder="tahun_masuk" required value="{{ old('tahun_masuk') }}">
                  <label for="tahun_masuk">Terhitung Mulai Tanggal</label>
                  @error('tahun_masuk')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mt-4">
                  <input type="text" class="form-control @error('surat_keterangan') is-invalid @enderror" id="surat_keterangan" name="surat_keterangan" placeholder="surat_keterangan" required value="{{ old('surat_keterangan') }}">
                  <label for="surat_keterangan">Upload File</label>
                  @error('surat_keterangan')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
                
                <button class="w-100 btn btn-lg btn-success" style="margin: 20px 0" type="Submit">Tambah Jabatan</button>
            </form>

          </main>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection