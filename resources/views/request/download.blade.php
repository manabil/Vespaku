@extends('layout.page')

<!-- ======= Blog Single Section ======= -->
@section('content')
<div class="container">
    <div class="my-4 d-flex justify-content-center">
      <embed src="{{ asset('storage/' . $pangkat->surat_keterangan) }}" type="application/pdf" frameBorder="0" scrolling="auto" height="600px" width="75%"></embed>
    </div>
</div>
@endsection