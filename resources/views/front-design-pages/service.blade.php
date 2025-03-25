@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'service-page')
@section('page-content')

    <div class="main-course-bg-header">
      <div class="course-main-title">
        <h2>Services</h2>
      </div>
    </div>

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <section class="training-section">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="images-container">
                      <img src="{{ asset('front-assets/img/bg/Rectangle 10249.png') }}" alt="Public Training Session" class="primary-image">


                      <img src="{{ asset('front-assets/img/bg/Rectangle 10250 (1).png') }}" alt="City Skyline" class="secondary-image">
                      <a href="" class="image-vid-play"><i class="fas fa-play clr-white"></i></a>

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="content-container">
                      <h2 class="training-title">Public Training</h2>
                      <p class="training-description">
                        Enhance Your Expertise And Advance Your Career With Public Training Programs
                        Designed By Industry-Leading Professionals, Offering Practical, High-Quality Learning
                        Experiences Across Engineering, Management, IT, And More, Available In Major Global
                        Cities To Help You Stay Competitive In Today's Rapidly Evolving Job Market.
                      </p>
                      <button class="view-details-btn">View Details</button>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="col-lg-12">
            <section class="public-training-section">
              <div class="container section-border">
                <div class="row align-items-center section-content">
                  <div class="col-lg-6">
                    <h2 class="training-title">In-House Training</h2>
                    <p class="training-description">
                      Maximize Your Team's Potential With In-House Training Programs Tailored To Your
                      Organization's Specific Needs, Delivered By Expert Trainers Directly At Your Workplace
                      Or Preferred Location, Ensuring Cost-Effective, Flexible, And Results-Driven Learning
                      Experience That Enhances Productivity And Drives Business Success.
                    </p>
                    <div class="btn-container">
                      <button class="view-details-btn">View Details</button>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="images-container">
                      <img src="{{ asset('front-assets/img/service/Rectangle 10250 (1).png') }}" alt="Business Training" class="image-top">
                      <img src="{{ asset('front-assets/img/service/Rectangle 102aaa52.png') }}" alt="Team Discussion" class="image-bottom-left">
                      <img src="{{ asset('front-assets/img/service/Rectangle 10aaa251.png') }}" alt="Team Discussion" class="image-bottom-right">
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="col-lg-12">
            <section class="training-section">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="content-container">
                      <h2 class="training-title">Consultancy</h2>
                      <p class="training-description">
                        Optimize your business performance with Consultancy services designed to provide expert
                        guidance, strategic solutions, and tailored recommendations, helping organizations enhance
                        efficiency, streamline operations, and achieve sustainable growth through industry-specific
                        insights and best practices.
                      </p>
                      <button class="view-details-btn">View Details</button>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="images-container">
                      <img src="{{ asset('front-assets/img/service/Rectangle 102ss51.png') }}" alt="Public Training Session" class="primary-image">


                      <img src="{{ asset('front-assets/img/service/Rectangle 102aaa55.png') }}" alt="City Skyline" class="secondary-image">
                      <a href="" class="image-vid-play"><i class="fas fa-play clr-white"></i></a>

                    </div>
                  </div>

                </div>
              </div>
            </section>
          </div>
          <div class="col-lg-12">
            <section class="training-section">
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="images-container">
                      <img src="{{ asset('front-assets/img/service/Rectangle 10254.png') }}" alt="Public Training Session" class="primary-image">


                      <img src="{{ asset('front-assets/img/service/Rectangle 1025ss2.png') }}" alt="City Skyline" class="secondary-image">
                      <a href="" class="image-vid-play"><i class="fas fa-play clr-white"></i></a>

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="content-container">
                      <h2 class="training-title">Online Courses</h2>
                      <p class="training-description">
                        Advance your skills anytime, anywhere with Online Courses designed for flexible learning,
                        offering expert-led training across various industries, interactive content, and globally
                        recognized certifications to help you stay competitive in today’s fast-paced world.
                      </p>
                      <button class="view-details-btn">View Details</button>
                    </div>
                  </div>
                </div>
              </div>
            </section>
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

                  <button href="" class="theme-btn-1 btn btn-effect-1 text-uppercase w-100">Send</button>
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
