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

    /* Service Cards Hover Effects */
    .card-item-services {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        min-height: 300px;
        background-size: cover;
        background-position: center;
    }

    .card-item-services::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .card-item-services:hover::before {
        background: rgba(0, 0, 0, 0.4);
    }

    .card-item-services:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .card-service-bottom-footer {
        position: relative;
        z-index: 1;
        padding: 20px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-service-bottom-footer h3 {
        transition: all 0.3s ease;
        text-align: center;
    }

    .card-item-services:hover .card-service-bottom-footer h3 {
        transform: scale(1.05);
    }

    /* Card Offer Hover Effects */
    .card-offer {
        padding: 25px;
        transition: all 0.3s ease;
    }

    .card-offer .card-data {
        background-color: #f5f7fb;
        padding: 20px 15px;
        border-radius: 15px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .card-offer .card-data::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(131, 185, 251, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .card-offer:hover .card-data::before {
        left: 100%;
    }

    .card-offer:hover {
        transform: translateY(-10px);
    }

    .card-offer:hover .card-data {
        background-color: #e8f0fe;
        box-shadow: 0 15px 35px rgba(131, 185, 251, 0.3);
    }

    .card-offer .card-data h4 {
        transition: color 0.3s ease;
    }

    .card-offer:hover .card-data h4 {
        color: #1e73be;
    }

    .card-offer .card-data .offer-title-icon {
        transition: transform 0.3s ease;
    }

    .card-offer:hover .card-data .offer-title-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .card-offer .card-data p {
        font-size: smaller;
        transition: color 0.3s ease;
    }

    .card-offer:hover .card-data p {
        color: #333;
    }

    /* Target BTS Card Hover Effects */
    .target-bts-card {
        transition: all 0.3s ease;
    }

    .target-bts-card .card-data {
        background-color: #ffffff;
        padding: 30px 20px;
        border-radius: 15px;
        transition: all 0.3s ease;
        position: relative;
        {{--  overflow: hidden;  --}}
        border: 2px solid transparent;
        height: 100%;
    }

    .target-bts-card .card-data::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(131, 185, 251, 0.15), transparent);
        transition: left 0.5s ease;
    }

    .target-bts-card:hover .card-data::before {
        left: 100%;
    }

    .target-bts-card:hover {
        transform: translateY(-10px);
    }

    .target-bts-card:hover .card-data {
        background-color: #f8fbff;
        box-shadow: 0 15px 40px rgba(30, 115, 190, 0.2);
        border: 2px solid rgba(131, 185, 251, 0.3);
    }

    .target-bts-card .img-contain {
        transition: all 0.3s ease;
    }

    .target-bts-card:hover .img-contain {
        transform: scale(1.1);
    }

    .target-bts-card .target-title-icon {
        transition: transform 0.4s ease;
    }

    .target-bts-card:hover .target-title-icon {
        transform: rotate(360deg);
    }

    .target-bts-card .card-data h4 {
        text-align: center;
        font-size: 2.1875rem;
        margin-top: 20px;
        transition: color 0.3s ease;
    }

    .target-bts-card:hover .card-data h4 {
        color: #1e73be;
    }

    .target-bts-card .card-data p {
        text-align: center;
        transition: color 0.3s ease;
    }

    .target-bts-card:hover .card-data p {
        color: #555;
    }

    /* Video Container Styles */
    .video-container {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .video-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.2);
    }

    /* Video Player Styles */
    .video-player {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        max-width: 100%;
        width: 100%;
        height: auto;
        min-height: 250px;
        transition: opacity 0.3s ease;
        background: #000;
    }

    /* YouTube Video Wrapper */
    .youtube-video-wrapper {
        position: relative;
        width: 100%;
        height: 250px;
        background: #000;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .youtube-link {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
        text-decoration: none;
    }

    .play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        max-width: 80px;
        transition: transform 0.3s ease;
    }

    .youtube-link:hover .play-icon {
        transform: translate(-50%, -50%) scale(1.1);
    }

    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, rgba(0,0,0,0.3), rgba(0,0,0,0.1));
        z-index: 1;
    }

    .no-video-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 250px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        border: 2px dashed #dee2e6;
        transition: all 0.3s ease;
    }

    .no-video-placeholder:hover {
        background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
        border-color: #adb5bd;
    }

    .no-video-placeholder img {
        opacity: 0.6;
        max-width: 60px;
        transition: opacity 0.3s ease;
    }

    .no-video-placeholder:hover img {
        opacity: 0.8;
    }

    /* About BTS Description Styles */
    .about-bts-description {
        background-image: url('{{ asset("front-assets/img/bg/about-v.png") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        padding: 2rem;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.1);
    }

    .about-bts-description::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.6) 100%);
        border-radius: 15px;
        z-index: 1;
    }

    .about-bts-description > * {
        position: relative;
        z-index: 2;
    }

    .section-title {
        color: #fff !important;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .section-subtitle {
        color: #fff !important;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        opacity: 0.9;
        line-height: 1.6;
    }

    .section-content {
        color: #fff !important;
    }

    .section-content p {
        color: #fff !important;
        margin-bottom: 1rem !important;
        line-height: 1.7;
    }

    .section-content ul li {
        color: #fff !important;
        margin-bottom: 0.5rem !important;
        line-height: 1.6;
    }

    /* Map Section Styles */
    .map-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        padding: 2rem;
        border-radius: 15px;

        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .map-section:hover {
        transform: translateY(-2px);

    }

    .map-description {
        padding: 1rem 0;
    }

    .map-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
        text-align: justify;
        text-justify: inter-word;
        hyphens: auto;
    }

    .map-content span {
        font-size: 1.1rem !important;
        font-weight: 500;
    }

    .map-image-container {
        position: relative;
        padding: 1rem;
    }

    .map-image {
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .map-image:hover {
        transform: scale(1.02);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .section-title {
            font-size: 1.8rem;
        }

        .youtube-video-wrapper {
            height: 220px;
        }
    }

    @media (max-width: 992px) {
        .about-bts-description {
            padding: 1.5rem;
        }

        .map-section {
            padding: 1.5rem;
        }

        .section-title {
            font-size: 1.6rem;
        }
    }

    @media (max-width: 768px) {
        .video-player {
            min-height: 200px;
        }

        .youtube-video-wrapper {
            height: 200px;
        }

        .about-bts-description {
            padding: 1.25rem;
            margin-top: 1rem;
        }

        .map-section {
            padding: 1.25rem;
            margin-top: 1rem;
        }

        .section-title {
            font-size: 1.4rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }

        .map-content {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .about-bts-description {
            padding: 1rem;
        }

        .map-section {
            padding: 1rem;
        }

        .section-title {
            font-size: 1.3rem;
        }

        .youtube-video-wrapper {
            height: 180px;
        }

        .video-player {
            min-height: 180px;
        }
    }
    </style>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle video errors for inline video
    const inlineVideo = document.querySelector('.video-player');
    if (inlineVideo) {
        inlineVideo.addEventListener('error', function() {
            console.log('Video could not be loaded');
            // You can add error handling UI here if needed
        });

        // Add loading indicator for inline video
        inlineVideo.addEventListener('loadstart', function() {
            inlineVideo.style.opacity = '0.7';
        });

        inlineVideo.addEventListener('canplay', function() {
            inlineVideo.style.opacity = '1';
        });
    }
});
</script>
@endsection
@section('page-content')
    <div class="main-course-bg-header" style="overflow-x: hidden;">
      <div class="course-main-title text-center">
        <h2>About BTS</h2>
      </div>
    </div>

    <div class="container-fluid mt-5" style="overflow-x: hidden;">
        <!-- Video and Who We Are Section - Side by Side -->
        <div class="row g-4 mb-5">
            <!-- Video Section -->
            <div class="col-12 col-md-6 col-lg-5" style="display: flex;align-self: center;">
                <div class="video-container">
                    @if($whoWeAre->details4)
                        @if(filter_var($whoWeAre->details4, FILTER_VALIDATE_URL))
                            <!-- YouTube Link -->
                            <div class="youtube-video-wrapper">
                                <a href="{{ $whoWeAre->details4 }}" target="_blank" class="youtube-link">
                                    <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="Play Video" class="play-icon">
                                    <div class="video-overlay"></div>
                                </a>
                            </div>
                        @else
                            <!-- Uploaded Video - Inline Player -->
                            <video class="video-player" controls autoplay muted loop preload="metadata">
                                <source src="{{ asset($whoWeAre->details4) }}" type="video/mp4">
                                <source src="{{ asset($whoWeAre->details4) }}" type="video/avi">
                                <source src="{{ asset($whoWeAre->details4) }}" type="video/mov">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    @else
                        <div class="no-video-placeholder">
                            <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="No Video Available">
                            <p class="text-muted mt-2">No video uploaded</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Who We Are Description Section -->
            <div class="col-12 col-md-6 col-lg-7">
                <div class="about-bts-description">
                    <h3 class="section-title">{{ ucwords(str_replace('_', ' ', $whoWeAre->section_name)) }}</h3>
                    <p class="section-subtitle">{{ $whoWeAre->small_description }}</p>
                    <div class="section-content">
                        {!! $whoWeAre->details !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section - Full Width Below -->
        <div class="row">
            <div class="col-12">
                <div class="map-section">
                    <div class="row g-4 align-items-center">
                        <!-- Map Description -->
                        <div class="col-12 col-md-6 order-2 order-md-1">
                            <div class="map-description">
                                <div class="map-content">
                                    {!! $whoWeAre->details2 !!}
                                </div>
                            </div>
                        </div>

                        <!-- Map Image -->
                        <div class="col-12 col-md-6 order-1 order-md-2">
                            <div class="map-image-container text-center">
                                <img src="{{ asset('front-assets/img/bg/map.png') }}" alt="World Map" class="map-image img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 best-offers-section" style="overflow-x: hidden;">
      <div class="col-lg-12">
        <div class="section-title-area  text-center" style="color: #000 !important;">
          <h1 class="section-title"   style="color: #000 !important;">What We Offer</h1>
          <span class="col-12 col-md-8  fnt-siz-sm"  style="color: #000 !important;">Your Growth, Our Mission</span>
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

    <div class="row mt-5 bts-target-section" style="overflow-x: hidden;">
      <div class="col-lg-12">
        <div class="section-title-area text-center"  style="color: #000 !important;">
          <h1 class="section-title"   style="color: #000 !important;">{{ ucwords(str_replace('_', ' ', $VisionAndMission->section_name)) }}</h1>
          <span class="col-12 col-md-8  fnt-siz-sm"  style="color: #000 !important;">{{ $VisionAndMission->small_description }}</span>
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
    <div class="container" style="overflow-x: hidden;"  >
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
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <h3 class="white-color">{{ $public_training->small_description }}</h3>
                            </div>
                            <div class="col-6">
                                <div class="row">

                                        <a href="{{ route('service') }}#public_training" class="theme-btn-1 btn btn-effect-1">View
                                            Details</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-6 col-lg-3  p-2">
                <div class="card-item-services service-item-2">
                    <div class="card-service-bottom-footer">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <h3 class="white-color">{{ $in_house_training->small_description }}</h3>

                            </div>
                            <div class="col-6">
                                <div class="row">

                                        <a href="{{ route('service') }}#in_house_training" class="theme-btn-1 btn btn-effect-1">View
                                            Details</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6 col-lg-3  p-2">
                <div class="card-item-services service-item-1">
                    <div class="card-service-bottom-footer">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <h3 class="white-color">{{ $consultancy->small_description }}</h3>

                            </div>
                            <div class="col-6">
                                <div class="row">

                                        <a href="{{ route('service') }}#consultancy" class="theme-btn-1 btn btn-effect-1">View
                                            Details</a>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 p-2">
                <div class="card-item-services service-item-3">
                    <div class="card-service-bottom-footer">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <h3 class="white-color">{{ $online_courses->small_description }}</h3>

                            </div>
                            <div class="col-6">
                                <div class="row">

                                        <a href="{{ route('service') }}#online_courses" class="theme-btn-1 btn btn-effect-1">View
                                            Details</a>


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
