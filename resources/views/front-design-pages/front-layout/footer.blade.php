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
                    <li><a href="{{ route('join-us') }}">Technical</a></li>
                    {{-- <li><a href="{{ route('soft-skills-page') }}">Soft skills</a></li> --}}
                    <li><a href="{{ route('accreditations') }}">Certified</a></li>
                    <li><a href="">Information Technology</a></li>

                    </ul>
                </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                <div class="footer-widget footer-menu-widget clearfix">
                <h4 class="footer-title">RESOURCES</h4>
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
                        action="https://gmail.us5.list-manage.com/subscribe/post?u=dde0a42ff09e8d43cad40dc82&amp;id=72d274d15d"
                        method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"
                        target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                        <div class="mc-field-group" style="margin-bottom: 15px;">
                            <input type="text" class="footer-input" value="" name="name" class="required name"
                            id="mce-NAME" placeholder="enter your name">
                        </div>

                        <div class="mc-field-group">
                            <input type="email" class="footer-input" value="" name="EMAIL" class="required email"
                            id="mce-EMAIL" placeholder="enter your email">

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
                            <a href="http://"><i class="fab fa-facebook-f"></i></a>
                            </div>
                            <div style="margin-right: 5px;"
                            class="linkedin social-square d-flex justify-content-center align-items-center mr-1">
                            <a href="http://"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <a href="http://" style="margin-right: 5px;">
                            <div class="xtw social-square d-flex justify-content-center align-items-center mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#e7eaee"
                                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                </svg>
                            </div>
                            </a>
                            <div style="margin-right: 5px;"
                            class="insta social-square d-flex justify-content-center align-items-center mr-1">
                            <a href="http://"><i class="fab fa-instagram"></i></a>
                            </div>

                        </div>
                        <button class=" col-3 offset-3 theme-btn-1 btn" type="submit" value="Subscribe" name="subscribe"
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
</body>

</html>
