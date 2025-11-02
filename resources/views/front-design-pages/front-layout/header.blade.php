<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BTS</title>
  <meta name="robots" content="noindex, follow" />
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Marhey:wght@300..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Place favicon.png in the root directory -->
  <link rel="shortcut icon" href="{{ asset('front-assets/img/logo.png') }}" type="image/x-icon" />
  <!-- Font Icons css -->
  <link rel="stylesheet" href="{{ asset('front-assets/css/font-icons.css') }}">
  <!-- plugins css -->
  <link rel="stylesheet" href="{{ asset('front-assets/css/plugins.css') }}">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
  <!-- Responsive css -->
  <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
<!-- إضافة Tom Select -->
<!-- TomSelect CSS -->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<!-- TomSelect JS -->
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>


<!-- تفعيل Tom Select -->
<script>
    new TomSelect("#categorySelect",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
</script>

@yield('page-style')
</head>

<body  style="overflow-x: hidden;">
  <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

  <!-- Add your site or application content here -->
  <div class="body-wrapper @yield('page-class')" id="@yield('page-id')">

    @include('front-design-pages.front-layout.navbar')
