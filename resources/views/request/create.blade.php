@extends('layout.form')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
        <li><a href="/">Home</a></li>
        <li><a href="/cari">Cari Pegawai</a></li>
        <li><a href="/cari/{{ $username }}">Profile Pegawai</a></li>
        <li><a href="/cari/{{ $pangkat->slug }}/token?username={{ $username }}">Unduh File</a></li>
        <li><a href="#">Request File</a></li>
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
        
        <article class="entry entry-single login-entry">

          <main class="form-signin">

            <h1 class="h3 mb-3 fw-normal">Keterangan</h1>
            @if ($type === 'pangkat')
              <form action="/cari/pangkat/{{ $pangkat->slug }}/request" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="owner" value="{{ $pangkat->user_id }}">
                <input type="hidden" name="request_file" value="{{ $pangkat->pangkat->nama }}">
                <input type="hidden" name="type" value="{{ $type }}">
                <input type="hidden" name="aksi" value="proses">
                <input type="hidden" name="token" value="">
                <input type="hidden" name="surat_keterangan" value="">
                <input type="hidden" name="slug" value="{{ $pangkat->slug }}">
                <input type="hidden" name="is_downloaded" value="0">

                <div class="form-floating">
                  <textarea name="keterangan" id="keterangan" class="form-control" style="height: 10rem"></textarea>
                  <label for="keterangan">Optional <small class="text-danger">*</small></label>
                  @error('keterangan')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
            
                <button class="w-100 btn btn-lg btn-warning" style="margin: 20px 0"><i class="bi bi-chat-left"></i>&nbsp; Request file</button>
              </form>
            @else
              <form action="/cari/jabatan/{{ $jabatan->slug }}/request" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="owner" value="{{ $jabatan->user_id }}">
                <input type="hidden" name="request_file" value="{{ $jabatan->jabatan->nama }}">
                <input type="hidden" name="type" value="{{ $type }}">
                <input type="hidden" name="aksi" value="proses">
                <input type="hidden" name="token" value="">
                <input type="hidden" name="surat_keterangan" value="">
                <input type="hidden" name="slug" value="{{ $jabatan->slug }}">
                <input type="hidden" name="is_downloaded" value="0">

                <div class="form-floating">
                  <textarea name="keterangan" id="keterangan" class="form-control" style="height: 10rem"></textarea>
                  <label for="keterangan">Optional <small class="text-danger">*</small></label>
                  @error('keterangan')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
            
                <button class="w-100 btn btn-lg btn-warning" style="margin: 20px 0"><i class="bi bi-chat-left"></i>&nbsp; Request file</button>
              </form>
            @endif

          </main>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
  
</section><!-- End Blog Single Section -->
@endsection