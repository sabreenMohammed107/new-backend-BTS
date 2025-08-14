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

    /* Video Player Styles */
    .video-player {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        max-width: 100%;
        height: auto;
        transition: opacity 0.3s ease;
    }

    @media (max-width: 768px) {
        .video-player {
            width: 100%;
            height: auto;
        }

        .vid-play {
            margin-bottom: 20px;
        }
    }

    .no-video-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 200px;
        background: #f8f9fa;
        border-radius: 10px;
        border: 2px dashed #dee2e6;
    }

    .no-video-placeholder img {
        opacity: 0.5;
        max-width: 60px;
    }

    .vid-play {
        display: flex;
        align-items: center;
        justify-content: center;
    }
{{--
    .vid-play a {
        transition: transform 0.3s ease;
    }

    .vid-play a:hover {
        transform: scale(1.05);
    }  --}}

    /* Video Play Button */
    .video-play-btn {
        cursor: pointer;
        display: inline-block;
    }

    {{--  .video-play-btn:hover {
        transform: scale(1.1);
    }  --}}

    /* Video Modal Styles */
    .video-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(5px);
    }

    .video-modal-content {
        position: relative;
        margin: 2% auto;
        width: 90%;
        max-width: 800px;
        background: #000;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    .video-modal-header {
        position: relative;
        padding: 10px 20px;
        background: rgba(0, 0, 0, 0.8);
        text-align: right;
    }

    .video-modal-close {
        color: #fff;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .video-modal-close:hover {
        color: #ff6b6b;
    }

    .video-modal-body {
        padding: 0;
        position: relative;
    }

    .video-modal-body video {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Responsive Modal */
    @media (max-width: 768px) {
        .video-modal-content {
            width: 95%;
            margin: 5% auto;
        }

        .video-modal-header {
            padding: 5px 15px;
        }

        .video-modal-close {
            font-size: 24px;
        }
    }

    /* Video Error Handling */
    .video-error {
        display: none;
        text-align: center;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        border: 2px dashed #dee2e6;
    }

    .video-error.show {
        display: block;
    }
    </style>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Video Modal Functionality
    const videoModal = document.getElementById('videoModal');
    const modalVideo = document.getElementById('modalVideo');
    const modalClose = document.querySelector('.video-modal-close');
    const videoPlayBtns = document.querySelectorAll('.video-play-btn');

    // Open modal when play button is clicked
    videoPlayBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const videoSrc = this.getAttribute('data-video-src');

            // Set video source
            const sources = modalVideo.querySelectorAll('source');
            sources.forEach(source => {
                source.src = videoSrc;
            });

            // Load and play video
            modalVideo.load();

            // Show modal
            videoModal.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Prevent background scrolling

            // Auto-play video (optional - some browsers block this)
            modalVideo.play().catch(function(error) {
                console.log('Auto-play was prevented:', error);
            });
        });
    });

    // Close modal when X is clicked
    modalClose.addEventListener('click', function() {
        closeVideoModal();
    });

    // Close modal when clicking outside the video
    videoModal.addEventListener('click', function(e) {
        if (e.target === videoModal) {
            closeVideoModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && videoModal.style.display === 'block') {
            closeVideoModal();
        }
    });

    // Function to close modal
    function closeVideoModal() {
        videoModal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Restore scrolling
        modalVideo.pause();
        modalVideo.currentTime = 0;

        // Clear video sources
        const sources = modalVideo.querySelectorAll('source');
        sources.forEach(source => {
            source.src = '';
        });
    }

    // Handle video errors in modal
    modalVideo.addEventListener('error', function() {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'video-error show';
        errorDiv.innerHTML = `
            <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="Video Error" style="opacity: 0.5; max-width: 60px; margin-bottom: 10px;">
            <p class="text-muted">Video could not be loaded</p>
            <a href="${modalVideo.querySelector('source').src}" target="_blank" class="btn btn-primary btn-sm">Download Video</a>
        `;

        modalVideo.style.display = 'none';
        document.querySelector('.video-modal-body').appendChild(errorDiv);
    });

    // Add loading indicator for modal video
    modalVideo.addEventListener('loadstart', function() {
        modalVideo.style.opacity = '0.7';
    });

    modalVideo.addEventListener('canplay', function() {
        modalVideo.style.opacity = '1';
    });
});
</script>
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
                    @if($whoWeAre->details4)
                        @if(filter_var($whoWeAre->details4, FILTER_VALIDATE_URL))
                            <!-- YouTube Link -->
                            <a href="{{ $whoWeAre->details4 }}" target="_blank">
                                <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="Play Video">
                            </a>
                        @else
                            <!-- Uploaded Video - Play Button -->
                            <a href="#" class="video-play-btn" data-video-src="{{ asset($whoWeAre->details4) }}">
                                <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="Play Video">
                            </a>
                        @endif
                    @else
                        <div class="no-video-placeholder">
                            <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="No Video Available">
                            <p class="text-muted mt-2">No video uploaded</p>
                        </div>
                    @endif
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

    <!-- Video Modal -->
    <div class="video-modal" id="videoModal">
        <div class="video-modal-content">
            <div class="video-modal-header">
                <span class="video-modal-close">&times;</span>
            </div>
            <div class="video-modal-body">
                <video id="modalVideo" controls preload="metadata">
                    <source src="" type="video/mp4">
                    <source src="" type="video/avi">
                    <source src="" type="video/mov">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

@endsection
