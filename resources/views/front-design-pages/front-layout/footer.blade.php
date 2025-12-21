    <footer class="ltn__footer-area  ">
        <div class="footer-top-area  plr--5">
        <div class="container">
            <div class="row justify-content-between">

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
                <h4 class="footer-title">Join BTS</h4>
                <div class="footer-menu">
                    <ul>
                    <li><a href="{{ route('join-us') }}">Jobs</a></li>
                    <li><a href="{{ route('join-us-speaker-page') }}">Speakers</a></li>
                    {{-- <li><a href="{{ route('service') }}">Terms of Service</a></li> --}}
                    <li><a href="{{ route('contact-us') }}">Contact US</a></li>

                    </ul>
                </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                <div class="footer-widget footer-menu-widget clearfix">
                <h4 class="footer-title">Majors</h4>
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
                <h4 class="footer-title">Services</h4>
                <div class="footer-menu">
                    <ul>
                    <li><a href="{{ route('service') }}#public_training">Public Training</a></li>
                    <li><a href="{{ route('service') }}#in_house_training">In-House Training</a></li>
                    <li><a href="{{ route('service') }}#consultancy">Consultancy</a></li>
                    <li><a href="{{ route('service') }}#online_courses">Online Courses</a></li>
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
                        method="post"
                        id="newsletter-form">
                        @csrf
                        <div id="mc_embed_signup_scroll">
                        <div class="row">
                            {{--  <div class="col-md-6">
                                <div class="mc-field-group" style="margin-bottom: 15px;">
                                    <input type="text" class="footer-input" value="" name="name" class="required name"
                                    id="mce-NAME" placeholder="Name" required style="background-color: #fff;">
                                </div>
                            </div>  --}}
                            <div class="col-md-12">
                                <div class="mc-field-group" style="position: relative; display: flex; align-items: center;">
                                    <input type="email" class="footer-input" value="" name="email" class="required email"
                                    id="mce-EMAIL" placeholder="Email" required style="background-color: #fff; width: 100%; height: 48px; border-radius: 9px; padding-right: 56px;">
                                    <button style="position: absolute; right: 6px; top: 50%; transform: translateY(-50%); height: 36px; width: 36px; padding: 0; display: flex; align-items: center; justify-content: center; overflow: hidden; transition: all 0.3s ease; background-color: var(--ltn__secondary-color); border-radius: 9px;"
                                        class="theme-btn-1 btn btn-effect-1" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">
                                        <i class="fas fa-location-arrow"></i>
                                    </button>
                                </div>
                                <!-- Newsletter Message Display -->
                                <div id="newsletter-message" style="display: none; margin-top: 10px; padding: 8px 12px; border-radius: 6px; font-size: 13px;"></div>
                            </div>
                        </div>

                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" class="footer-input" name="b_dde0a42ff09e8d43cad40dc82_72d274d15d"
                            tabindex="-1" value="">
                        </div>



                        </div>
                        <div class="row">
                            <div class=" align-self-end footer-social-icon col-8 d-flex justify-content-start mt-2">
                                <div style="margin-right: 5px;"
                                    class="face social-square d-flex justify-content-center align-items-center mr-1">
                                    <a href="{{ $staticContact->details2 }}" target="_blank" class="social-link"><i class="fab fa-facebook-f"></i></a>
                                </div>
                                <div style="margin-right: 5px;"
                                    class="linkedin social-square d-flex justify-content-center align-items-center mr-1">
                                    <a href="{{ $staticContact->details3 }}" target="_blank" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <a href="{{ $staticContact->details4 }}" target="_blank" style="margin-right: 5px;" class="social-link">
                                    <div class="xtw social-square d-flex justify-content-center align-items-center mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 16px;height:16px">
                                            <path fill="#e7eaee"
                                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                        </svg>
                                    </div>
                                </a>
                                <div
                                    class="insta social-square d-flex justify-content-center align-items-center mr-1">
                                    <a href="{{ $staticContact->details5 }}" target="_blank" class="social-link"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>

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
<!-- Country-City Cascade Module -->
<script src="{{ asset('front-assets/js/country-city-cascade.js') }}"></script>

@stack('country-city-scripts')

<!-- Newsletter AJAX Handler -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var newsletterForm = document.getElementById('newsletter-form');
    var messageDiv = document.getElementById('newsletter-message');
    var emailInput = document.getElementById('mce-EMAIL');
    var submitBtn = document.getElementById('mc-embedded-subscribe');
    var messageTimeout = null;

    // Function to hide message with fade effect
    function hideMessage() {
        messageDiv.style.opacity = '0';
        setTimeout(function() {
            messageDiv.style.display = 'none';
            messageDiv.style.opacity = '1';
        }, 300);
    }

    // Function to show message and auto-hide after delay
    function showMessage(isSuccess, message) {
        // Clear any existing timeout
        if (messageTimeout) {
            clearTimeout(messageTimeout);
        }

        messageDiv.style.display = 'block';
        messageDiv.style.opacity = '1';
        messageDiv.style.transition = 'opacity 0.3s ease';

        if (isSuccess) {
            messageDiv.style.backgroundColor = '#d4edda';
            messageDiv.style.color = '#155724';
            messageDiv.style.border = '1px solid #c3e6cb';
        } else {
            messageDiv.style.backgroundColor = '#f8d7da';
            messageDiv.style.color = '#721c24';
            messageDiv.style.border = '1px solid #f5c6cb';
        }
        messageDiv.textContent = message;

        // Auto-hide after 5 seconds
        messageTimeout = setTimeout(function() {
            hideMessage();
        }, 5000);
    }

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Prevent double submission
            if (submitBtn.disabled) return;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

            // Hide previous message
            messageDiv.style.display = 'none';

            var formData = new FormData(newsletterForm);

            fetch(newsletterForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                showMessage(data.success, data.message);
                if (data.success) {
                    emailInput.value = '';
                }
            })
            .catch(function(error) {
                showMessage(false, 'An error occurred. Please try again.');
            })
            .finally(function() {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-location-arrow"></i>';
            });
        });

        // Hide message on new input
        emailInput.addEventListener('input', function() {
            if (messageTimeout) {
                clearTimeout(messageTimeout);
            }
            messageDiv.style.display = 'none';
        });
    }
});
</script>

@yield('script')

</body>

</html>
