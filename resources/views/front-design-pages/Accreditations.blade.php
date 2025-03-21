@extends('front-design-pages.front-layout.app')
@section('page-id' , 'accre-course-page')
@section('page-content')
    <div class="main-course-bg-header">

      <div class="course-main-title">
        <h2>Accreditations</h2>
      </div>
    </div>
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <div class="main-hero-section">
            <div class="row">
              <div class="col-lg-4 vid-play">
                <a href="http://"> <img src="{{ asset('front-assets/img/icons/play.png') }}" alt=""></a>
              </div>
              <div class="col-lg-8 about-bts-description p-5">
                <h3>We have been assessed against internationally recognized standards</h3>
                <p>Accreditation means that we have been assessed against internationally recognized standards and operate to the highest levels of quality and service – providing further assurance to you that the certificates we issue are both credible and impartial.
                  This accreditation reduces the risk to you and your customers and gives you complete confidence that we have been independently evaluated for our competence and performance capability.</p>

                <!-- <ul class="services-list">
                    <li>Have a direct effect upon your profitability</li>
                    <li>Help you meet your specific objectives</li>
                    <li>Assist you in implementing and achieving your strategic plans</li>
                    <li>Enhance your image within your industry</li>
                </ul> -->

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="container main-course-title-and-details">
      <span>Technical Training</span>
      <h2>Courses Details</h2>
      <p>We will never stop improving</p>
    </div>
    <div class="container">
      <div class="row">
        <div class="container main-course-title-and-details">

          <h2>Who we’re accredited by</h2>

        </div>
        <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
          <!-- Blog Item -->
          <div class="col-lg-12 ">

                <a href="" class="img-container"><img height="100%" src="{{ asset('front-assets/img/slider/d565e8067f134e55d8999f227ee551ee 1.png') }}" alt="#"></a>

          </div>
          <div class="col-lg-12 ">

                <a href="" class="img-container"><img height="100%" src="{{ asset('front-assets/img/slider/pngwing.com 1.png') }}" alt="#"></a>

          </div>
          <div class="col-lg-12 ">

                <a href="" class="img-container"><img height="100%" src="{{ asset('front-assets/img/slider/ISC2_CISSP_RGB__mark 1.png') }}" alt="#"></a>

          </div>
          <div class="col-lg-12 ">

                <a href="" class="img-container"><img height="100%" src="{{ asset('front-assets/img/slider/CEH-600x497 1.png') }}" alt="#"></a>

          </div>
          <div class="col-lg-12 ">


                <a href="" class="img-container"><img height="100%" src="{{ asset('front-assets/img/slider/pngwing.com (1) 1.png') }}" alt="#"></a>


          </div>

        </div>
      </div>
    </div>
    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2 text-center">
              <h1 class="section-title">Contact Us</h1>
              <span class="col-12 col-md-8  fnt-siz-sm g-clr ">Contact us to meet all your inquiries and
                needs, as our professional team is happy to provide immediate support and advice to
                ensure you achieve your goals and facilitate your experience with us in the best
                possible way.</span>

            </div>
            <div class="row">
              <div class="col-12 col-lg-6" style="height: max-content;">
                <form id="contact-form main-page-form" action="" method="post">
                  <div class="row">
                    <div class="col-md-6 my-3">
                      <div class="input-item input-item-name ltn__custom-icon">
                        <input type="text" name="name" placeholder="Enter your name">
                      </div>
                    </div>
                    <div class="col-md-6 my-3">
                      <div class="input-item input-item-email ltn__custom-icon">
                        <input type="email" name="email" placeholder="Enter email address">
                      </div>
                    </div>
                    <div class="col-md-6 my-3">
                      <div class="input-item input-item-phone ltn__custom-icon">
                        <input type="text" name="mobile" placeholder="Enter mobile number">
                      </div>
                    </div>
                    <div class="col-md-6 my-3">
                      <div class="input-item input-item-email ltn__custom-icon">
                        <input type="text" name="title" placeholder="Enter message title">
                      </div>
                    </div>
                  </div>
                  <div class="input-item input-item-textarea ltn__custom-icon my-3">
                    <textarea name="message" placeholder="Enter message"></textarea>
                  </div>

                  <p class="form-messege mb-0 mt-20"></p>

                  <button href="" class="theme-btn-1 btn btn-effect-1 text-uppercase w-100">SEE
                    MORE</button>
                </form>
              </div>
              <div class="col-12 col-lg-6 mt-5 mt-lg-0" style="height: max-content;">

                <div class="contact-us-main-page row flex-column p-3">
                  <div class="">
                    <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2" src="{{ asset('front-assets/img/icons/hom.png') }}"
                        alt="">
                      UAE
                    </div>
                    <span>3012, Block 3, 30 Euro Business Park,<br> Little Island, Co. Cork, T45 V220</span>
                  </div>
                  <div class="pt-3">
                    <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                        src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Office
                    </div>
                    <span>+353214552955</span>
                  </div>
                  <div class="pt-3">
                    <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                        src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Mobile
                    </div>
                    <span>+353876480984</span>
                  </div>
                  <div class="pt-3">
                    <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                        src="{{ asset('front-assets/img/icons/mail.png') }}" alt="">E-mail
                    </div>
                    <span>Info@btsconsultant.com</span>
                  </div>
                  <div class="pt-3">
                    <div class="row">
                      <div class="col-12 col-lg-6">
                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                            src="{{ asset('front-assets/img/icons/time.png') }}" alt="">Working
                          hours</div>
                        <span>Sun to Fri 09:00 AM to 06:00 PM</span>
                      </div>
                      <div class="col-12 col-lg-6 text-end">
                        <a href="" class="theme-btn-1 btn btn-effect-1 text-uppercase"><img src="{{ asset('front-assets/img/icons/loc.png') }}"
                            alt="">Location</a>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
