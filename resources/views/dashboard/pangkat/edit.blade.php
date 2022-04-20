@extends('layout.form')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="#">Edit Pangkat</a></li>
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
            <h1 class="h3 mb-3 fw-normal">Edit Pangkat</h1>

            @if (session()->has('pangkat_sudah_ada'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('pangkat_sudah_ada') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="/dashboard/pangkat/{{ $pangkat->id }}" method="post" enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="form-floating rounded-top"> 
                <select class="custom-select form-control @error('pangkat_id') is-invalid @enderror" id="pangkat_id" name="pangkat_id" placeholder="pangkat_id" required >
                    <option selected value="{{ old('pangkat_id', $pangkat->pangkat_id) }}">{{ $pangkat->pangkat->nama }}</option>
                    @foreach ($pangkats as $pangkat)
                      @if (old('pangkat_id') == $pangkat->id)
                        <option selected value="{{ $pangkat->id }}">{{ $pangkat->nama }}</option>
                      @else
                        <option value="{{ $pangkat->id }}">{{ $pangkat->nama }}</option>
                      @endif
                    @endforeach
                  </select>
                @error('pangkat_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" class="form-control @error('no_surat_keterangan') is-invalid @enderror" id="no_surat_keterangan" name="no_surat_keterangan" placeholder="no_surat_keterangan" value="{{ old('no_surat_keterangan', $no_surat_keterangan) }}" required >
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
                <div class="form-floating mt-4">
                  <input class="form-control @error('surat_keterangan') is-invalid @enderror" style="padding: 27px 0 20px 25px;" type="file" name="surat_keterangan" id="surat_keterangan">
                  <label for="surat_keterangan" style="padding: 0.6rem .75rem;">Surat Keterangan</label>
                  @error('surat_keterangan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                
                <button class="w-100 btn btn-lg btn-warning" style="margin: 20px 0" type="Submit"><i class="bi bi-pen"></i>&nbsp; Edit Pangkat</button>
            </form>

          </main>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection