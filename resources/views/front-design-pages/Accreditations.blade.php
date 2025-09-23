@extends('front-design-pages.front-layout.app')
@section('page-id' , 'accre-course-page')

@section('page-style')
<style>
    /* Video Container Styles */
    .video-container {
        position: relative;
        width: 100%;
        {{--  height: 100%;  --}}
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        background: #000;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .video-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }

    /* Video Player Styles */
    .video-player {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 15px;
        transition: opacity 0.3s ease;
    }

    .video-player.youtube-player {
        background: #000;
    }

    .video-player.uploaded-video {
        object-fit: cover;
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
    @media (max-width: 768px) {
        .video-container {
            padding-bottom: 60%; /* Slightly taller on mobile */
            margin-bottom: 20px;
        }

        .vid-play {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 480px) {
        .video-container {
            padding-bottom: 65%;
            border-radius: 10px;
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
    // Enhanced Video Functionality
    const videoContainers = document.querySelectorAll('.video-container');
    const uploadedVideos = document.querySelectorAll('.uploaded-video');
    const youtubePlayers = document.querySelectorAll('.youtube-player');

    // Handle uploaded video loading states
    uploadedVideos.forEach(video => {
        const container = video.closest('.video-container');

        // Show loading state initially
        container.classList.add('loading');

        // Handle video loading events
        video.addEventListener('loadstart', function() {
            container.classList.add('loading');
        });

        video.addEventListener('canplay', function() {
            container.classList.remove('loading');
            container.classList.add('loaded');
        });

        video.addEventListener('loadeddata', function() {
            container.classList.remove('loading');
            container.classList.add('loaded');
        });

        // Handle video errors
        video.addEventListener('error', function() {
            container.classList.remove('loading');
            showVideoError(container, 'Video could not be loaded');
        });

        // Handle autoplay policy
        video.addEventListener('play', function() {
            container.classList.remove('loading');
            container.classList.add('loaded');
        });

        // Attempt autoplay with fallback
        const playPromise = video.play();
        if (playPromise !== undefined) {
            playPromise.then(() => {
                // Autoplay started successfully
                container.classList.remove('loading');
                container.classList.add('loaded');
            }).catch(error => {
                // Autoplay was prevented
                console.log('Autoplay prevented:', error);
                container.classList.remove('loading');
                container.classList.add('loaded');

                // Show play button overlay
                showPlayButtonOverlay(container, video);
            });
        }
    });

    // Handle YouTube iframe loading
    youtubePlayers.forEach(iframe => {
        const container = iframe.closest('.video-container');

        iframe.addEventListener('load', function() {
            container.classList.remove('loading');
            container.classList.add('loaded');
        });

        // Handle YouTube API ready (if available)
        if (typeof YT !== 'undefined') {
            iframe.addEventListener('load', function() {
                setTimeout(() => {
                    container.classList.remove('loading');
                    container.classList.add('loaded');
                }, 1000);
            });
        }
    });

    // Function to show video error
    function showVideoError(container, message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'video-error-overlay';
        errorDiv.innerHTML = `
            <div class="error-content">
                <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="Video Error" style="opacity: 0.5; max-width: 60px; margin-bottom: 10px;">
                <p class="text-muted">${message}</p>
                <button class="btn btn-primary btn-sm retry-btn">Retry</button>
            </div>
        `;

        container.appendChild(errorDiv);

        // Add retry functionality
        const retryBtn = errorDiv.querySelector('.retry-btn');
        retryBtn.addEventListener('click', function() {
            errorDiv.remove();
            const video = container.querySelector('video');
            if (video) {
                video.load();
                video.play().catch(e => console.log('Retry failed:', e));
            }
        });
    }

    // Function to show play button overlay for muted autoplay
    function showPlayButtonOverlay(container, video) {
        const overlay = document.createElement('div');
        overlay.className = 'play-button-overlay';
        overlay.innerHTML = `
            <div class="play-content">
                <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="Play Video" class="play-icon">
                <p class="play-text">Click to play video</p>
            </div>
        `;

        container.appendChild(overlay);

        overlay.addEventListener('click', function() {
            video.play().then(() => {
                overlay.remove();
            }).catch(e => {
                console.log('Manual play failed:', e);
            });
        });
    }

    // Intersection Observer for lazy loading (optional enhancement)
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const video = entry.target.querySelector('video');
                    if (video && video.paused) {
                        video.play().catch(e => console.log('Intersection play failed:', e));
                    }
                }
            });
        }, { threshold: 0.5 });

        videoContainers.forEach(container => {
            observer.observe(container);
        });
    }

    // Handle visibility change (pause when tab is not active)
    document.addEventListener('visibilitychange', function() {
        uploadedVideos.forEach(video => {
            if (document.hidden) {
                video.pause();
            } else if (!video.paused) {
                video.play().catch(e => console.log('Resume play failed:', e));
            }
        });
    });
});
</script>
@endsection

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
                @if($accreditation->details4)
                    @if(filter_var($accreditation->details4, FILTER_VALIDATE_URL))
                        <!-- YouTube Link - Embedded Player -->
                        <div class="video-container">
                            <iframe
                                src="{{ str_replace('watch?v=', 'embed/', $accreditation->details4) }}?autoplay=1&mute=1&loop=1&playlist={{ substr(strrchr($accreditation->details4, '='), 1) }}&controls=1&showinfo=0&rel=0&modestbranding=1"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                class="video-player youtube-player">
                            </iframe>
                        </div>
                    @else
                        <!-- Uploaded Video - Direct Player -->
                        <div class="video-container">
                            <video
                                class="video-player uploaded-video"
                                controls
                                autoplay
                                muted
                                loop
                                preload="metadata"
                                poster="{{ asset('front-assets/img/icons/play.png') }}">
                                <source src="{{ asset($accreditation->details4) }}" type="video/mp4">
                                <source src="{{ asset($accreditation->details4) }}" type="video/webm">
                                <source src="{{ asset($accreditation->details4) }}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif
                @else
                    <div class="no-video-placeholder">
                        <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="No Video Available">
                        <p class="text-muted mt-2">No video uploaded</p>
                    </div>
                @endif
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
