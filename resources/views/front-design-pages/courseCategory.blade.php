@extends('front-design-pages.front-layout.app')

@section('page-id', 'soft-skills-page')

@section('page-content')
    <div class="main-course-bg-header"
style="background-image: url('{{asset('front-assets/img/bg/servics-bg.png')}}');" >
        <div class="course-main-title text-center">
            <h2>{{ $subCategory->subcategory_en_name }}</h2>
        </div>
        <div class="bg-overlay"></div>
    </div>

    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2" style="color: #000 !important;">
                        <span class="section-title" style="color: black;font-size:16px;font-weight: normal;text-align: justify;">{{ $subCategory->subcategory_en_description }}</span>
                    </div>

                    <div class="row">
                        <div class="container">
                            <div class="row">

                                @if(isset($courses) && $courses->count() > 0)
           @foreach($courses as $course)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ url('courseDetails/' . $course->id) }}">
                        <div class="service-card">
                            <img src="{{ $course->course_image_thumbnail
                                ? asset('uploads/courses/' . $course->course_image_thumbnail)
                                : asset('front-assets/img/No-Image-Placeholder.svg.png') }}"
                                onerror="this.onerror=null;this.src='{{ asset('front-assets/img/No-Image-Placeholder.svg.png') }}';" alt="">
                            <div class="service-overlay">
                                <h3 class="service-title">{{ $course->course_en_name }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

                                @else
                                    <div class="col-12">
                                        <div class="no-results-message text-center py-5">
                                            <i class="fa-solid fa-circle-info fa-3x mb-3 text-muted"></i>
                                            <h4 class="text-muted">No available courses at the moment</h4>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                    @if(isset($courses) && $courses->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            <nav class="custom-pagination">
                                {{ $courses->links() }}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .no-results-message {
            background: #f9f9f9;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 40px 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
        .no-results-message h4 {
            font-weight: 500;
            color: #555;
        }
        #soft-skills-page .service-card img {
            object-fit: contain !important;
        }

        /* Custom Pagination Styles */
        .custom-pagination .pagination {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .custom-pagination .page-item .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 45px;
            height: 45px;
            padding: 8px 12px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
            font-weight: 500;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .custom-pagination .page-item .page-link:hover {
            border-color: #1a3d5c;
            color: #1a3d5c;
            background-color: #f8f9fa;
        }
        .custom-pagination .page-item.active .page-link {
            background-color: #1a3d5c;
            border-color: #1a3d5c;
            color: #fff;
        }
        .custom-pagination .page-item.disabled .page-link {
            color: #999;
            pointer-events: none;
            background-color: #f5f5f5;
            border-color: #e0e0e0;
        }
        /* Style for prev/next arrows */
        .custom-pagination .page-item:first-child .page-link,
        .custom-pagination .page-item:last-child .page-link {
            font-size: 16px;
            font-weight: bold;
            color: #1a3d5c;
        }
    </style>
@endsection
