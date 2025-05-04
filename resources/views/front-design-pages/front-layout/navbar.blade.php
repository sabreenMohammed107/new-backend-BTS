<!-- HEADER AREA START (header-5) -->
<header class="ltn__header-area ltn__header-5 ltn__header-transparent-- gradient-color-4---">

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white ltn__logo-right-menu-option plr--9---">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="{{ url('/') }}"><img width="135" src="{{ asset('front-assets/img/logo.png') }}" alt="Logo"></a>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column menu-color-white---">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li class="{{ request()->routeIs('main-home') ? 'active' : '' }}">
                                        <a href="{{ route('main-home') }}">HOME</a>
                                    </li>
                                    <li class="{{ request()->routeIs('about-bts') ? 'active' : '' }}">
                                        <a href="{{ route('about-bts') }}">ABOUT BTS</a>
                                    </li>
                                    <li class="menu-icon {{ request()->routeIs('category.show') ? 'active' : '' }}">
                                        <a href="#">TRAINING CATEGORY</a>
                                        <ul>
                                            @isset($categories)
                                                @foreach ($categories as $category )
                                                    <li class="{{ request()->routeIs('category.show') && request('id') == $category->id ? 'active' : '' }}">
                                                        <a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->category_en_name }}</a>
                                                    </li>
                                                @endforeach
                                            @endisset
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('join-us') ? 'active' : '' }}">
                                        <a href="{{ route('join-us') }}">Join US</a>
                                    </li>
                                    <li class="special-link-in {{ request()->routeIs('contact-us') ? 'active' : '' }}">
                                        <a href="{{ route('contact-us') }}">Contact Us</a>
                                    </li>
                                    <li class="special-link {{ request()->routeIs('download-center') ? 'active' : '' }}">
                                        <a href="{{ route('download-center') }}">Download center</a>
                                    </li>
                                </ul>

                            </div>
                        </nav>
                    </div>
                </div>
                <div class="ltn__header-options ltn__header-options-2 mb-sm-20">
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
<!-- HEADER AREA END -->

<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head" style="justify-content: center;">

            <div class="site-logo">
                <a href="{{ url('/') }}"><img width="135" src="{{ asset('img/logo/250.jpg') }}" alt="Logo"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>

        <div class="ltn__utilize-menu text-center">
            <ul class="text-center">
                <li><a href="{{ route('main-home') }}">HOME</a>

                </li>
                <li><a href="{{ route('about-bts') }}">ABOUT BTS</a>

                </li>

                <li><a href="#">TRAINING CATEGORY</a>
                    <ul class="sub-menu">
                        @isset($categories)
                        @foreach ($categories as $category )
                        <li><a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->category_en_name }}</a></li>
                        @endforeach
                       @endisset
                    </ul>
                </li>
                <li><a href="{{ route('join-us') }}">Join US</a>

                </li>

            </ul>
        </div>
        <div class="ltn__utilize-buttons ltn__utilize-buttons-2 text-center">
            <ul>
                <li class="special-link-in"><a href="{{ route('contact-us') }}">Contact Us</a></li>
                <li class="special-link"><a href="{{ route('download-center') }}">Download center</a></li>
            </ul>
        </div>

    </div>
</div>
<!-- Utilize Mobile Menu End -->
