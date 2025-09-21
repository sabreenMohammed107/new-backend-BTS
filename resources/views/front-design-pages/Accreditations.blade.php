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
                <h3>{{ $accreditation->small_description }}</h3>
                <p> {!! $accreditation->details !!}</p>

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
    {{-- <div class="container main-course-title-and-details">
      <span>Technical Training</span>
      <h2>Courses Details</h2>
      <p> Your Growth; our Mission </p>
    </div> --}}
    <div class="container">
      <div class="row">
        <div class="container main-course-title-and-details text-center mt-5">



        </div>
        <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
          <!-- Blog Item -->
          @isset($clients)
@foreach ($clients as $client)
 <div class="col-lg-12 ">
                <a href="" class="img-container"><img height="100%" src="{{ asset('uploads/accreditationClient')}}/{{ $client->client_logo_url }}" alt="#"></a>
          </div>
@endforeach
          @endisset

        </div>
      </div>
    </div>
@endsection
