@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'service-page')
@section('page-content')
<style>

</style>
    <div class="main-course-bg-header">
      <div class="course-main-title text-center">
        <h2>Services</h2>
      </div>
    </div>

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" >

                <section class="training-section" id="public_training">
                <div class="container">
                    <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="images-container">
                        <img src="{{ $public_training->details2 }}" alt="Public Training Session" class="primary-image">


                        <img src="{{ $public_training->details3 }}" alt="City Skyline" class="secondary-image">
                        {{--  <a href="{{ $public_training->details4 }}" target="_blank" class="image-vid-play"><i class="fas fa-play clr-white"></i></a>  --}}

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content-container">
                        <h2 class="training-title">{{ $public_training->small_description }}</h2>
                        <p class="training-description">
                            {{ $public_training->details }}
                        </p>
                        {{-- <button class="view-details-btn">View Details</button> --}}
                        </div>
                    </div>
                    </div>
                </div>
                </section>
            </div>

            <div class="col-lg-12" style="position:relative;" >
                <div style="height: 50px;position:absolute;top:-150px;left:0;opacity: 0;" id="in_house_training">d</div>
                <section class="public-training-section">
                <div class="container section-border">
                    <div class="row align-items-center section-content">
                    <div class="col-lg-6">
                        <h2 class="training-title">{{ $in_house_training->small_description }}</h2>
                        <p class="training-description">
                            {{ $in_house_training->details }}
                        </p>
                        <div class="btn-container">
                        {{-- <button class="view-details-btn">View Details</button> --}}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="images-container">
                        {{-- <img src="{{ asset('front-assets/img/service/Rectangle 10250 (1).png') }}" alt="Business Training" class="image-top">
                        <img src="{{ asset('front-assets/img/service/Rectangle 102aaa52.png') }}" alt="Team Discussion" class="image-bottom-left">
                        <img src="{{ asset('front-assets/img/service/Rectangle 10aaa251.png') }}" alt="Team Discussion" class="image-bottom-right"> --}}
                        <img src="{{ $in_house_training->details2 }}" alt="Business Training" class="image-top">
                        <img src="{{ $in_house_training->details3 }}" alt="Team Discussion" class="image-bottom-left">
                        <img src="{{ $in_house_training->details4 }}" alt="Team Discussion" class="image-bottom-right">
                        </div>
                    </div>
                    </div>
                </div>
                </section>
            </div>


          <div class="col-lg-12" style="position:relative;">
            <div style="height: 50px;position:absolute;top:-150px;left:0;opacity: 0;" id="consultancy"></div>
            <section class="training-section" >
              <div class="container">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="content-container">
                      <h2 class="training-title">{{ $consultancy->small_description }}</h2>
                      <p class="training-description">
                        {{ $consultancy->details }}
                      </p>
                      {{-- <button class="view-details-btn">View Details</button> --}}
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="images-container">
                      <img src="{{ $consultancy->details2 }}" alt="Public Training Session" class="primary-image">


                      <img src="{{ $consultancy->details3 }}" alt="City Skyline" style="object-position: top;" class="secondary-image">
                      {{--  <a href="{{ $consultancy->details4 }}" target="_blank" class="image-vid-play"><i class="fas fa-play clr-white"></i></a>  --}}
                      {{-- <img src="{{ asset('front-assets/img/service/Rectangle 102ss51.png') }}" alt="Public Training Session" class="primary-image">


                      <img src="{{ asset('front-assets/img/service/Rectangle 102aaa55.png') }}" alt="City Skyline" class="secondary-image">
                      <a href="" class="image-vid-play"><i class="fas fa-play clr-white"></i></a> --}}

                    </div>
                  </div>

                </div>
              </div>
            </section>
          </div>
          <div class="col-lg-12" style="position:relative;">
            <div style="height: 50px;position:absolute;top:-150px;left:0;opacity: 0;" id="online_courses"></div>
            <section class="training-section" >
              <div class="container section-border">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <div class="images-container">
                      <img src="{{ $online_courses->details2 }}" alt="Public Training Session" class="primary-image">


                      <img src="{{ $online_courses->details3 }}" alt="City Skyline" class="secondary-image">
                      {{--  <a href="{{ $consultancy->details4 }}" target="_blank" class="image-vid-play"><i class="fas fa-play clr-white"></i></a>  --}}
                      {{-- <img src="{{ asset('front-assets/img/service/Rectangle 10254.png') }}" alt="Public Training Session" class="primary-image">


                      <img src="{{ asset('front-assets/img/service/Rectangle 1025ss2.png') }}" alt="City Skyline" class="secondary-image">
                      <a href="" class="image-vid-play"><i class="fas fa-play clr-white"></i></a> --}}

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="content-container">
                      <h2 class="training-title" style="color: #fff !important;">{{ $online_courses->small_description }}</h2>
                      <p class="training-description" style="color: #fff !important;">
                        {{ $online_courses->details }}
                      </p>
                      {{-- <button class="view-details-btn">View Details</button> --}}
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
@endsection
