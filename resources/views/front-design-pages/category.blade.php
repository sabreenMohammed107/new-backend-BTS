@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'soft-skills-page')
@section('page-content')

<style>
.ltn__product-tab-area .section-title-area h5 {
    text-align: justify !important;
}
</style>
    <div class="main-course-bg-header" style="background-image: url('{{ asset('front-assets/img/bg/servics-bg.png') }}');">
      <div class="course-main-title text-center">
        <h2>{{ $category->category_en_name }}</h2>
      </div>
      <!-- Add overlay for better text readability -->
      <div class="bg-overlay"></div>
    </div>

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2">

              <h5 class="col-12 txt-just text-left m-auto p-0" style="font-weight: 400!important; color: black; font-size: 16px; padding-left: 0; font-family: 'Poppins', sans-serif;">{{ $category->category_en_description }}</h5>

            </div>
            <div class="row">
              <div class="container">
                @if($category->courseSubCategories->count())

                <div class="row">
                    @foreach($category->courseSubCategories as $subcategory)
                    <div class="col-12 col-md-6 col-lg-4">
                      <a href="{{ route('course.category', ['id' => $subcategory->id]) }}">
                         {{-- <a href="{{ route('searchCourse.index', ['category_id' => $subcategory->id]) }}"> --}}
                        <div class="service-card">
                            {{-- <img src="{{ asset('uploads/course_sub_categories') }}/{{ $subcategory->subcategory_image }}" alt={{ $subcategory->subcategory_en_name }}> --}}
                          <img src="{{ $subcategory->subcategory_image
                ? asset('uploads/course_sub_categories/' . $subcategory->subcategory_image)
                : asset('front-assets/img/No-Image-Placeholder.svg.png') }}"
     onerror="this.onerror=null;this.src='{{ asset('front-assets/img/No-Image-Placeholder.svg.png') }}';"
     alt="{{ $subcategory->subcategory_en_name }}">
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
