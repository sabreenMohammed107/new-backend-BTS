<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BTS</title>
  <meta name="robots" content="noindex, follow" />
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Place favicon.png in the root directory -->
  <link rel="shortcut icon" href="{{ asset('front-assets/img/icons/ico.png') }}" type="image/x-icon" />
  <!-- Font Icons css -->
  <link rel="stylesheet" href="{{ asset('front-assets/css/font-icons.css') }}">
  <!-- plugins css -->
  <link rel="stylesheet" href="{{ asset('front-assets/css/plugins.css') }}">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
  <!-- Responsive css -->
  <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
@yield('page-style')
</head>

<body>
  <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

  <!-- Add your site or application content here -->
  <div class="body-wrapper @yield('page-class')" id="@yield('page-id')">

    @include('front-design-pages.front-layout.navbar')
