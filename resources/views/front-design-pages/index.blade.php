@extends('front-design-pages.front-layout.app')
<!-- Body main wrapper start -->

@section('page-content')

<div class="ltn__utilize-overlay"></div>


<style>
    #slider-3-section .slick-track {
        height: 100vh !important;
    }

    /* Social Media Icons Hover Effects */
    .social-side-links .face a,
    .social-side-links .linkedin a,
    .social-side-links .xtw a,
    .social-side-links .insta a {
        transition: all 0.3s ease;
        display: inline-block;
        color: #e7eaee;
        /* Default color for all icons */
    }

    .social-side-links .face .fa-facebook-f:hover {
        color: #1877f2 !important;
        /* Facebook blue */
        transform: translateY(-3px);
    }

    .social-side-links .linkedin .fa-linkedin-in:hover {
        color: #0077b5 !important;
        /* LinkedIn blue */
        transform: translateY(-3px);
    }

    .social-side-links .xtw svg path {
        fill: #e7eaee;
        /* Default color */
        transition: fill 0.3s ease;
    }

    .social-side-links .xtw:hover svg path {
        fill: #1da1f2 !important;
        /* Twitter blue */
    }

    .social-side-links .xtw:hover {
        transform: translateY(-3px);
    }

    .social-side-links .insta .fa-instagram:hover {
        color: #e4405f !important;
        /* Instagram pink */
        transform: translateY(-3px);
    }

    /* Service Cards Hover Effects */
    .card-item-services {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        min-height: 300px;
        background-size: cover;
        background-position: center;
    }

    .card-item-services::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .card-item-services:hover::before {
        background: rgba(0, 0, 0, 0.4);
    }

    .card-item-services:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .card-service-bottom-footer {
        position: relative;
        z-index: 1;
        padding: 20px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-service-bottom-footer h3 {
        transition: all 0.3s ease;
        text-align: center;
    }

    .card-item-services:hover .card-service-bottom-footer h3 {
        transform: scale(1.05);
    }



    /* Add a smooth transition for the text */
    .training-footer-item h6 {
        transition: all 0.3s ease;
        position: relative;
        z-index: 2;
    }

    .training-footer-item:hover h6 {
        transform: translateY(-5px);
        color: #007bff;
        /* You can change this color to match your theme */
    }

    /* Ensure the image container doesn't overflow */
    .training-footer-item-box {
        overflow: hidden;
        border-radius: 8px;
    }

    /* About Us Images Shine Effect */
    .about-us-info-wrap img,
    .about-us-img-wrap img {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .about-us-info-wrap img::before,
    .about-us-img-wrap img::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        background: linear-gradient(to right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.3) 50%,
                rgba(255, 255, 255, 0) 100%);
        transform: skewX(-25deg);
        transition: all 0.5s ease;
    }

    .about-us-info-wrap img:hover::before,
    .about-us-img-wrap img:hover::before {
        left: 100%;
    }

    .about-us-info-wrap img:hover,
    .about-us-img-wrap img:hover {
        transform: scale(1.02);
    }

    /* Testimonial Hover Effects */
    .ltn__blog-item-3 {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .ltn__blog-item-3:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    .ltn__blog-item-3::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(0, 123, 255, 0.1), rgba(0, 123, 255, 0.05));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .ltn__blog-item-3:hover::before {
        opacity: 1;
    }

    .ltn__blog-title h1 {
        transition: color 0.3s ease;
    }

    .ltn__blog-item-3:hover .ltn__blog-title h1 {
        color: #007bff;
    }

    .ltn__blog-author {
        transition: transform 0.3s ease;
    }

    .ltn__blog-item-3:hover .ltn__blog-author {
        transform: translateX(5px);
    }

    .ltn__blog-tags img {
        transition: transform 0.3s ease;
    }

    .ltn__blog-item-3:hover .ltn__blog-tags img {
        transform: scale(1.2);
    }

    /* Search Button Hover Effect */
    .form-btn {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        z-index: 1;
    }

    .form-btn:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg,
            rgba(255,255,255,0) 0%,
            rgba(255,255,255,0.2) 50%,
            rgba(255,255,255,0) 100%);
        transition: all 0.5s ease;
        z-index: -1;
    }

    .form-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .form-btn:hover:before {
        left: 100%;
    }

    /* Slider Social Side Links Styling */
    .slider-social-side-links {
        position: absolute;
        right:0;
        top: 50%;
        transform: translateY(-50%);
        z-index: 999;
        background: rgba(0, 0, 0, 0.7);
        padding: 15px 10px;
        border-radius: 30px 0 0 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(5px);
    }

    .slider-social-side-links .row {
        margin: 0;
    }

    .slider-social-side-links .face,
    .slider-social-side-links .linkedin,
    .slider-social-side-links .xtw,
    .slider-social-side-links .insta {
        margin: 10px 0;
        transition: all 0.3s ease;
    }

    .slider-social-side-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
        color:#fff
    }

    .slider-social-side-links i,
    .slider-social-side-links svg {
        font-size: 18px;
        transition: all 0.3s ease;
    }

    /* Facebook Hover Effect */
    .slider-social-side-links .face a:hover {
        background: #1877f2;
        transform: translateY(-3px);
    }

    .slider-social-side-links .face a:hover i {
        color: white;
    }

    /* LinkedIn Hover Effect */
    .slider-social-side-links .linkedin a:hover {
        background: #0077b5;
        transform: translateY(-3px);
    }

    .slider-social-side-links .linkedin a:hover i {
        color: white;
    }

    /* Twitter Hover Effect */
    .slider-social-side-links .xtw a:hover {
        background: #1da1f2;
        transform: translateY(-3px);
    }

    .slider-social-side-links .xtw a:hover svg path {
        fill: white;
    }

    /* Instagram Hover Effect */
    .slider-social-side-links .insta a:hover {
        background: #e4405f;
        transform: translateY(-3px);
    }

    .slider-social-side-links .insta a:hover i {
        color: white;
    }

    /* Tooltip Effect */
    .slider-social-side-links a::before {
        content: attr(data-tooltip);
        position: absolute;
        right: 100%;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        margin-right: 10px;
    }

    .slider-social-side-links a:hover::before {
        opacity: 1;
        visibility: visible;
    }

    /* Footer Social Links Styling */
    .footer-social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .footer-social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .footer-social-links i,
    .footer-social-links svg {
        font-size: 16px;
        color: #fff;
        transition: all 0.3s ease;
    }

    .footer-social-links a:hover {
        transform: translateY(-3px);
    }

    .footer-social-links .face a:hover {
        background: #1877f2;
    }

    .footer-social-links .linkedin a:hover {
        background: #0077b5;
    }

    .footer-social-links .xtw a:hover {
        background: #1da1f2;
    }

    .footer-social-links .insta a:hover {
        background: #e4405f;
    }
</style>
<div class="ltn__slider-area ltn__slider-3 section-bg-1" id="slider-3-section">
    <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1" style="height: 120vh !important;">
        <!-- ltn__slide-item -->
        @isset($banners)
        @foreach ($banners as $banner)
        <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3 ltn__slide-item-3-normal"
            style="background-image: url('{{ asset('uploads/sliders/' . $banner->image) }}'); background-size: cover; background-position: center 10%; height: 120vh !important;"
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
                                        <a href="{{ route('contact-us') }}"
                                            class="theme-btn-3 btn btn-effect-1 text-uppercase mt-1">Contact Us</a>
                                        <a href="{{ route('download-center') }}"
                                            class="theme-btn-1 btn btn-effect-1 text-uppercase mt-1">Download
                                            Center</a>
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
    <div class="slider-social-side-links">
        <div class="row flex-column">
            <div class="face">
                <a href="{{ $staticContact->details2 ?? '#' }}" data-tooltip="Follow us on Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
            <div class="linkedin">
                <a href="{{ $staticContact->details3 ?? '#' }}" data-tooltip="Connect on LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <div class="xtw">
                <a href="{{ $staticContact->details4 ?? '#' }}" data-tooltip="Follow us on Twitter">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width:16px;height:16px">
                        <path fill="#e7eaee" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
                    </svg>
                </a>
            </div>
            <div class="insta">
                <a href="{{ $staticContact->details5 ?? '#' }}" data-tooltip="Follow us on Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
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
                    <form action="{{ route('searchCourse.index') }}" method="GET" id="search-form">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="mc-field-group">
                                    <input type="text" placeholder="Course Name" value="" name="course_name">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-0">
                                <div class="">
                                    <select id="categorySelect" name="category_id">
                                        <!-- هذا الخيار لا يجب أن يكون فاضيًا أبداً -->
                                        <option value="" disabled selected>Select a Category</option>

                                        @isset($subCategories)
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->subcategory_en_name }}</option>
                                            @endforeach
                                        @endisset
                                    </select>

                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-0">
                                <div class="mc-field-group">
                                    <select id="venueSelect" name="city_id" placeholder="Select a Venue...">
                                        <option value="">Select a Venue</option>
                                        @isset($venues)
                                        @foreach ($venues as $venue)
                                        <option value="{{ $venue->id }}">{{ $venue->venue_en_name }}</option>
                                        @endforeach
                                        @endisset
                                    </select>


                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-md-3 mt-xl-0">
                                <div class="mc-field-group">
                                    <input type="hidden" placeholder="Duration" value="" name="duration">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-3">
                                <div class="mc-field-group d-flex align-items-center">
                                    <span>From:</span>
                                    <input type="date" placeholder="Course From" value="" name="start">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-3">
                                <div class="mc-field-group d-flex align-items-center">
                                    <span>To:</span>

                                    <input type="date" placeholder="Course Name" value="" name="end">
                                </div>
                            </div>
                            {{-- Tailor your course --}}
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-3">
                                <a href="{{ route('course-no-result') }}"
                                    class="form-btn-transparent w-100 text-center">Tailor your course</a>
                            </div>

                            {{-- Search button --}}
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2 mt-lg-3">
                                <a href="javascript:void(0);" onclick="document.getElementById('search-form').submit();"
                                    class="form-btn w-100 text-center">Search</a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- FEATURE AREA END -->
<!-- CATEGORY AREA START -->
<div class="ltn__category-area section-bg-1-- ltn__primary-bg before-bg-1 bg-image bg-overlay-theme-black-5--0 pt-115 pb-90"
    data-bg="{{ asset('front-assets/img/bg/Background\ \(2\).png') }}"
    style="background-image: url('{{ asset('front-assets/img/bg/Background (2).png') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title white-color">Services</h1>
                    <span class="g-clr  text-center">Your Growth, Our Mission</span>
                </div>
            </div>


        </div>
<style>

</style>
        <div class="row ">
            @isset($public_training)
            <div class="col-12 col-md-6 col-lg-3 p-2">

                    <div class="card-item-services service-item-4"
                        style="background-image: url('{{ asset($public_training->details2) }}');">
                        <div class="card-service-bottom-footer">
                            <div class="row main-footer-of-services" style='position: absolute;bottom: 0;'>
                                <div class="col-12">
                                    <h3 class="white-color mb-3">{{ $public_training->small_description }}</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('service') }}#public_training"
                                                class="theme-btn-1 btn btn-effect-1 text-uppercase v-d-of-services">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <
            </div>
            @endisset
            @isset($in_house_training)
            <div class="col-12 col-md-6 col-lg-3  p-2">

                    <div class="card-item-services service-item-2"
                        style="background-image: url('{{ asset($in_house_training->details2) }}');">
                        <div class="card-service-bottom-footer">

                            <div class="row main-footer-of-services" style='position: absolute;bottom: 0;'>
                                <div class="col-12">
                                    <h3 class="white-color mb-3">{{ $public_training->small_description }}</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('service') }}#in_house_training"
                                                class="theme-btn-1 btn btn-effect-1 text-uppercase v-d-of-services">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

            </div>
            @endisset

            @isset($consultancy)
            <div class="col-12 col-md-6 col-lg-3  p-2">

                    <div class="card-item-services service-item-1"
                        style="background-image: url('{{ asset($consultancy->details2) }}');">
                        <div class="card-service-bottom-footer">
                            <div class="row main-footer-of-services" style='position: absolute;bottom: 0;'>
                                <div class="col-12">
                                    <h3 class="white-color mb-3">{{ $public_training->small_description }}</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('service') }}#consultancy"
                                                class="theme-btn-1 btn btn-effect-1 text-uppercase v-d-of-services">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            @endisset
            @isset($online_courses)
            <div class="col-12 col-md-6 col-lg-3 p-2">

                    <div class="card-item-services service-item-3"
                        style="background-image: url({{ asset($online_courses->details2) }});">
                        <div class="card-service-bottom-footer">
                            <div class="row main-footer-of-services" style='position: absolute;bottom: 0;'>
                                <div class="col-12">
                                    <h3 class="white-color mb-3">{{ $public_training->small_description }}</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('service') }}#online_courses"
                                                class="theme-btn-1 btn btn-effect-1 text-uppercase v-d-of-services">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            @endisset


        </div>
    </div>
</div>
<!-- CATEGORY AREA END -->
<!-- ABOUT US AREA START -->
@isset($methodologies)
<div class="ltn__about-us-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="row">
                        <div class="col-12 section-title-area ltn__section-title-2">

                            <h1 class="section-title">{{ $methodologies->small_description }}
                            </h1>
                            <p class="f-siz-larger">{!! $methodologies->details !!}</p>
                        </div>

                        <div class="col-12 row">

                            <div class="col-6 align-self-center">
                                <img src="{{ asset($methodologies->details2) }}" alt="#">
                            </div>
                            <div class="col-6   align-self-center">
                                <img src="{{ asset($methodologies->details3) }}" alt="#">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0 align-self-center row justify-content-end">
                <div class="about-us-img-wrap row about-img-left">
                    <img src="{{ asset($methodologies->details4) }}" alt="About Us Image">
                </div>
            </div>

        </div>
    </div>
</div>
@endisset
@isset($methodologies)
<div class="container section-of-introduction">
    <div class="row">
        <div class="col-12 row justify-content-end training-footer mt-5">
            <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                <!-- Blog Item -->
                <div class="col-12 col-md-6 col-lg-3 ">
                    <div class="training-footer-item p-3 py-5">
                        <div class="training-footer-item-box d-flex flex-column align-items-center">
                            <span><img src="{{ asset($methodologies->details6) }}" alt="" srcset=""></span>
                            <h6 class='mt-3'>{{ $methodologies->details5 }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 ">
                    <div class="training-footer-item p-3 py-5">
                        <div class="training-footer-item-box d-flex flex-column align-items-center">
                            <span><img src="{{ asset($methodologies->details8) }}" alt="" srcset=""></span>
                            <h6 class='mt-3'>{{ $methodologies->details7 }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 ">
                    <div class="training-footer-item p-3 py-5">

                        <div class="training-footer-item-box d-flex flex-column align-items-center">
                            <span><img src="{{ asset($methodologies->details10) }}" alt="" srcset=""></span>
                            <h6 class='mt-3'>{{ $methodologies->details9 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3  ">
                    <div class="training-footer-item p-3 py-5">

                        <div class="training-footer-item-box d-flex flex-column align-items-center">
                            <span><img src="{{ asset($methodologies->details12) }}" alt="" srcset=""></span>
                            <h6 class='mt-3'>{{ $methodologies->details11 }}</h3>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endisset
<!-- ABOUT US AREA END -->
<style>
    /* Image container styles */
    .ltn__product-item-3 .product-img {
        position: relative;
        overflow: hidden;
        border-radius: 6px;
        /* height: 12rem; */
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ltn__product-item-3 .product-img .img-container {
        display: block;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .ltn__product-item-3 .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    /* Shine hover effect */
    .ltn__product-item-3 .product-img.shine {
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .ltn__product-item-3 .product-img.shine::before {
        background: linear-gradient(to right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.5) 50%,
                rgba(255, 255, 255, 0) 100%);
        content: "";
        display: block;
        height: 100%;
        left: -75%;
        position: absolute;
        top: 0;
        transform: skewX(-25deg);
        width: 50%;
        z-index: 2;
    }

    .ltn__product-item-3 .product-img.shine:hover::before,
    .ltn__product-item-3 .product-img.shine:focus::before {
        animation: shine 4s ease-in-out;
    }

    @keyframes shine {
        0% {
            left: -75%;
        }
        100% {
            left: 125%;
        }
    }
</style>
<!-- PRODUCT AREA START (product-item-3) -->
<div class="ltn__product-area blogs-top-ranked ltn__product-gutter pt-5 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title">Top Ranked Courses</h1>
                    <h6>Your Growth, Our Mission</h6>
                </div>
            </div>
        </div>
        <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
            <div class="row">
                @isset($rounds)
                @foreach ($rounds as $round)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-3 text-left w-100">
                        <div class="product-img shine">
                            <a class="img-container">
                                <img src="{{ asset('uploads/courses') }}/{{ $round->course->course_image_thumbnail }}"
                                    alt="{{ $round->country->country_en_name }}">
                            </a>

                            <div class="course-badge">
                                <h3 class='white-color mb-2'>
                                    <a class="img-container">
                                    {{ Str::limit($round->course->course_en_name, 70, '') }}
                                    </a>
                                </h3>
                                <?php $date = date_create($round->round_start_date); ?>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="white-color bottom-title">
                                        {{ $round->venue->venue_en_name }} -
                                        {{ $round->country->country_en_name }} |
                                        {{ date_format($date, 'd M, Y') }}
                                    </div>
                                    <div class="icon-arrow">
                                        <a href="{{ url('courseDetails/'.$round->course->id) }}"><i class="fa fa-arrow-right white-color"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
                @endisset

            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 text-center">

                <a href="{{ route('searchCourse.index') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">All Courses</a>
            </div>
        </div>

    </div>
</div>
<!-- PRODUCT AREA END -->

<!-- BLOG AREA START (blog-3) -->
<div class="ltn__blog-area blogs-of-proud pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="proud-section-title col-12 d-none d-md-flex col-md-3 col-lg-3 text-center">
                <h1>PROUD<br>TO SERVE</h1>
            </div>

            <div
                class=" col-12 align-self-center col-md-9 col-lg-9 row  ltn__blog-slider-proud-active slick-arrow-1 ltn__blog-item-3-normal">
                @isset($clients)
                @foreach ($clients as $client)
                <div class="col row justify-content-center align-items-center mx-2">
                    <img src="{{ asset('uploads/clients') }}/{{ $client->client_logo_url }}" alt="" srcset="">
                </div>
                @endforeach
                @endisset
            </div>

        </div>
    </div>
</div>

<!-- BLOG AREA START (blog-3) -->
<div class="ltn__blog-area blog-of-Testimonials pt-5 pb-50">
    <div class="container">
        <div class="row">
            @isset($homeTestimonials)
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center row">
                    <h1 class="section-title white-color--- col-12">{{ $homeTestimonials->small_description }}</h1>
                    <span class="px-5 col-12 col-md-8 offset-md-2 fnt-siz-sm ">{{ $homeTestimonials->details }}</span>
                </div>
            </div>
            @endisset

        </div>
        <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
            <!-- Blog Item -->
            @isset($testimonials)
            @foreach ($testimonials as $testimonial)
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3 bg-light-blue">
                    <div class="ltn__blog-brief bg-light-blue">
                        <div class="ltn__blog-meta bg-light-blue">
                            <a href="{{ route('testimonials') }}" class="text-decoration-none">
                                <ul class="ltn__blog-tags d-flex align-items-start justify-content-between">
                                    <li class="ltn__blog-title">
                                        <h1 class="fnt-siz-md">{{ $testimonial->reviewer_name }}</h1>
                                    </li>
                                    <li class="ltn__blog-tags d-flex">
                                        {{-- Filled stars --}}
                                        @for ($i = 0; $i < $testimonial->reviewer_star_rate; $i++)
                                            <img src="{{ asset('front-assets/img/icons/star.png') }}" width="15"
                                                height="15" alt="star">
                                            @endfor
                                    </li>
                                </ul>
                            </a>
                        </div>
                        <h3 class="ltn__blog-author fnt-siz-sm">
                            {{ $testimonial->reviewer_text }}
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
            @endisset
        </div>
    </div>
</div>
<!-- BLOG AREA END -->
<!-- BLOG AREA START (blog-3) -->

<div class="ltn__blog-area blog-of-Partners pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="proud-section-title col-12 d-none d-md-flex col-md-3 col-lg-3 text-center">
                <h1>BTS <br>PARTNERS</h1>
            </div>

            <div
                class=" col-12 align-self-center col-md-9 col-lg-9 row  ltn__blog-slider-proud-active slick-arrow-1 ltn__blog-item-3-normal">
                @isset($partners)
                @foreach ($partners as $partner)
                <div class="col row justify-content-center align-items-center mx-2">
                    <img src="{{ asset('uploads/partners') }}/{{ $partner->partner_logo_url }}" alt="" srcset="">
                </div>
                @endforeach
                @endisset
            </div>
        </div>
    </div>
</div>

<!-- COUNTER UP AREA START -->
<div class="container">
    @isset($homeAccreditation)
    <style>
        /* Shining Hover Effect for Accreditation Section */

        /* Base styling for the button */
        .theme-btn-1.btn-effect-1 {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        /* The shining effect */
        .theme-btn-1.btn-effect-1:before {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20%;
            height: 200%;
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(30deg);
            transition: all 0.65s ease;
        }

        /* Animation on hover */
        .theme-btn-1.btn-effect-1:hover:before {
            left: 120%;
            transition: all 0.65s ease;
        }

        /* Optional: Add some extra styling when hovering */
        .theme-btn-1.btn-effect-1:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        /* Apply shining effect to the entire section */
        .ltn__counterup-area {
            position: relative;
            overflow: hidden;
        }

        /* The shining effect for the entire section */
        .ltn__counterup-area:before {
            content: '';
            position: absolute;
            top: -100%;
            left: -100%;
            width: 50%;
            height: 300%;
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.3) 50%,
                    rgba(255, 255, 255, 0) 100%);
            transform: rotate(30deg);
            animation: shine 6s infinite;
            pointer-events: none;
        }

        /* Keyframes for the shine animation */
        @keyframes shine {
            0% {
                left: -100%;
            }

            20% {
                left: 100%;
            }

            100% {
                left: 100%;
            }
        }

        /* Extra styling for enhancing section appearance on hover */
        .ltn__counterup-area:hover .wh-txt-clr {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }

        .ltn__counterup-area:hover .g-clr {
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }
    </style>
    <div class="ltn__counterup-area bg-image pt-115 pb-70" data-bg="{{ asset('front-assets/img/bg/servics-bg.png') }}">
        <div class="row justify-content-center text-center">
            <h1 class="section-title white-color--- col-12 wh-txt-clr ">{{ $homeAccreditation->small_description }}
            </h1>
            <span class="col-12 col-md-8  fnt-siz-sm g-clr ">{!! $homeAccreditation->details !!}</span>
            <div class="col-12 text-center pt-3">

                <a href="{{ url('/accreditations') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">{{ $homeAccreditation->details2 }}</a>
            </div>
        </div>

    </div>
    @endisset

</div>

<!-- COUNTER UP AREA END -->
<!-- BLOG AREA END -->
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = new TomSelect('#categorySelect', {
        create: false,
        allowEmptyOption: false,
        placeholder: "Select a Category",

        onInitialize: function () {
            this.control_input.setAttribute('readonly', true);
            this.control_input.style.caretColor = 'transparent';
        },

        onFocus: function () {
            this.control_input.removeAttribute('readonly');
            this.control_input.style.caretColor = '';
        },

        onBlur: function () {
            this.control_input.setAttribute('readonly', true);
            this.control_input.style.caretColor = 'transparent';
        },

        onItemAdd: function () {
            this.control_input.setAttribute('readonly', true);
            this.control_input.style.caretColor = 'transparent';
        }
    });



        // Category
//         var categorySelect = document.getElementById('categorySelect');
// if (categorySelect && !categorySelect.tomselect) {
//     new TomSelect(categorySelect, {
//         create: false,
//         placeholder: "Select a Category",
//         allowEmptyOption: false,
//         sortField: { field: "text", direction: "asc" },
//     });
// }

        // Venue
        var venueSelect = document.getElementById('venueSelect');
        if (venueSelect && !venueSelect.tomselect) {
            new TomSelect(venueSelect, {
                create: false,
                placeholder: "Select a Venue",
                allowEmptyOption: false,
                sortField: { field: "text", direction: "asc" }
            });
        }
    });
</script>

@endsection
