<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="{{ $web->seo }}" name="keywords">
  <meta content="{{ $web->seo }}" name="description">

  <!-- Favicons -->
  <link href="img/web/{{ $web->logo }}" rel="icon">
  <link href="img/web/{{ $web->logo }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('/template/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('/template/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/template/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/template/lib/cor/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/template/lib/test.css') }}" rel="stylesheet">
  <link href="{{ asset('/template/lib/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/template/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('/template/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target=".navbar">
    @yield('content')

      <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
      <div id="preloader"></div>

      <!-- JavaScript Libraries -->
      <script src="{{ asset('template/lib/jquery/jquery.min.j') }}s"></script>
      <script src="{{ asset('template/lib/jquery/jquery-migrate.min.js') }}"></script>
      <script src="{{ asset('template/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
      <script src="{{ asset('template/lib/superfish/hoverIntent.js') }}"></script>
      <script src="{{ asset('template/lib/superfish/superfish.min.js') }}"></script>
      <script src="{{ asset('template/lib/wow/wow.min.js')}}"></script>
      <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
      <script src="{{ asset('template/lib/counterup/counterup.min.js') }}"></script>
      <script src="{{ asset('template/lib/cor/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('template/lib/isotope/isotope.pkgd.min.js') }}"></script>
      <script src="{{ asset('template/lib/lightbox/js/lightbox.min.j') }}s"></script>
      <script src="{{ asset('template/lib/touchSwipe/jquery.touchSwipe.min.js') }}"></script>
      <script src="{{ asset('template/lib/test/jquery.touchSwipe.min.js') }}"></script>
      <!-- Contact Form JavaScript File -->
      <script src="{{ asset('template/contactform/contactform.js') }}"></script>

      <!-- Template Main Javascript File -->
      <script src="{{ asset('template/js/main.js') }}"></script>
    </body>
    </html>

    @stack('script')
