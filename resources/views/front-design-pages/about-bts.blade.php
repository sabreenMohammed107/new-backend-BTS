@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'about-bts-page')
@section('page-content')
    <div class="main-course-bg-header">
      <div class="course-main-title">
        <h2>ABOUT BTS</h2>
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
                <div class="col-lg-8 about-bts-description">
                <h3>Who we are</h3>
                <p>We are an international engineering & management training and consulting firm, providing training programs and consulting services to hundreds of organizations in UK and abroad. We have built our reputation on providing innovative solutions and custom-designed training programs to address problems and challenges facing our clients in rapidly changing times. Since 2000, we have trained more than 25,000 people who have applied effective time-saving procedures and techniques to increase productivity, ultimately resulting in an improved bottom line for our clients.</p>
                <p>BTS offers you high quality, professional services that will increase your productivity and decrease your expenses. We strive to:</p>

                <ul class="services-list">
                    <li>Have a direct effect upon your profitability</li>
                    <li>Help you meet your specific objectives</li>
                    <li>Assist you in implementing and achieving your strategic plans</li>
                    <li>Enhance your image within your industry</li>
                </ul>

                </div>
            </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="map-section">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0 map-description d-flex align-items-center">
                <p class="fs-5">BTS is happy and ready to provide its services in the Gulf Cooperation Council countries, <span class="blue-clr">Europe, Africa, and Asia</span>. Additionally, we work with many clients and partners across the globe. This is in line with our team's commitment to <span class="blue-clr">Saudi Vision 2030</span>.</p>
                </div>
                <div class="col-lg-6 text-center map-img">
                    <img src="{{ asset('front-assets/img/bg/map.png') }}" alt="World Map" class="map-image img-fluid">
                </div>

            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="row mt-5 best-offers-section">
      <div class="col-lg-12">
        <div class="section-title-area  text-center">
          <h1 class="section-title">What We Offer</h1>
          <span class="col-12 col-md-8  fnt-siz-sm g-clr ">Your Growth, Our Mission</span>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/wifi.png') }}" alt="" class="offer-title-icon"> Customized Training Programs </h4>
                <p>Our bespoke training solutions are tailored to address unique organizational challenges, empowering teams with relevant skills to drive measurable results.</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1.png') }}" alt="" class="offer-title-icon"> Certified Courses for Professionals </h4>
                <p>Gain industry-recognized certifications through courses designed to enhance technical expertise and foster career advancement in competitive fields.</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (1).png') }}" alt="" class="offer-title-icon"> Strategic Consulting Services </h4>
                <p>Partner with our experts to develop actionable strategies that optimize processes, align goals, and achieve sustainable growth for your business.</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (2).png') }}" alt="" class="offer-title-icon"> Continuous Support for Growth</h4>
                <p>We provide ongoing mentorship and resources, ensuring long-term success and adaptability in an ever-changing market landscape.</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (3).png') }}" alt="" class="offer-title-icon"> Leadership Development Programs </h4>
                <p>Equip leaders with essential skills through immersive workshops and coaching, enhancing decision-making and team management capabilities.</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (4).png') }}" alt="" class="offer-title-icon"> Technology-Driven Solutions </h4>
                <p>Leverage cutting-edge technologies to streamline workflows, boost productivity, and achieve operational excellence in a digital-first world.</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (5).png') }}" alt="" class="offer-title-icon"> Industry-Specific Workshops </h4>
                <p>Attend specialized workshops designed for industries such as healthcare, energy, and IT, offering practical solutions and industry insights.</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (6).png') }}" alt="" class="offer-title-icon"> Performance Assessment Tools </h4>
                <p>Utilize advanced tools and methodologies to evaluate team and organizational performance, identifying areas for growth and improvement.</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/grommet-icons_performance.png') }}" alt="" class="offer-title-icon"> Global Networking Opportunities </h4>
                <p>Expand your professional horizons with exclusive access to international networks, fostering collaboration and knowledge exchange with industry leaders.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5 bts-target-section">
      <div class="col-lg-12">
        <div class="section-title-area text-center">
          <h1 class="section-title">BTS Target</h1>
          <span class="col-12 col-md-8  fnt-siz-sm g-clr ">Your Growth, Our Mission</span>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="target-bts-card col-12 col-md-6 mt-5">
              <div class="card-data">
              <div class="img-contain">
                <img src="{{ asset('front-assets/img/icons/hugeicons_vision.png') }}" alt="" class="target-title-icon">
              </div>
                <h4> Our Vision </h4>
                <p>Our vision is to consistently deliver excellent training courses and seminars which set the highest standards in our industry.</p>
              </div>
            </div>

            <div class="target-bts-card col-12 col-md-6 mt-5">
              <div class="card-data">
              <div class="img-contain">
                <img src="{{ asset('front-assets/img/icons/Vector.png') }}" alt="" class="target-title-icon">
              </div>
                <h4> Our Mission </h4>
                <p>We empower clients through innovative learning solutions, build trust with reliable services, align with their needs, and inspire growth by enabling skill application.</p>

              </div>
            </div>
            <div class="target-bts-card col-12 col-md-6 mt-5">
              <div class="card-data">
              <div class="img-contain">
                <img src="{{ asset('front-assets/img/icons/Grxxoup.png') }}" alt="" class="target-title-icon">
              </div>
                <h4> Our Service Quality </h4>
                <p>BTS places customer satisfaction at the core of its services, measuring success through client achievements. With ongoing evaluations and strong relationships, BTS ensures its offerings consistently exceed expectations.</p>

              </div>
            </div>
            <div class="target-bts-card col-12 col-md-6 mt-5">
              <div class="card-data">
              <div class="img-contain">
                <img src="{{ asset('front-assets/img/icons/carbon_settings-services.png') }}" alt="" class="target-title-icon">
              </div>
                <h4> Our Values </h4>
                <p>BTS upholds a commitment to mastery, excellence, and innovation, ensuring client satisfaction through reliable, ethical, and high-quality services designed to empower success and foster trust.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CATEGORY AREA START -->
    <div class="mt-5 ltn__category-area section-bg-1-- ltn__primary-bg before-bg-1 bg-image bg-overlay-theme-black-5--0 pt-115 pb-90"
    data-bg="{{ asset('front-assets/img/bg/Background\ \(2\).png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title white-color">Services</h1>
                    <span class="g-clr  text-center">Your Growth, Our Mission</span>
                </div>
            </div>


        </div>
        <div class="row ">
            <div class="col-12 col-md-6 col-lg-3 p-2">
                <div class="card-item-services service-item-4">
                    <div class="card-service-bottom-footer">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="white-color">Public Training</h3>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-8">
                                        <a href="" class="theme-btn-1 btn btn-effect-1 text-uppercase">View
                                            Details</a>
                                    </div>
                                    <div class="col-2 offset-2 d-flex align-items-center">
                                        <a href="" class="white-color"><i class="fas fa-share-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-6 col-lg-3  p-2">
                <div class="card-item-services service-item-2">
                    <div class="card-service-bottom-footer">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="white-color">In-House Training</h3>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-8">
                                        <a href="" class="theme-btn-1 btn btn-effect-1 text-uppercase">View
                                            Details</a>
                                    </div>
                                    <div class="col-2 offset-2 d-flex align-items-center">
                                        <a href="" class="white-color"><i class="fas fa-share-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6 col-lg-3  p-2">
                <div class="card-item-services service-item-1">
                    <div class="card-service-bottom-footer">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="white-color">Consultancy</h3>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-8">
                                        <a href="" class="theme-btn-1 btn btn-effect-1 text-uppercase">View
                                            Details</a>
                                    </div>
                                    <div class="col-2 offset-2 d-flex align-items-center">
                                        <a href="" class="white-color"><i class="fas fa-share-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 p-2">
                <div class="card-item-services service-item-3">
                    <div class="card-service-bottom-footer">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="white-color">Online Courses</h3>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-8">
                                        <a href="" class="theme-btn-1 btn btn-effect-1 text-uppercase">View
                                            Details</a>
                                    </div>
                                    <div class="col-2 offset-2 d-flex align-items-center">
                                        <a href="" class="white-color"><i class="fas fa-share-alt"></i></a>
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
    <!-- CATEGORY AREA END -->




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
