@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'soft-skills-page')
@section('page-content')
    <div class="main-course-bg-header">
      <div class="course-main-title">
        <h2>Soft skills Categories</h2>
      </div>
    </div>

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2">

              <h5 class="col-12  g-clr text-left">BTS offers a range of Soft Skills training courses which provides delegates opportunities to develop new skills, gain confidence in their managerial capabilities and become more effective leaders. We do this through a mix of theory and practice: offering our delegates an enjoyable, participative workshop approach. Our topics cover a range of core skills including interpersonal and, organisation-wide communications, negotiation and influencing skills, time management, people and performance management, strategy development and implementation. The world of work has evolved in the early part of the 21st Century requiring new management and leadership approaches. Our training courses, facilitated by world-class experts, will introduce new thinking and ways of leading and managing to enable managers to embrace the challenges facing business and organisations today.</h5>

            </div>
            <div class="row">
              <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="service-card">
                            <img src="{{ asset('front-assets/img/bg/asaf.png') }}" alt="Administration and Finance">
                            <div class="service-overlay">
                                <h3 class="service-title">ADMINISTRATION AND FINANCE</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="service-card">
                            <img src="{{ asset('front-assets/img/bg/Administration and Secretary.png') }}" alt="Administration and Secretary">
                            <div class="service-overlay">
                                <h3 class="service-title">ADMINISTRATION AND SECRETARY</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="service-card">
                            <img src="{{ asset('front-assets/img/bg/Auditing Skills Management.png') }}" alt="Auditing Skills Management">
                            <div class="service-overlay">
                                <h3 class="service-title">AUDITING SKILLS MANAGEMENT</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="service-card">
                            <img src="{{ asset('front-assets/img/bg/Customer Services.png') }}" alt="Customer Services">
                            <div class="service-overlay">
                                <h3 class="service-title">CUSTOMER SERVICES</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="service-card">
                            <img src="{{ asset('front-assets/img/bg/Human Resources and Training.png') }}" alt="Human Resources and Training">
                            <div class="service-overlay">
                                <h3 class="service-title">HUMAN RESOURCES AND TRAINING</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="service-card">
                            <img src="{{ asset('front-assets/img/bg/Leadership and Management.png') }}" alt="Leadership and Management">
                            <div class="service-overlay">
                                <h3 class="service-title">LEADERSHIP AND MANAGEMENT</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="service-card">
                            <img src="{{ asset('front-assets/img/bg/Logistics, Warehouse & General Services.png') }}" alt="Logistics, Warehouse & General Services">
                            <div class="service-overlay">
                                <h3 class="service-title">LOGISTICS, WAREHOUSE & GENERAL SERVICES</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="service-card">
                            <img src="{{ asset('front-assets/img/bg/Procurement, Purchasing and Supply Chain Management.png') }}" alt="Procurement, Purchasing and Supply Chain Management">
                            <div class="service-overlay">
                                <h3 class="service-title">PROCUREMENT, PURCHASING AND SUPPLY CHAIN MANAGEMENT</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="service-card">
                            <img src="{{ asset('front-assets/img/bg/Quality Assurance and Quality Control Management.png') }}" alt="Quality Assurance and Quality Control Management">
                            <div class="service-overlay">
                                <h3 class="service-title">QUALITY ASSURANCE AND QUALITY CONTROL MANAGEMENT</h3>
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
