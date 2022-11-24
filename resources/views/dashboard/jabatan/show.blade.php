@extends('layout.page')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="#">Detail Jabatan</a></li>
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
                <h1 class="entry-heading">{{ $jabatan->jabatan->nama }}</h1>
                
                <div class="table-responsive">
                  <table class="table table-borderless my-0">
                      <tr>
                        <td><h5>Jenis Jabatan</h5></td>
                        <td>:</td>
                        <td><h5>{{ $jabatan->jenis_jabatan->nama }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Tahun masuk</h5></td>
                        <td>:</td>
                        <td><h5>{{ date('j F Y', strtotime($jabatan->tmt)) }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>No Surat Keterangan</h5></td>
                        <td>:</td>
                        <td><h5>{{ $jabatan->no_surat_keterangan }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Ditambah Pada Tanggal</h5></td>
                        <td>:</td>
                        <td><h5>{{ $jabatan->created_at }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Diubah Pada Tanggal</h5></td>
                        <td>:</td>
                        <td><h5>{{ $jabatan->updated_at }}</h5></td>
                      </tr>
                    </table>
                </div>

                <div class="container">
                  <div class="my-4 d-flex justify-content-center">
                    <embed src="{{ asset($jabatan->surat_keterangan) }}" type="application/pdf" frameBorder="0" scrolling="auto" height="600px" width="75%"></embed>
                  </div>
                </div>

                <div class="mt-5">
                  <div class="col mx-2 my-2" style="float: right">
                    <form action="/dashboard/jabatan/{{ $jabatan->slug }}" method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-outline-danger btn-md " onclick="return confirm('Apakah Anda yakin ingin menghapus ?')"><i class="bi bi-trash"></i>&nbsp; Hapus</button>
                    </form>
                  </div>
                  <div class="col my-2" style="float: right">
                    <a href="{{ asset($jabatan->surat_keterangan) }}" class="btn btn-outline-primary btn-md"><i class="bi bi-download"></i>&nbsp; Download</a>
                  </div>
                  <div class="col mx-2 my-2" style="float: right">
                    <a href="/dashboard/jabatan/{{ $jabatan->slug }}/edit" class="btn btn-outline-warning btn-md"><i class="bi bi-pen"></i>&nbsp; Ubah</a>
                  </div>
                </div>
          </div>
          
        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection