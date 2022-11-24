@extends('layout.form')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="#">Profile Saya</a></li>
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
        
        <article class="entry entry-single daftar-entry">
          <main class="form-daftar">
            <h1 class="h3 mb-3 fw-normal">Edit Akun</h1>
            <form action="/dashboard/profile/update" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-floating rounded-top"> 
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required value="{{ old('username', openssl_decrypt(str_replace('-', '/', $user->username), 'AES-128-ECB', 'VESPaKU')) }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required value="{{ old('email', $user->email) }}">
                <label for="email">Email</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mt-4">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" required value="{{ old('nama', $user->nama) }}">
                <label for="nama">Nama Lengkap</label>
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="NIP" required value="{{ old('nip', $user->nip) }}">
                <label for="nip">NIP</label>
                @error('nip')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal_lahir" placeholder="Tanggal" required value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                <label for="tanggal">Tanggal Lahir</label>
                @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input class="form-control @error('foto') is-invalid @enderror" style="padding: 27px 0 20px 25px;" type="file" name="foto" id="foto" onchange="previewImage()">
                <label for="foto" style="padding: 0.6rem .75rem;">Foto Profile</label>
                @error('foto')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              
              <img src="{{ $user->foto == '' ? 'https://source.unsplash.com/400x400?profile' : $user->foto }}" class="img-preview card-img img-fluid mt-3" alt="">
          
              <button class="w-100 btn btn-lg btn-warning" style="margin: 20px 0" type="Submit"><i class="bi bi-pen"></i>&nbsp; Edit Akun</button>
            </form>
            <button class="w-100 btn btn-lg btn-danger" onclick="window.history.back()"><i class="bi bi-x"></i>&nbsp; Cancel</button>
          </main>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection