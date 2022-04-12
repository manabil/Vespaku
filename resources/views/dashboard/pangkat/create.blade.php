@extends('layout.form')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="#">Tambah Pangkat</a></li>
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
            <h1 class="h3 mb-3 fw-normal">Tambah Pangkat</h1>
            <form action="/dashboard/pangkat" method="post">
              @csrf
              <div class="form-floating rounded-top"> 
                <select class="custom-select form-control @error('pangkat') is-invalid @enderror" id="pangkat" name="pangkat" placeholder="pangkat" required value="{{ old('pangkat') }}">
                    <option selected>Pangkat / Golongan</option>
                    @foreach ($pangkats as $pangkat)
                        <option value="{{ $pangkat->id }}">{{ $pangkat->nama }}</option>
                    @endforeach
                  </select>
                @error('pangkat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="no_sk" class="form-control @error('no_sk') is-invalid @enderror" id="no_sk" name="no_sk" placeholder="no_sk" required value="{{ old('no_sk') }}">
                <label for="no_sk">No Surat Keterangan</label>
                @error('no_sk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
                <div class="form-floating">
                  <input type="date" class="form-control @error('tmt_tanggal') is-invalid @enderror" id="tmt_tanggal" name="tmt_tanggal" placeholder="tmt_tanggal" required value="{{ old('tmt_tanggal') }}">
                  <label for="tmt_tanggal">Terhitung Mulai Tanggal</label>
                  @error('tmt_tanggal')
                  <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mt-4">
                  <input type="text" class="form-control @error('file') is-invalid @enderror" id="file" name="file" placeholder="file" required value="{{ old('file') }}">
                  <label for="file">Upload File</label>
                  @error('file')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
                
                <button class="w-100 btn btn-lg btn-success" style="margin: 20px 0" type="Submit">Tambah Pangkat</button>
            </form>

          </main>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection