    <footer class="ltn__footer-area  ">
        <div class="footer-top-area  plr--5">
        <div class="container-fluid">
            <div class="row">

            <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                <div class="footer-widget footer-menu-widget clearfix">
                <h4 class="footer-title">Company</h4>
                <div class="footer-menu">
                    <ul>
                        <li><a href="{{ route('main-home') }}">Home</a></li>
                        <li><a href="{{ route('about-bts') }}">About Us</a></li>
                        {{-- <li><a href="{{ route('soft-skills-page') }}">Training Category</a></li> --}}
                        <li><a href="{{ route('download-center') }}">Download Center</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                <div class="footer-widget footer-menu-widget clearfix">
                <h4 class="footer-title">JOIN BTS</h4>
                <div class="footer-menu">
                    <ul>
                    <li><a href="{{ route('join-us') }}">jobs</a></li>
                    <li><a href="{{ route('join-us-speaker-page') }}">Speakers</a></li>
                    <li><a href="{{ route('service') }}">Terms of Service</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact US</a></li>

                    </ul>
                </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                <div class="footer-widget footer-menu-widget clearfix">
                <h4 class="footer-title">MAJORS</h4>
                <div class="footer-menu">
                    <ul>
                    @foreach($categories as $category)
                        <li><a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->category_en_name }}</a></li>
                    @endforeach
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                <div class="footer-widget footer-menu-widget clearfix">
                <h4 class="footer-title">SERVICES</h4>
                <div class="footer-menu">
                    <ul>
                    <li><a href="">Public Training</a></li>
                    <li><a href="">In-House Training</a></li>
                    <li><a href="">Consultancy</a></li>
                    <li><a href="">Online Courses</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                <div class="footer-widget footer-newsletter-widget">
                <h4 class="footer-title">Newsletter</h4>
                <p>Stay update with our latest</p>
                <div class="footer-newsletter">
                    <div id="mc_embed_signup">
                    <form
                        action="{{ route('send-newsletter') }}"
                        method="post">
                        @csrf
                        <div id="mc_embed_signup_scroll">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mc-field-group" style="margin-bottom: 15px;">
                                    <input type="text" class="footer-input" value="" name="name" class="required name"
                                    id="mce-NAME" placeholder="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mc-field-group">
                                    <input type="email" class="footer-input" value="" name="email" class="required email"
                                    id="mce-EMAIL" placeholder="email" required>
                                </div>
                            </div>
                        </div>

                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" class="footer-input" name="b_dde0a42ff09e8d43cad40dc82_72d274d15d"
                            tabindex="-1" value="">
                        </div>



                        </div>
                        <div class="row">
                        <div class=" align-self-end footer-social-icon col-6 d-flex justify-content-start mt-2">
                            <div style="margin-right: 5px;"
                                class="face social-square d-flex justify-content-center align-items-center mr-1">
                                <a href="https://www.facebook.com/" target="_blank" class="social-link"><i class="fab fa-facebook-f"></i></a>
                            </div>
                            <div style="margin-right: 5px;"
                                class="linkedin social-square d-flex justify-content-center align-items-center mr-1">
                                <a href="https://www.linkedin.com/" target="_blank" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <a href="https://twitter.com/" target="_blank" style="margin-right: 5px;" class="social-link">
                                <div class="xtw social-square d-flex justify-content-center align-items-center mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="#e7eaee"
                                            d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                    </svg>
                                </div>
                            </a>
                            <div style="margin-right: 5px;"
                                class="insta social-square d-flex justify-content-center align-items-center mr-1">
                                <a href="https://www.instagram.com/" target="_blank" class="social-link"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <button class="col-3 offset-3 theme-btn-1 btn btn-effect-1" type="submit" value="Subscribe" name="subscribe"
                            id="mc-embedded-subscribe"><i class="fas fa-location-arrow"></i></button>
                        </div>

                    </form>
                    </div>
                </div>


                </div>
            </div>

            </div>
        </div>
        </div>
    </footer>
    <!-- FOOTER AREA END -->


</div>
<!-- Body main wrapper end -->

<!-- preloader area start -->
<div class="preloader d-none" id="preloader">
  <div class="preloader-inner">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>
</div>
<!-- preloader area end -->

<!-- All JS Plugins -->
<script src="{{ asset('front-assets/js/plugins.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('front-assets/js/main.js') }}"></script>
@yield('script')

<style>
.social-square {
    width: 40px;
    height: 40px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.social-link {
    color: #e7eaee;
    transition: all 0.3s ease;
}

.face:hover {
    background-color: #1877f2;
}

.face:hover .social-link {
    color: white;
}

.linkedin:hover {
    background-color: #0a66c2;
}

.linkedin:hover .social-link {
    color: white;
}

.xtw:hover {
    background-color: #000000;
}

.xtw:hover svg path {
    fill: white;
}

.insta:hover {
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
}

.insta:hover .social-link {
    color: white;
}
</style>
</body>

</html>
