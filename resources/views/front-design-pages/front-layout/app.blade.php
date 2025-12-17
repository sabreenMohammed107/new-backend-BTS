@include('front-design-pages.front-layout.header')

@yield('page-content')

@if (!Request::is('contact-us') && !Request::is('thanks'))
    @include('front-design-pages.front-layout.contact')
@endif


@include('front-design-pages.front-layout.footer')

<!-- WhatsApp Fixed Icon -->
<div class="whatsapp-fixed-icon">
    @if(isset($staticContact) && $staticContact->details6)
        @php
            // Strip everything except numbers to make the link work
            $whatsappNumber = preg_replace('/[^0-9]/', '', $staticContact->details6);
        @endphp

        <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener noreferrer" aria-label="Contact us on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    @endif
</div>

