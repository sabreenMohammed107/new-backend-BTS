@include('front-design-pages.front-layout.header')

@yield('page-content')

@if (!Request::is('contact-us') && !Request::is('thanks'))
    @include('front-design-pages.front-layout.contact')
@endif


@include('front-design-pages.front-layout.footer')

<!-- WhatsApp Fixed Icon -->
<div class="whatsapp-fixed-icon">
    <a href="https://wa.me/971505419377" target="_blank" rel="noopener noreferrer" aria-label="Contact us on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
</div>

