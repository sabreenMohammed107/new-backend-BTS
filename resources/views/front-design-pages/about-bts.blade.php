@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'about-bts-page')

@section('page-style')
<style>

    .card-item-services.service-item-1 {
        background-image: url({{ $consultancy->details2 }});
    }
    .card-item-services.service-item-2 {
        background-image: url({{ $in_house_training->details2 }});
    }
    .card-item-services.service-item-3 {
        background-image: url({{ $online_courses->details2 }});
    }
    .card-item-services.service-item-4 {
        background-image: url({{ $public_training->details2 }});
    }
    </style>
@endsection
@section('page-content')
    <div class="main-course-bg-header">
      <div class="course-main-title text-center">
        <h2>ABOUT BTS</h2>
      </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
        <div class="col-12">
            <div class="main-hero-section">
            <div class="row">
                <div class="col-lg-4 vid-play">
                <a href="{{ $whoWeAre->details4 }}"> <img src="{{ asset('front-assets/img/icons/play.png') }}" alt=""></a>
                </div>
                <div class="col-lg-8 about-bts-description">
                <h3>{{ ucwords(str_replace('_', ' ', $whoWeAre->section_name)) }}</h3>
                <p>{{ $whoWeAre->small_description }}</p>
                {!! $whoWeAre->details !!}

                </div>
            </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="map-section">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0 map-description d-flex align-items-center">
                <p class="fs-5"> {!! $whoWeAre->details2 !!}</p>
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
                <h4> <img src="{{ asset('front-assets/img/icons/wifi.png') }}" alt="" class="offer-title-icon"> {{ $offers[0]->title }} </h4>
                <p>{{ $offers[0]->description }}</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1.png') }}" alt="" class="offer-title-icon"> {{ $offers[1]->title }} </h4>
                <p>{{ $offers[1]->description }}</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (1).png') }}" alt="" class="offer-title-icon"> {{ $offers[2]->title }} </h4>
                <p>{{ $offers[2]->description }}</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (2).png') }}" alt="" class="offer-title-icon"> {{ $offers[3]->title }} </h4>
                <p>{{ $offers[3]->description }}</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (3).png') }}" alt="" class="offer-title-icon"> {{ $offers[4]->title }} </h4>
                <p>{{ $offers[4]->description }}</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (4).png') }}" alt="" class="offer-title-icon"> {{ $offers[5]->title }} </h4>
                <p>{{ $offers[5]->description }}</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (5).png') }}" alt="" class="offer-title-icon"> {{ $offers[6]->title }} </h4>
                <p>{{ $offers[6]->description }}</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/translation-svgrepo-com 1 (6).png') }}" alt="" class="offer-title-icon"> {{ $offers[7]->title }} </h4>
                <p>{{ $offers[7]->description }}</p>
              </div>
            </div>
            <div class="card-offer col-12 col-md-6 col-lg-4">
              <div class="card-data">
                <h4> <img src="{{ asset('front-assets/img/icons/grommet-icons_performance.png') }}" alt="" class="offer-title-icon"> {{ $offers[8]->title }} </h4>
                <p>{{ $offers[8]->description }}</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5 bts-target-section">
      <div class="col-lg-12">
        <div class="section-title-area text-center">
          <h1 class="section-title">{{ ucwords(str_replace('_', ' ', $VisionAndMission->section_name)) }}</h1>
          <span class="col-12 col-md-8  fnt-siz-sm g-clr ">{{ $VisionAndMission->small_description }}</span>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="target-bts-card col-12 col-md-6 mt-5">
              <div class="card-data">
              <div class="img-contain">
                <img src="{{ asset('front-assets/img/icons/hugeicons_vision.png') }}" alt="" class="target-title-icon">
              </div>
                <h4> {{ $VisionAndMission->details }} </h4>
                <p>{{ $VisionAndMission->details2 }}</p>
              </div>
            </div>

            <div class="target-bts-card col-12 col-md-6 mt-5">
              <div class="card-data">
              <div class="img-contain">
                <img src="{{ asset('front-assets/img/icons/Vector.png') }}" alt="" class="target-title-icon">
              </div>
                <h4> {{ $VisionAndMission->details3 }} </h4>
                <p>{{ $VisionAndMission->details4 }}</p>

              </div>
            </div>
            <div class="target-bts-card col-12 col-md-6 mt-5">
              <div class="card-data">
              <div class="img-contain">
                <img src="{{ asset('front-assets/img/icons/Grxxoup.png') }}" alt="" class="target-title-icon">
              </div>
                <h4> {{ $VisionAndMission->details5 }} </h4>
                <p>{{ $VisionAndMission->details6 }}</p>

              </div>
            </div>
            <div class="target-bts-card col-12 col-md-6 mt-5">
              <div class="card-data">
              <div class="img-contain">
                <img src="{{ asset('front-assets/img/icons/carbon_settings-services.png') }}" alt="" class="target-title-icon">
              </div>
                <h4> {{ $VisionAndMission->details7 }} </h4>
                <p>{{ $VisionAndMission->details8 }}</p>
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
                                <h3 class="white-color">{{ $public_training->small_description }}</h3>
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
                                <h3 class="white-color">{{ $in_house_training->small_description }}</h3>
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
                                <h3 class="white-color">{{ $consultancy->small_description }}</h3>
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
                                <h3 class="white-color">{{ $online_courses->small_description }}</h3>
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

@endsection
