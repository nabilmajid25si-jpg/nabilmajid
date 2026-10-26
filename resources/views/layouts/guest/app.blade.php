<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Guest') - Mana ERP</title>
  <meta name="description" content="Mana ERP">

  <!-- Favicons -->
  <link href="{{ asset('ilanding/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('ilanding/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('ilanding/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('ilanding/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('ilanding/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('ilanding/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('ilanding/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('ilanding/assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('ilanding/assets/css/auth.css') }}" rel="stylesheet">
</head>

<body class="@yield('body-class', 'guest-page')">

  {{-- Partial: header --}}
  @include('layouts.guest.header')

  <main class="main">
    {{-- Partial: flash message / alert --}}
    @include('layouts.guest.alerts')

    @yield('content')
  </main>

  {{-- Partial: footer --}}
  @include('layouts.guest.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('ilanding/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('ilanding/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('ilanding/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('ilanding/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('ilanding/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('ilanding/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('ilanding/assets/js/main.js') }}"></script>

</body>

</html>
