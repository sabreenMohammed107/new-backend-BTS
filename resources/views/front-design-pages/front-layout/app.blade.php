@include('front-design-pages.front-layout.header')

@yield('page-content')

@if (!Request::is('contact-us'))
    @include('front-design-pages.front-layout.contact')
@endif

@include('front-design-pages.front-layout.footer')

