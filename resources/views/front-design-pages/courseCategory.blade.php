@extends('front-design-pages.front-layout.app')

@section('page-id', 'soft-skills-page')

@section('page-content')
    <div class="main-course-bg-header"
        style="background-image: url('{{ $category->category_image ? asset($category->category_image) : asset('front-assets/img/bg/servics-bg.png') }}');">
        <div class="course-main-title text-center">
            <h2>{{ $subCategory->subcategory_en_name }}</h2>
        </div>
        <div class="bg-overlay"></div>
    </div>

    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2">
                        <h5 class="col-12 txt-just text-left">{{ $category->category_en_description }}</h5>
                    </div>

                    <div class="row">
                        <div class="container">
                            <div class="row">

                                @if(isset($filtered) && $filtered->count() > 0)
                                    @foreach ($filtered as $round)
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <a href="{{ url('courseDetails/' . $round->course->id) }}">
                                                <div class="service-card">
                                                    <img src="{{ asset('uploads/courses/' . $round->course->course_image_thumbnail) }}"
                                                         alt="{{ $round->country->country_en_name }}">
                                                    <div class="service-overlay">
                                                        <h3 class="service-title">{{ $round->course->course_en_name }}</h3>
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

                    @if(isset($filtered))
                        <div class="d-flex justify-content-center mt-4">
                            {{ $filtered->links() }}
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
    </style>
@endsection
