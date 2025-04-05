@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-content')

        <div class="ltn__utilize-overlay"></div>

        <!-- SLIDER AREA START (slider-3) -->

        <div class="ltn__slider-area ltn__slider-3  section-bg-1">
            <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
                <!-- ltn__slide-item -->
                @isset($banners)
    @foreach ($banners as $banner)
        <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3 ltn__slide-item-3-normal ltn__slide-one-active"
             style="background-image: url('{{ asset('uploads/sliders/' . $banner->image) }}'); background-size: cover; background-position: center 10%;"
             tabindex="-1">
            <div class="ltn__slide-item-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="slide-item-info">
                                <div class="slide-item-info-inner ltn__slide-animation">

                                    <h6 class="slide-sub-title animated wh-txt-clr">
                                        {!! $banner->en_head_title !!}
                                    </h6>

                                    <h1 class="slide-title animated bebas-neue-regular wh-txt-clr uppercase-litter">
                                        {!! $banner->en_title !!}
                                    </h1>

                                    <div class="slide-brief animated wh-txt-clr">
                                        <p class="wh-txt-clr">
                                            {{ trim(str_replace('&nbsp;', ' ', strip_tags($banner->description))) }}
                                        </p>
                                    </div>

                                    <div class="btn-wrapper animated">
                                        <a href="{{ route('contact-us') }}" class="theme-btn-3 btn btn-effect-1 text-uppercase mt-1">Contact Us</a>
                                        <a href="{{ route('download-center') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase mt-1">Download Center</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endisset

          </div>
            <div class="social-side-links">
                <div class="row flex-column">

                    <div class="face">
                        <a href="http://"><i class="fab fa-facebook-f"></i></a>
                    </div>
                    <div class="linkedin">
                        <a href="http://"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <a href="http://">
                    <div class="xtw">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#e7eaee" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                    </div>
                    </a>
                    <div class="insta">
                        <a href="http://"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- SLIDER AREA END -->

        <!-- FEATURE AREA START ( Feature - 3) -->

        <div class="ltn__feature-area search-form-top-slider mt-100 mt--65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__feature-item-box-wrap ltn__feature-item-box-wrap-2 ltn__border section-bg-6">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="">
                                        <input type="text" placeholder="Course Name" value="" name="Course_Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-0">
                                    <div class="">
                                        <select class="" aria-label="Default select example">
                                            <option selected>Category</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-0">
                                    <div class="mc-field-group">
                                        <select class="" aria-label="Default select example">
                                            <option selected>Venue</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-md-3 mt-xl-0">
                                    <div class="mc-field-group">
                                        <input type="text" placeholder="Duration" value="" name="Duration">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-3">
                                    <div class="mc-field-group d-flex align-items-center">
                                        <span>From:</span>
                                        <input type="date" placeholder="Course Name" value="" name="Course_Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-3">
                                    <div class="mc-field-group d-flex align-items-center">
                                        <span>To:</span>

                                        <input type="date" placeholder="Course Name" value="" name="Course_Name">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-3">
                                    <a href="" class="form-btn-transparent">Tailor your course</a>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-3">
                                    <a href="{{ route('course-search') }}" class="form-btn">Search</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURE AREA END -->
        <!-- CATEGORY AREA START -->
        <div class="ltn__category-area section-bg-1-- ltn__primary-bg before-bg-1 bg-image bg-overlay-theme-black-5--0 pt-115 pb-90"
            data-bg="{{ asset('front-assts/img/bg/Background\ \(2\).png') }}">
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
                        <div class="card-item-services service-item-4" style="background-image: url({{ asset('assets/front/img/service/service-3.jpg') }});">
                            <div class="card-service-bottom-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="white-color">Public Training</h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-8">
                                                <a href="{{ route('service') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">View
                                                    Details</a>
                                            </div>
                                            <div class="col-2 offset-2 d-flex align-items-center">
                                                <a href="{{ route('service') }}" class="white-color"><i class="fas fa-share-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-6 col-lg-3  p-2">
                        <div class="card-item-services service-item-2" style="background-image: url({{ asset('assets/front/img/service/service-3.jpg') }});">
                            <div class="card-service-bottom-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="white-color">In-House Training</h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-8">
                                                <a href="{{ route('service') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">View
                                                    Details</a>
                                            </div>
                                            <div class="col-2 offset-2 d-flex align-items-center">
                                                <a href="{{ route('service') }}" class="white-color"><i class="fas fa-share-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-6 col-lg-3  p-2">
                        <div class="card-item-services service-item-1" style="background-image: url({{ asset('assets/front/img/service/service-3.jpg') }});">
                            <div class="card-service-bottom-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="white-color">Consultancy</h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-8">
                                                <a href="{{ route('service') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">View
                                                    Details</a>
                                            </div>
                                            <div class="col-2 offset-2 d-flex align-items-center">
                                                <a href="{{ route('service') }}" class="white-color"><i class="fas fa-share-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 p-2">
                        <div class="card-item-services service-item-3" style="background-image: url({{ asset('assets/front/img/service/service-3.jpg') }});">
                            <div class="card-service-bottom-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="white-color">Online Courses</h3>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-8">
                                                <a href="{{ route('service') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">View
                                                    Details</a>
                                            </div>
                                            <div class="col-2 offset-2 d-flex align-items-center">
                                                <a href="{{ route('service') }}" class="white-color"><i class="fas fa-share-alt"></i></a>
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
        <!-- ABOUT US AREA START -->
        <div class="ltn__about-us-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="about-us-info-wrap">
                            <div class="row">
                                <div class="col-12 section-title-area ltn__section-title-2">

                                    <h1 class="section-title">OUR TRANING <br class="d-none d-md-block">Methodologies
                                    </h1>
                                    <p>BTS Consultant is a global leader in professional training and consulting,
                                        empowering individuals and organizations worldwide. With a presence across
                                        multiple countries, they deliver innovative programs and certified courses
                                        tailored to modern business needs, focusing on leadership, technical, and
                                        personal development.</p>
                                </div>

                                <div class="col-12 row">

                                    <div class="col-6 align-self-center">
                                        <img src="{{ asset('front-assets/img/bg/Rectangle 127.png') }}" alt="#">
                                    </div>
                                    <div class="col-6   align-self-center">
                                        <img src="{{ asset('front-assets/img/bg/Rectangle 126.png') }}" alt="#">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 mt-3 mt-lg-0 align-self-center row justify-content-end">
                        <div class="about-us-img-wrap row about-img-left">
                            <img src="{{ asset('front-assets/img/bg/Rectangle 124.png') }}" alt="About Us Image">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ABOUT US AREA END -->
        <div class="container section-of-introduction">
            <div class="row">
                <div class="col-12 row justify-content-end training-footer mt-5">
                    <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                        <!-- Blog Item -->
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="training-footer-item p-3 py-5">
                                <div class="training-footer-item-box d-flex flex-column align-items-center">
                                    <span><img src="{{ asset('front-assets/img/icons/academic-education-graduate-svgrepo-com 1.png') }}" alt=""
                                            srcset=""></span>
                                    <h6 class='mt-3'>Competency-Based Training</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="training-footer-item p-3 py-5">
                                <div class="training-footer-item-box d-flex flex-column align-items-center">
                                    <span><img src="{{ asset('front-assets/img/icons/bxs_game.png') }}" alt="" srcset=""></span>
                                    <h6 class='mt-3'>Games-Based Training</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="training-footer-item p-3 py-5">

                                <div class="training-footer-item-box d-flex flex-column align-items-center">
                                    <span><img src="{{ asset('front-assets/img/icons/material-symbols_simulation.png') }}" alt="" srcset=""></span>
                                    <h6 class='mt-3'>Simulation</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3  ">
                            <div class="training-footer-item p-3 py-5">

                                <div class="training-footer-item-box d-flex flex-column align-items-center">
                                    <span><img src="{{ asset('front-assets/img/icons/Group.png') }}" alt="" srcset=""></span>
                                    <h6 class='mt-3'>Practical</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="training-footer-item p-3 py-5">
                                <div class="training-footer-item-box d-flex flex-column align-items-center">
                                    <span><img src="{{ asset('front-assets/img/icons/academic-education-graduate-svgrepo-com 1.png') }}" alt=""
                                            srcset=""></span>
                                    <h6 class='mt-3'>Competency-Based Training</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="training-footer-item p-3 py-5">
                                <div class="training-footer-item-box d-flex flex-column align-items-center">
                                    <span><img src="{{ asset('front-assets/img/icons/bxs_game.png') }}" alt="" srcset=""></span>
                                    <h6 class='mt-3'>Games-Based Training</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 ">
                            <div class="training-footer-item p-3 py-5">

                                <div class="training-footer-item-box d-flex flex-column align-items-center">
                                    <span><img src="{{ asset('front-assets/img/icons/material-symbols_simulation.png') }}" alt="" srcset=""></span>
                                    <h6 class='mt-3'>Simulation</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3  ">
                            <div class="training-footer-item p-3 py-5">

                                <div class="training-footer-item-box d-flex flex-column align-items-center">
                                    <span><img src="{{ asset('front-assets/img/icons/Group.png') }}" alt="" srcset=""></span>
                                    <h6 class='mt-3'>Practical</h3>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <!-- PRODUCT AREA START (product-item-3) -->
        <div class="ltn__product-area blogs-top-ranked ltn__product-gutter pt-5 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center">
                            <h1 class="section-title">Top Ranked Courses We Offer</h1>
                            <h6>Your Growth, Our Mission</h6>
                        </div>
                    </div>
                </div>
                <style>

                </style>
                <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="ltn__product-item ltn__product-item-3 text-left">
                                <div class="product-img">
                                    <a href="{{ route('single-course') }}" class="img-container"><img height="100%" src="{{ asset('front-assets/img/bg/aa.png') }}" alt="#"></a>
                                    <div class="course-badge">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                                            </div>

                                            <div class="col-12 row">
                                                <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <span class="icon-arrow">
                                                        <a href="{{ route('single-course') }}"><i class="fa fa-arrow-right white-color"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="ltn__product-item ltn__product-item-3 text-left">
                                <div class="product-img">
                                    <a  class="img-container" href="{{ route('single-course') }}"><img height="100%" src="{{ asset('front-assets/img/bg/bb.png') }}" alt="#"></a>
                                    <div class="course-badge">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                                            </div>

                                            <div class="col-12 row">
                                                <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <span class="icon-arrow">
                                                        <a href="{{ route('single-course') }}"><i class="fa fa-arrow-right white-color"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="ltn__product-item ltn__product-item-3 text-left">
                                <div class="product-img">
                                    <a  class="img-container" href="{{ route('single-course') }}"><img height="100%" src="{{ asset('front-assets/img/bg/cc.png') }}" alt="#"></a>
                                    <div class="course-badge">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                                            </div>

                                            <div class="col-12 row">
                                                <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <span class="icon-arrow">
                                                        <a href="{{ route('single-course') }}"><i class="fa fa-arrow-right white-color"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="ltn__product-item ltn__product-item-3 text-left">
                                <div class="product-img">
                                    <a  class="img-container" href="{{ route('single-course') }}"><img height="100%" src="{{ asset('front-assets/img/bg/dd.png') }}" alt="#"></a>
                                    <div class="course-badge">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                                            </div>

                                            <div class="col-12 row">
                                                <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <span class="icon-arrow">
                                                        <a href="{{ route('single-course') }}"><i class="fa fa-arrow-right white-color"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row d-none d-lg-flex">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="ltn__product-item ltn__product-item-3 text-left">
                                <div class="product-img">
                                    <a  class="img-container" href="{{ route('single-course') }}"><img height="100%" src="{{ asset('front-assets/img/bg/aa.png') }}" alt="#"></a>
                                    <div class="course-badge">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                                            </div>

                                            <div class="col-12 row">
                                                <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <span class="icon-arrow">
                                                        <a href="{{ route('single-course') }}"><i class="fa fa-arrow-right white-color"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="ltn__product-item ltn__product-item-3 text-left">
                                <div class="product-img">
                                    <a  class="img-container" href="{{ route('single-course') }}"><img height="100%" src="{{ asset('front-assets/img/bg/bb.png') }}" alt="#"></a>
                                    <div class="course-badge">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                                            </div>

                                            <div class="col-12 row">
                                                <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <span class="icon-arrow">
                                                        <a href="{{ route('single-course') }}"><i class="fa fa-arrow-right white-color"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="ltn__product-item ltn__product-item-3 text-left">
                                <div class="product-img">
                                    <a  class="img-container" href="{{ route('single-course') }}"><img height="100%" src="{{ asset('front-assets/img/bg/cc.png') }}" alt="#"></a>
                                    <div class="course-badge">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                                            </div>

                                            <div class="col-12 row">
                                                <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <span class="icon-arrow">
                                                        <a href="{{ route('single-course') }}"><i class="fa fa-arrow-right white-color"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="ltn__product-item ltn__product-item-3 text-left">
                                <div class="product-img">
                                    <a  class="img-container" href="{{ route('single-course') }}"><img height="100%" src="{{ asset('front-assets/img/bg/dd.png') }}" alt="#"></a>
                                    <div class="course-badge">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                                            </div>

                                            <div class="col-12 row">
                                                <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                                </div>
                                                <div class="col-2 mb-2">
                                                    <span class="icon-arrow">
                                                        <a href="{{ route('single-course') }}"><i class="fa fa-arrow-right white-color"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-4 text-center">

                        <a href="{{ route('course-search') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">LOAD MORE</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- PRODUCT AREA END -->

        <!-- BLOG AREA START (blog-3) -->
        <div class="ltn__blog-area blogs-of-proud pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="proud-section-title col-12 d-none d-md-flex col-md-3 col-lg-3">
                        <h1>Proud to <br> Serve</h1>
                    </div>

                    <div
                        class=" col-12 align-self-center col-md-9 col-lg-9 row  ltn__blog-slider-proud-active slick-arrow-1 ltn__blog-item-3-normal">
                        <div class="col row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/adnoc.png.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/Sipchem.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/Yasref.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/img_11313_1584677661.png.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/img_41923_1584677669.png.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/adnoc.png.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/Sipchem.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/Yasref.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/img_11313_1584677661.png.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/img_41923_1584677669.png.png') }}" alt="" srcset="">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- BLOG AREA START (blog-3) -->
        <div class="ltn__blog-area blog-of-Testimonials pt-5 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center row">
                            <h1 class="section-title white-color--- col-12">Our Testimonials that we are proud of</h1>
                            <span class="px-5 col-12 col-md-8 offset-md-2 fnt-siz-sm ">Discover our clients' opinions
                                and their trust in BTS services, as we strive to provide innovative solutions that
                                precisely and efficiently meet their needs, making us a reliable partner in every step
                                of their success.</span>
                        </div>
                    </div>
                </div>
                <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                    <!-- Blog Item -->

                    <div class="col-lg-12 ">
                        <div class="ltn__blog-item ltn__blog-item-3 bg-light-blue">

                            <div class="ltn__blog-brief bg-light-blue">
                                <div class="ltn__blog-meta bg-light-blue"">
                                    <a href="{{ route('testimonials') }}">
                                        <ul class=" ltn__blog-tags d-flex align-items-start justify-content-between">
                                            <li class="ltn__blog-title ">
                                                <h1 class="fnt-siz-md"> Zayn Ahmed </h1>
                                            </li>
                                            <li class="ltn__blog-tags d-flex">
                                                <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                                <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                                <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                                <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                                <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                                <h3 class="ltn__blog-author fnt-siz-sm">Here will be the opinion Here will be the
                                    opinionHere will be the opinionHere will be the opinionHere will be the opinion</h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 ">
                        <div class="ltn__blog-item ltn__blog-item-3 bg-light-blue">

                            <div class="ltn__blog-brief bg-light-blue">
                                <div class="ltn__blog-meta bg-light-blue"">
                                    <a href="{{ route('testimonials') }}">
                                        <ul class=" ltn__blog-tags d-flex align-items-start justify-content-between">
                                    <li class="ltn__blog-title ">
                                        <h1 class="fnt-siz-md"> Zayn Ahmed </h1>
                                    </li>
                                    <li class="ltn__blog-tags d-flex">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                    </li>
                                    </ul>
                                </a>
                                </div>
                                <h3 class="ltn__blog-author fnt-siz-sm">Here will be the opinion Here will be the
                                    opinionHere will be the opinionHere will be the opinionHere will be the opinion</h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 ">
                        <div class="ltn__blog-item ltn__blog-item-3 bg-light-blue">

                            <div class="ltn__blog-brief bg-light-blue">
                                <div class="ltn__blog-meta bg-light-blue"">
                                    <a href="{{ route('testimonials') }}">
                                        <ul class=" ltn__blog-tags d-flex align-items-start justify-content-between">
                                    <li class="ltn__blog-title ">
                                        <h1 class="fnt-siz-md"> Zayn Ahmed </h1>
                                    </li>
                                    <li class="ltn__blog-tags d-flex">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                    </li>
                                    </ul>
                                </a>
                                </div>
                                <h3 class="ltn__blog-author fnt-siz-sm">Here will be the opinion Here will be the
                                    opinionHere will be the opinionHere will be the opinionHere will be the opinion</h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 ">
                        <div class="ltn__blog-item ltn__blog-item-3 bg-light-blue">

                            <div class="ltn__blog-brief bg-light-blue">
                                <div class="ltn__blog-meta bg-light-blue"">
                                    <a href="{{ route('testimonials') }}">
                                        <ul class=" ltn__blog-tags d-flex align-items-start justify-content-between">
                                    <li class="ltn__blog-title ">
                                        <h1 class="fnt-siz-md"> Zayn Ahmed </h1>
                                    </li>
                                    <li class="ltn__blog-tags d-flex">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                    </li>
                                    </ul>
                                </a>
                                </div>
                                <h3 class="ltn__blog-author fnt-siz-sm">Here will be the opinion Here will be the
                                    opinionHere will be the opinionHere will be the opinionHere will be the opinion</h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 ">
                        <div class="ltn__blog-item ltn__blog-item-3 bg-light-blue">

                            <div class="ltn__blog-brief bg-light-blue">
                                <div class="ltn__blog-meta bg-light-blue"">
                                    <a href="{{ route('testimonials') }}">
                                        <ul class=" ltn__blog-tags d-flex align-items-start justify-content-between">
                                    <li class="ltn__blog-title ">
                                        <h1 class="fnt-siz-md"> Zayn Ahmed </h1>
                                    </li>
                                    <li class="ltn__blog-tags d-flex">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                    </li>
                                    </ul>
                                </a>
                                </div>
                                <h3 class="ltn__blog-author fnt-siz-sm">Here will be the opinion Here will be the
                                    opinionHere will be the opinionHere will be the opinionHere will be the opinion</h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 ">
                        <div class="ltn__blog-item ltn__blog-item-3 bg-light-blue">

                            <div class="ltn__blog-brief bg-light-blue">
                                <div class="ltn__blog-meta bg-light-blue"">
                                    <a href="{{ route('testimonials') }}">
                                        <ul class=" ltn__blog-tags d-flex align-items-start justify-content-between">
                                    <li class="ltn__blog-title ">
                                        <h1 class="fnt-siz-md"> Zayn Ahmed </h1>
                                    </li>
                                    <li class="ltn__blog-tags d-flex">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                        <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15" height="15" alt="" srcset="">
                                    </li>
                                    </ul>
                                </a>
                                </div>
                                <h3 class="ltn__blog-author fnt-siz-sm">Here will be the opinion Here will be the
                                    opinionHere will be the opinionHere will be the opinionHere will be the opinion</h3>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- BLOG AREA END -->
        <!-- BLOG AREA START (blog-3) -->

        <div class="ltn__blog-area blog-of-Partners pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="proud-section-title col-12 d-none d-md-flex col-md-3 col-lg-3">
                        <h1>BTS <br>Partners </h1>
                    </div>

                    <div
                        class=" col-12 align-self-center col-md-9 col-lg-9 row  ltn__blog-slider-proud-active slick-arrow-1 ltn__blog-item-3-normal">
                        <div class="col row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/1 (2).png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/11.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/2 (2).png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/22.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/33.png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/Untitled (2).png') }}" alt="" srcset="">
                        </div>
                        <div class="col  row justify-content-center align-items-center">
                            <img src="{{ asset('front-assets/img/brand-logo/Untitled (3).png') }}" alt="" srcset="">
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- COUNTER UP AREA START -->
        <div class="container">

            <div class="ltn__counterup-area bg-image pt-115 pb-70" data-bg="{{ asset('front-assts/img/bg/Background03.png') }}">
                <div class="row justify-content-center text-center">
                    <h1 class="section-title white-color--- col-12 wh-txt-clr ">BTS Accreditations</h1>
                    <span class="col-12 col-md-8  fnt-siz-sm g-clr ">BTS Consultant is internationally accredited,
                        offering ISO-certified programs and recognized training solutions that meet global standards.
                        Their accreditations ensure top-quality services across various industries.</span>
                    <div class="col-12 text-center pt-3">

                        <a href="" class="theme-btn-1 btn btn-effect-1 text-uppercase">SEE MORE</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- COUNTER UP AREA END -->
        <!-- BLOG AREA END -->
        <!-- PRODUCT TAB AREA START (product-item-3) -->
        <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center">
                            <h1 class="section-title">Contact Us</h1>
                            <span class="col-12 col-md-8  fnt-siz-sm g-clr ">Contact us to meet all your inquiries and
                                needs, as our professional team is happy to provide immediate support and advice to
                                ensure you achieve your goals and facilitate your experience with us in the best
                                possible way.</span>

                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6" style="height: max-content;">
                                <form id="contact-form main-page-form" action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6 my-3">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="name" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" name="email" placeholder="Enter email address">
                                            </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="mobile" placeholder="Enter mobile number">
                                            </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="text" name="title" placeholder="Enter message title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon my-3">
                                        <textarea name="message" placeholder="Enter message"></textarea>
                                    </div>

                                    <p class="form-messege mb-0 mt-20"></p>

                                    <button href="" class="theme-btn-1 btn btn-effect-1 text-uppercase w-100">SEE
                                        MORE</button>
                                </form>
                            </div>
                            <div class="col-12 col-lg-6 mt-5 mt-lg-0" style="height: max-content;">

                                <div class="contact-us-main-page row flex-column p-3">
                                    <div class="">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2" src="{{ asset('front-assets/img/icons/hom.png') }}" alt="">
                                            UAE
                                        </div>
                                        <span>3012, Block 3, 30 Euro Business Park,<br> Little Island, Co. Cork, T45 V220</span>
                                    </div>
                                    <div class="pt-3">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2" src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Office
                                        </div>
                                        <span>+353214552955</span>
                                    </div>
                                    <div class="pt-3">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2" src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Mobile
                                        </div>
                                        <span>+353876480984</span>
                                    </div>
                                    <div class="pt-3">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2" src="{{ asset('front-assets/img/icons/mail.png') }}" alt="">E-mail
                                        </div>
                                        <span>Info@btsconsultant.com</span>
                                    </div>
                                    <div class="pt-3">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2" src="{{ asset('front-assets/img/icons/time.png') }}" alt="">Working
                                                    hours</div>
                                                <span>Sun to Fri 09:00 AM to 06:00 PM</span>
                                            </div>
                                            <div class="col-12 col-lg-6 text-end">
                                                <a href="{{ route('contact-us') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase"><img
                                                        src="{{ asset('front-assets/img/icons/loc.png') }}" alt="">Location</a>

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
        <!-- PRODUCT TAB AREA END -->
@endsection
