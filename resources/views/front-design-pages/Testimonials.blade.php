@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'testimonials-page')
@section('page-content')

    <div class="main-course-bg-header">

      <div class="course-main-title">
        <h2>Testimonials</h2>
      </div>
    </div>

    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <div class="main-hero-section">
            <div class="row">
              <div class="col-lg-4 vid-play">
                {{-- <a href="http://"> <img src="{{ asset('front-assets/img/icons/play.png') }}" alt=""></a> --}}
              </div>
              <div class="col-lg-8 about-bts-description p-5">
                <h3>{{ $titles->small_description }}</h3>
                <p>
                    {{ $titles->details }}
                </p>

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

    <div class="row mt-5 bts-target-section" style="overflow: hidden;">
      <div class="col-lg-12">
        <div class="section-title-area text-center">
          <h1 class="section-title">Customer opinions</h1>
          <span class="col-12 col-md-8  fnt-siz-sm g-clr ">Discover our clients' opinions and their trust in BTS
            services, as we strive to provide innovative solutions that precisely and efficiently meet their needs,
            making us a reliable partner in every step of their success.</span>
        </div>
        <div class="container">
          <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
            <!-- Blog Item -->

            @foreach ($data as $testimonial)
                <div class="col-lg-12 ">
                    <div class="ltn__blog-item ltn__blog-item-3 bg-light-blue">

                    <div class="ltn__blog-brief bg-light-blue">
                        <div class="ltn__blog-meta bg-light-blue">
                                    <ul class=" ltn__blog-tags d-flex align-items-start justify-content-between">
                        <li class="ltn__blog-title ">
                            <h1 class="fnt-siz-md"> {{ $testimonial->reviewer_name }} </h1>
                        </li>
                        <li class="ltn__blog-tags d-flex">
                            @for ($i = 0; $i < $testimonial->reviewer_star_rate; $i++)
                                <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="star">
                            @endfor
                        </li>
                        </ul>
                        </div>
                        <h3 class="ltn__blog-author fnt-siz-sm">{{ $testimonial->reviewer_text }}</h3>

                    </div>
                    </div>
                </div>
            @endforeach

          </div>

        </div>
      </div>
    </div>

    <div class="container-fluid mt-5">
      <div class="row mt-5 bts-target-section">
        <div class="col-lg-12">
          <div class="section-title-area text-center">
            <h1 class="section-title">Gallery</h1>
            <span class="col-12 col-md-8  fnt-siz-sm g-clr ">Your Growth, Our Mission</span>
          </div>
          <style>
            #testimonials-page .bts-target-section .container-wrapper {
              display: grid;
              grid-gap: 10px;
              grid-template-columns: repeat(6, 1fr);
              grid-auto-rows: 100px 300px;
              grid-auto-flow: dense;
              overflow: hidden;
              max-width: 100%;
            }

            #testimonials-page .bts-target-section .container-wrapper .gallary-container .image {
              width: 100%;
              height: 100%;
              overflow: hidden;

            }

            #testimonials-page .bts-target-section .container-wrapper .gallary-container .image img {
              width: 100%;
              height: 100%;
              object-fit: cover;
              object-position: 50% 50%;
              cursor: pointer;
              transition: .5s ease-in-out;

            }

            #testimonials-page .bts-target-section .container-wrapper .gallary-container:hover .image img {
              transform: scale(1.1);

            }

            .w-1 {
              grid-column: span 1;
            }

            .w-2 {
              grid-column: span 2;
            }

            .w-3 {
              grid-column: span 3;
            }

            .w-4 {
              grid-column: span 4;
            }

            .h-2 {
              grid-row: span 2;
            }

            .h-3 {
              grid-row: span 3;
            }

            .h-4 {
              grid-row: span 4;
            }

            .h-5 {
              grid-row: span 5;
            }

            .h-6 {
              grid-row: span 6;
            }

            @media screen and (max-width: 500px) {
              #testimonials-page .bts-target-section .container-wrapper {

                grid-template-columns: repeat(1, 1fr);

                .w-1,
                .w-2,
                .w-3,
                .w-4 {
                  grid-column: span 1;
                }
              }
            }

            @media (min-width: 501px) and (max-width: 800px) {
              #testimonials-page .bts-target-section .container-wrapper {

                grid-template-columns: repeat(2, 1fr);

                .w-1,
                .w-2,
                .w-3,
                .w-4 {
                  grid-column: span 2;
                }
              }
            }
          </style>
          <div class="container container-wrapper">
            @foreach ($gallary as $data)
              <div class="gallary-container
                @if ($data->order == 1 )
                    w-2 h-3
                @elseif ($data->order == 2)
                    w-1 h-2
                @elseif ($data->order == 3)
                    w-3 h-3
                @elseif ($data->order == 4)
                    w-3 h-3
                @elseif ($data->order == 5)
                    w-2 h-2
                @endif
              ">
                <div class="image">
                  <img src="{{ asset('uploads/testimonials_gallary/' . $data->image_path) }}" alt="" srcset="">
                </div>
              </div>
            @endforeach


          </div>
        </div>
      </div>
    </div>

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
      <div class="container-fluid">
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
