@extends('layout.form')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
        <li><a href="/">Home</a></li>
        <li><a href="/cari">Cari Pegawai</a></li>
        <li><a href="/cari/{{ $username }}">Profile Pegawai</a></li>
        <li><a href="#">Unduh File</a></li>
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
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if (session()->has('login_error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('login_error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal">Masukkan Token</h1>
            <form action="/cari/{pangkat:slug}/token" method="post">
              @csrf

              <div class="form-floating">
                <input type="text" name="token" class="form-control @error('token') is-invalid @enderror" placeholder="token" autofocus required value="{{ old('token') }}">
                <label for="token">Token</label>
                @error('token')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
          
              <button class="w-100 btn btn-lg btn-primary" style="margin: 20px 0"><i class="bi bi-download"></i>&nbsp; Unduh file</button>
            </form>

            <form action="{{ '/cari/'.$pangkat->slug.'/request' }}" method="get">
              <input type="hidden" name="username" value="{{ $username }}">
              <small>Belum request file ? <button style="border: none; color:dodgerblue; background-color:transparent">Request File</button></small>
            </form>
          </main>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection