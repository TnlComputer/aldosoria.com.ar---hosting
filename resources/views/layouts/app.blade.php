<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Soria Perfomanse') }}</title>
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/favicon.ico">
  <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.ico">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS -->
  <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  {{--
  <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" /> --}}

  {{--
  <link rel="stylesheet" href="{{ asset('black') }}/css/floating-wpp.min.css" /> --}}

</head>

<body class="{{ $class ?? '' }}">
  <div class="wrapper">
    @include('layouts.navbars.sidebar')
    <div class="main-panel">
      @include('layouts.navbars.navbar')

      <div class="content">
        @yield('content')
      </div>

      @include('layouts.footer')
    </div>
  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>

  <script src="{{ asset('black') }}/js/core/jquery.min.js">
  </script>
  <script src="{{ asset('black') }}/js/core/popper.min.js">
  </script>
  <script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>
  <script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-EBHNBVS5KD"></script>
  <script>
    window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-EBHNBVS5KD'); 
  </script>
</body>

</html>