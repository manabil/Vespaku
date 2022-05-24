<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VESPaKU | {{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('template/img/logo.png') }}" rel="icon">
  <link href="{{ asset('template/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!-- Template Main CSS File -->
  <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Navbar ======= -->
  @include('layout.components.page_navbar')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    @yield('breadcrumbs')

    <!-- ======= Search bar ======= -->
    @yield('search_bar')

    <!-- ======= Content Section ======= -->
    @yield('content')
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @yield('footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('template/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('template/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('template/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('template/js/main.js') }}"></script>

  <script>
    function button_logout() {
        document.getElementById("form-submit").submit();
    }
  </script>

</body>

</html>