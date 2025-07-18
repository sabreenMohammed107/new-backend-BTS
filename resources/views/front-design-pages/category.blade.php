@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'soft-skills-page')
@section('page-content')
    <div class="main-course-bg-header">
      <div class="course-main-title text-center">
        <h2>{{ $category->category_en_name }}</h2>
      </div>
    </div>

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2">

              <h5 class="col-12  g-clr text-left">{{ $category->category_en_description }}</h5>

            </div>
            <div class="row">
              <div class="container">
                @if($category->courseSubCategories->count())

                <div class="row">
                    @foreach($category->courseSubCategories as $subcategory)
                    <div class="col-12 col-md-6 col-lg-4">
                         <a href="{{ route('searchCourse.index', ['category_id' => $subcategory->id]) }}">
                        <div class="service-card">
                            <img src="{{ asset('uploads/course_sub_categories') }}/{{ $subcategory->subcategory_image }}" alt="Administration and Finance">
                            <div class="service-overlay">
                                <h3 class="service-title">{{ $subcategory->subcategory_en_name }}</h3>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                    @else
          <p>No subcategories found.</p>
      @endif
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
