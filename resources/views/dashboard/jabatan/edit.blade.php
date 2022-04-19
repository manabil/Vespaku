@dd($jabatan->nama)
@extends('layout.form')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="#">Edit Jabatan</a></li>
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
            <h1 class="h3 mb-3 fw-normal">Edit Jabatan</h1>

            @if (session()->has('jabatan_sudah_ada'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('jabatan_sudah_ada') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="/dashboard/jabatan/{{ $jabatan->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-floating rounded-top"> 
                    <select class="custom-select form-control @error('jabatan_id') is-invalid @enderror" id="jabatan_id" name="jabatan_id" placeholder="jabatan_id" required>
                        {{-- <option selected value="{{ old('jabatan_id', $jabatan->jabatan_id) }}">{{ old('jabatan_id', $nama_jabatan) }}</option> --}}
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
                    <select class="custom-select form-control @error('jenis_jabatan_id') is-invalid @enderror" id="jenis_jabatan_id" name="jenis_jabatan_id" placeholder="jenis_jabatan_id" required>
                        <option selected value="{{ old('jenis_jabatan_id', $jabatan->jenis_jabatan_id) }}">{{ old('jenis_jabatan_id', $nama_jenis_jabatan) }}</option>
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
                    <input type="text" class="form-control @error('no_surat_keterangan') is-invalid @enderror" id="no_surat_keterangan" name="no_surat_keterangan" placeholder="no_surat_keterangan" required value="{{ old('no_surat_keterangan', $no_surat_keterangan) }}">
                    <label for="no_surat_keterangan">No Surat Keterangan</label>
                    @error('no_surat_keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                  <input type="date" class="form-control @error('tmt') is-invalid @enderror" id="tmt" name="tmt" placeholder="tmt" required value="{{ old('tmt', $tmt) }}">
                  <label for="tmt">Terhitung Mulai Tanggal</label>
                  @error('tmt')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-floating">
                  <input class="form-control @error('surat_keterangan') is-invalid @enderror" style="padding: 27px 0 20px 25px;" type="file" name="surat_keterangan" id="surat_keterangan">
                  <label for="surat_keterangan" style="padding: 0.6rem .75rem;">Surat Keterangan</label>
                  @error('surat_keterangan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
                    
                    <button class="w-100 btn btn-lg btn-warning" style="margin: 20px 0" type="Submit"><i class="bi bi-pen"></i>&nbsp; Edit Jabatan</button>
            </form>

          </main>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection