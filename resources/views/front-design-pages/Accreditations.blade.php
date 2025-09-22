@extends('front-design-pages.front-layout.app')
@section('page-id' , 'accre-course-page')

@section('page-style')
<style>
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

    /* Video Play Button */
    .video-play-btn {
        cursor: pointer;
        display: inline-block;
    }

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
                        <!-- YouTube Link -->
                        <a href="{{ $accreditation->details4 }}" target="_blank">
                            <img src="{{ asset('front-assets/img/icons/play.png') }}" alt="Play Video">
                        </a>
                    @else
                        <!-- Uploaded Video - Play Button -->
                        <a href="#" class="video-play-btn" data-video-src="{{ asset($accreditation->details4) }}">
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
