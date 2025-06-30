@extends('front-design-pages.front-layout.app')
@section('page-id' , 'accre-course-page')
@section('page-content')
    <div class="main-course-bg-header">

      <div class="course-main-title text-center">
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
      <p> Your Growth; our Mission </p>
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
@endsection
