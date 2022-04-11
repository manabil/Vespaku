@extends('layout.page')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="#">Detail Pangkat</a></li>
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
                <h1 class="entry-heading">{{ $pangkat->nama }}</h1>
                
                <div class="table-responsive">
                  <table class="table table-borderless my-0">
                      <tr>
                        <td><h5>Tahun masuk</h5></td>
                        <td>:</td>
                        <td><h5>{{ $pangkat->tahun_masuk }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>No Surat Keterangan</h5></td>
                        <td>:</td>
                        <td><h5>{{ $pangkat->no_surat_keterangan }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Surat Keterangan</h5></td>
                        <td>:</td>
                        <td><h5>{{ $pangkat->surat_keterangan }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Ditambah Pada Tanggal</h5></td>
                        <td>:</td>
                        <td><h5>{{ $pangkat->created_at }}</h5></td>
                      </tr>
                      <tr>
                        <td><h5>Diubah Pada Tanggal</h5></td>
                        <td>:</td>
                        <td><h5>{{ $pangkat->updated_at }}</h5></td>
                      </tr>
                    </table>
                </div>
          </div>
          <div class="row">
            <div class="d-flex mt-5" style="justify-content: end; align-items: flex-end">
                <a href="" class="btn btn-outline-warning btn-md"><i class="bi bi-pen"></i>&nbsp; Ubah</a>
                <a href="" class="btn btn-outline-primary btn-md mx-2"><i class="bi bi-download"></i>&nbsp; Download</a>
                <a href="" class="btn btn-outline-danger btn-md "><i class="bi bi-trash"></i>&nbsp; Hapus</a>
            </div>
          </div>
        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection