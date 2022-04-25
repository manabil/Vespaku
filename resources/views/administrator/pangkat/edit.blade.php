@extends('layout.form')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/pangkat">Manajemen Pangkat</a></li>
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

            <form action="/pangkat/{{ $pangkat->slug }}" method="post" enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="form-floating">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="nama" required value="{{ old('nama', $pangkat->nama) }}">
                <label for="nama">Nama Pangkat</label>
                @error('nama')
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