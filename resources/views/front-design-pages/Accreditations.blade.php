@extends('front-design-pages.front-layout.app')
@section('page-id' , 'accre-course-page')

@section('page-style')
<style>
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

    /* Loading State */
    .video-container::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid #007bff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        z-index: 1;
    }

    .video-container.loaded::before {
        display: none;
    }

    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
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

        .section-title {
            font-size: 1.4rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .about-bts-description {
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
        margin-right: 0 !important;
    }

    .section-content ul li {
        color: #fff !important;
        margin-bottom: 0.5rem !important;
        line-height: 1.6;
    }


    /* Video Error and Overlay Styles */
    .video-error-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        z-index: 2;
    }

    .error-content {
        text-align: center;
        color: white;
        padding: 20px;
    }

    .retry-btn {
        margin-top: 10px;
        background: #007bff;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .retry-btn:hover {
        background: #0056b3;
    }

    .play-button-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        z-index: 2;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .play-button-overlay:hover {
        background: rgba(0, 0, 0, 0.7);
    }

    .play-content {
        text-align: center;
        color: white;
    }

    .play-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 10px;
        transition: transform 0.3s ease;
    }

    .play-button-overlay:hover .play-icon {
        transform: scale(1.1);
    }

    .play-text {
        font-size: 14px;
        margin: 0;
        opacity: 0.9;
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
    <div class="main-course-bg-header">

      <div class="course-main-title text-center">
        <h2>Accreditations</h2>
      </div>
    </div>
    <div class="container-fluid mt-5" style="overflow-x: hidden;">
        <!-- Video and Accreditations Section - Side by Side -->
        <div class="row g-4 mb-5">
            <!-- Video Section -->
            <div class="col-12 col-md-6 col-lg-5" style="display: flex;align-self: center;">
                <div class="video-container">
                    @if($accreditation->details4)
                        @if(filter_var($accreditation->details4, FILTER_VALIDATE_URL))
                            <!-- YouTube Link -->
                            <div class="youtube-video-wrapper">
                                <a href="{{ $accreditation->details4 }}" target="_blank" class="youtube-link">
                                    <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="Play Video" class="play-icon">
                                    <div class="video-overlay"></div>
                                </a>
                            </div>
                        @else
                            <!-- Uploaded Video - Inline Player -->
                            <video class="video-player" controls autoplay muted loop preload="metadata">
                                <source src="{{ asset($accreditation->details4) }}" type="video/mp4">
                                <source src="{{ asset($accreditation->details4) }}" type="video/avi">
                                <source src="{{ asset($accreditation->details4) }}" type="video/mov">
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

            <!-- Accreditations Description Section -->
            <div class="col-12 col-md-6 col-lg-7">
                <div class="about-bts-description">
                    <h3 class="section-title">{{ ucwords(str_replace('_', ' ', $accreditation->section_name ?? 'Accreditations')) }}</h3>
                    <p class="section-subtitle">{{ $accreditation->small_description }}</p>
                    <div class="section-content">
                        {!! $accreditation->details !!}
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
