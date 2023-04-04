<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="@yield('description')">
  <meta name="keywords" content="@yield('keywords')">
  <link rel="icon" type="image/x-icon" href="@yield('icon')">
  <meta name="author" content="Yusuf Küçükgökgözoğlu">

  <title>@yield('title')</title>

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/slick-carousel/slick/slick-theme.css">
<!--
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
-->
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
  @yield('css')
  @yield('headerjs')
</head>
<body>
@include('home._header')
@section('content')
    içerik alanı
@show
@include('home._footer')
@yield('footerjs')
</body>
</html>