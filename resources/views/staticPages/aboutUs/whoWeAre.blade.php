@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Who we are</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Who we are</li>
                    <li class="breadcrumb-item text-dark">Update</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
        </div>
    </div>
@endsection

@section('content')
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <div class="container-xxl">
            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Something went wrong</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form d-flex flex-column flex-lg-row" action="{{ route('whoWeAreUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General Information</h2>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <!-- Row 1: Small Description & Details -->
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Small Description</label>
                                        <textarea   class="form-control" name="small_description" >{{ $row->small_description }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Details</label>
                                        <textarea   class="form-control tinymce-editor" name="details" >{{ $row->details }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2: Image Upload Fields -->
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">details 2</label>
                                        <textarea   class="form-control tinymce-editor" name="details2" >{{ $row->details2 }}</textarea>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label class="form-label">details 3 </label>
                                        <textarea   class="form-control tinymce-editor" name="details3" >{{ $row->details3 }}</textarea>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Video Upload</label>
                                        <input type="file" class="form-control" name="video_file" accept="video/*" />
                                        @if($row->details4)
                                            <div class="mt-2">
                                                <small class="text-muted">Current video: {{ basename($row->details4) }}</small>
                                                <br>
                                                <a href="#" class="btn btn-sm btn-primary mt-2 admin-video-preview" data-video-src="{{ asset($row->details4) }}">
                                                    <i class="fas fa-play"></i> Preview Video
                                                </a>
                                            </div>
                                        @endif
                                        <small class="form-text text-muted">Upload MP4, AVI, or MOV video files (max 50MB)</small>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end::General options-->

                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('whoWeAreView') }}" class="btn btn-light me-5">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Main column-->
            </form>
        </div>
    </div>
    <!--end::Post-->

    <!-- Admin Video Modal -->
    <div class="admin-video-modal" id="adminVideoModal">
        <div class="admin-video-modal-content">
            <div class="admin-video-modal-header">
                <h5 class="admin-video-modal-title">Video Preview</h5>
                <span class="admin-video-modal-close">&times;</span>
            </div>
            <div class="admin-video-modal-body">
                <video id="adminModalVideo" controls preload="metadata">
                    <source src="" type="video/mp4">
                    <source src="" type="video/avi">
                    <source src="" type="video/mov">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<style>
/* Admin Video Modal Styles */
.admin-video-modal {
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

.admin-video-modal-content {
    position: relative;
    margin: 2% auto;
    width: 90%;
    max-width: 800px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
}

.admin-video-modal-header {
    position: relative;
    padding: 15px 20px;
    background: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.admin-video-modal-title {
    margin: 0;
    color: #495057;
    font-weight: 600;
}

.admin-video-modal-close {
    color: #6c757d;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.3s ease;
}

.admin-video-modal-close:hover {
    color: #dc3545;
}

.admin-video-modal-body {
    padding: 0;
    position: relative;
}

.admin-video-modal-body video {
    width: 100%;
    height: auto;
    display: block;
}

@media (max-width: 768px) {
    .admin-video-modal-content {
        width: 95%;
        margin: 5% auto;
    }

    .admin-video-modal-header {
        padding: 10px 15px;
    }

    .admin-video-modal-close {
        font-size: 20px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Admin Video Modal Functionality
    const adminVideoModal = document.getElementById('adminVideoModal');
    const adminModalVideo = document.getElementById('adminModalVideo');
    const adminModalClose = document.querySelector('.admin-video-modal-close');
    const adminVideoPreviewBtns = document.querySelectorAll('.admin-video-preview');

    // Open modal when preview button is clicked
    adminVideoPreviewBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const videoSrc = this.getAttribute('data-video-src');

            // Set video source
            const sources = adminModalVideo.querySelectorAll('source');
            sources.forEach(source => {
                source.src = videoSrc;
            });

            // Load video
            adminModalVideo.load();

            // Show modal
            adminVideoModal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });
    });

    // Close modal when X is clicked
    adminModalClose.addEventListener('click', function() {
        closeAdminVideoModal();
    });

    // Close modal when clicking outside the video
    adminVideoModal.addEventListener('click', function(e) {
        if (e.target === adminVideoModal) {
            closeAdminVideoModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && adminVideoModal.style.display === 'block') {
            closeAdminVideoModal();
        }
    });

    // Function to close modal
    function closeAdminVideoModal() {
        adminVideoModal.style.display = 'none';
        document.body.style.overflow = 'auto';
        adminModalVideo.pause();
        adminModalVideo.currentTime = 0;

        // Clear video sources
        const sources = adminModalVideo.querySelectorAll('source');
        sources.forEach(source => {
            source.src = '';
        });
    }
});
</script>
@endsection
