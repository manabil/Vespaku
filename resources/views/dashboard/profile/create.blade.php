@extends('layout.form')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="#">Edit Profile</a></li>
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
            <h1 class="h3 mb-3 fw-normal">Edit Profile</h1>
            <form action="/dashboard/profile" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="username" required value="{{ $pegawai->username }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="nip" required value="{{ $pegawai->nip }}">
                    <label for="nip">NIP</label>
                    @error('nip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="tanggal_lahir" required value="{{ $pegawai->tanggal_lahir }}">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    @error('tanggal_lahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating rounded-top"> 
                    <select class="custom-select form-control @error('pangkat') is-invalid @enderror" id="pangkat" name="pangkat" placeholder="pangkat" required>
                        <option selected>{{ $pangkat_user->first()->pangkat->nama }}</option>
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
                <div class="form-floating rounded-top"> 
                    <select class="custom-select form-control @error('jenis_jabatan') is-invalid @enderror" id="jenis_jabatan" name="jenis_jabatan" placeholder="jenis_jabatan" required>
                        <option selected>{{ $jabatan_user->first()->jenis_jabatan->nama }}</option>
                        @foreach ($jenis_jabatans as $jenis_jabatan)
                            <option value="{{ $jenis_jabatan->id }}">{{ $jenis_jabatan->nama }}</option>
                        @endforeach
                    </select>
                    @error('jenis_jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating rounded-top"> 
                    <select class="custom-select form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" placeholder="jabatan" required>
                        <option selected>{{ $jabatan_user->first()->jabatan->nama }}</option>
                        @foreach ($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                        @endforeach
                    </select>
                    @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mt-4">
                    <input type="text" class="form-control @error('file') is-invalid @enderror" id="file" name="file" placeholder="file" required value="profile.jpg">
                    <label for="file">Upload File</label>
                    @error('file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                    
                    <button class="w-100 btn btn-lg btn-warning" style="margin: 20px 0" type="Submit">Ubah Profile</button>
            </form>

          </main>

        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection