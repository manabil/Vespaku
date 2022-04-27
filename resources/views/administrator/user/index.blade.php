@extends('layout.page')

<!-- ======= Breadcrumbs ======= -->
@section('breadcrumbs')
<section class="breadcrumbs"  data-aos="zoom-out" data-aos-duration="1000">
  <div class="container">
    <ol>
      <li><a href="/">Home</a></li>
      <li><a href="/user">Manajemen User</a></li>
    </ol>
    <h2>{{ $title }}</h2>
  </div>
</section><!-- End Breadcrumbs -->
@endsection

<!-- ======= Search Bar ======= -->
@section('search_bar')
<footer id="footer" class="footer">
  <div class="footer-newsletter">
    <div class="container" data-aos="fade-down" data-aos-duration="1000">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <form action="/user" >
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Tuliskan Nama Pegawai">
            <input type="submit" value="Cari">
          </form>
        </div>
      </div>
    </div>
  </div>
</footer>
@endsection

<!-- ======= Blog Single Section ======= -->
@section('content')
<section id="blog" class="blog">
  

  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="entries">
        
        <article class="entry entry-single">
          @if ($users->isNotEmpty())
              @if (request('search'))
                <h2 class="entry-title mb-3">Ditemukan "{{ request('search') }}"</h2>
              @else
                <h2 class="entry-title mb-3">
                  <a href="#">Daftar Pegawai</a>
                </h2>
              @endif
          

            <div class="table-responsive">
              @if (session()->has('alert_user'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i>&nbsp; 
                {{ session('alert_user') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @elseif (session()->has('user_dihapus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle-fill"></i>&nbsp;
                  {{ session('user_dihapus') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              
              <table class="table table-hover table-borderless entry-table ">
                <thead>
                  <tr>
                    <th scope="col" colspan="2">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Pangkat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th><img src="{{ ($user->foto=='') ? 'https://source.unsplash.com/400x400?profile' : $user->foto }}" style="border-radius: 50%; width:60px; height:60px; object-fit: cover;" alt="{{ $user->nama }}"></th>
                        <td>
                          {{ $user->nama }} 
                          @if ($user->user_type === 'super_admin')
                            <br><sub class="fs-8 text-danger">(Super Administrator)</sub>
                          @elseif ($user->user_type === 'admin')
                            <br><sub class="fs-9 text-success">(Administrator)</sub>
                          @endif
                        </td>
                        <td>{{ $user->nip }}</td>
                        <td>{{ $user->jabatan->last()->nama }}</td>
                        <td>{{ $user->pangkat->last()->nama }}</td>
                        <td>
                          <div class="container d-flex justify-content-center">
                            <a href="{{ $user->id == auth()->user()->id ? '/dashboard' : '/user/'. $user->username }}" class="btn btn-sm btn-outline-primary mx-1"><i class="bi bi-eye mx-0"></i></a>
                            @can('super_admin')
                              @if ($user->user_type === 'user')
                                <form action="/user/{{ $user->username }}" method="post">
                                  @csrf
                                  @method('put')
                                  <input type="hidden" name="user_type" value="admin">
                                  <button class="btn btn-sm btn-outline-success mx-1"><i class="bi bi-person-check mx-0"></i></button>
                                </form>
                                <form action="/user/{{ $user->username }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-sm btn-outline-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus ?')"><i class="bi bi-trash"></i></button>
                                </form>
                              @elseif ($user->user_type === 'admin')
                                <form action="/user/{{ $user->username }}" method="post">
                                  @csrf
                                  @method('put')
                                  <input type="hidden" name="user_type" value="user">
                                  <button class="btn btn-sm btn-outline-dark mx-1"><i class="bi bi-person-dash mx-0"></i></button>
                                </form>
                                <form action="/user/{{ $user->username }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-sm btn-outline-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus ?')"><i class="bi bi-trash"></i></button>
                                </form>
                              @endif
                            @elsecan('admin')
                              @if ($user->user_type === 'user')
                                <form action="/user/{{ $user->username }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-sm btn-outline-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus ?')"><i class="bi bi-trash"></i></button>
                                </form>
                              @endif
                            @endcan
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>

          @else
            <h2 class="entry-title">
              <a href="#">Pencarian Tidak ditemukan</a>
            </h2>
          @endif

          <!-- Pagination -->
          <div class="d-flex justify-content-end">
            {{ $users->links() }}
          </div>
          
        </article><!-- End blog entry -->

      </div><!-- End blog entries list -->

    </div>

  </div>
</section><!-- End Blog Single Section -->
@endsection


@section('footer')
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

  <div class="container">
    <div class="copyright">
    Copyright &copy; <strong><span>Balai Pengembangan Multimedia Pendidikan dan Kebudayaan</span></strong>
    </div>
    <div class="credits">
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</div>
</footer><!-- End Footer -->
@endsection