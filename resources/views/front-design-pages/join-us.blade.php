@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'join-us-page')
@section('page-content')
    <div class="main-course-bg-header">
      <div class="course-main-title text-center">
        <h2>JOIN US</h2>
      </div>
    </div>
    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2 text-center">

              <h5 class="col-12 col-md-8 g-clr text-center f-s-20 p-5 m-auto">Join our inspiring team or become a distinguished speaker and be part of a journey of success, innovation, and meaningful connections. Share your expertise, inspire others, and make a lasting impact!</h5>

            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="join-us-card">
                  <img src="{{ asset('front-assets/img/bg/Join the speakers and make an impact!.png') }}" alt="">
                  <div class="card-overlay"></div>
                  <div class="join-us-cart-data">
                    <span>Speakers</span>
                    <h3>Join the <br> speakers and <br> make an impact!</h3>
                    <a href="{{ route('join-us-speaker-page') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase mt-1" tabindex="0">Click Here</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="join-us-card">
                  <img src="{{ asset('front-assets/img/bg/Join our team and grow with us.png') }}" alt="">
                  <div class="card-overlay"></div>
                  <div class="join-us-cart-data">
                    <span>Team Member</span>
                    <h3>Join our <br> team and <br> grow with us</h3>
                    <a href="{{ route('join-team') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase mt-1" tabindex="0">Click Here</a>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
