<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VESPaKU | {{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="template/img/logo.png" rel="icon">
  <link href="template/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="template/vendor/aos/aos.css" rel="stylesheet">
  <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="template/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="template/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="template/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="template/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="template/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  @yield('header')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    @yield('breadcrumbs')

    <!-- ======= Content Section ======= -->
    @yield('content')
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @yield('footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="template/vendor/purecounter/purecounter.js"></script>
  <script src="template/vendor/aos/aos.js"></script>
  <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="template/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="template/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="template/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="template/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="template/js/main.js"></script>

</body>

</html>