@extends('front-design-pages.front-layout.app')
<!-- Body main wrapper start -->

@section('page-id', 'single-course-page')
@section('page-content')
<style>
    .nice-select:after {
        display:none;
    }
    .ltn__product-item {
        height: 280px !important;
        width:100%;
    }

    .ltn__product-item-3 .course-badge {
        padding: 20px !important;
    }

    .ltn__product-item-3 .course-badge h3 {
        font-size: 1.075rem !important;
        margin-bottom: 15px !important;
        line-height: 1.4;
    }

    .courseCode {
        background-color: #F5F7FB;
        color: #000;
        display: inline-block;
        padding: 6px 10px;
        border-radius: 6px;
    }

    /* Image container styles */
    .ltn__product-item-3 .product-img {
        position: relative;
        overflow: hidden;
        border-radius: 6px;
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
        cursor: default;
        pointer-events: none;
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
        animation: shine 2s ease-in-out;
    }

    @keyframes shine {
        0% {
            left: -75%;
        }

        100% {
            left: 125%;
        }
    }

    /* White underline on course title when hovering card */
    .ltn__product-item:hover .course-badge h3 a {
        text-decoration: underline;
        text-decoration-color: white;
    }

    /* Popular courses links styling */
    .course-badge h3 a {
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    /* Limit dropdown height for Country and City selects */
    #personal_country + .nice-select .list,
    #personal_city + .nice-select .list {
        max-height: 200px;
        overflow-y: auto;
    }
</style>
    <!-- Utilize Mobile Menu End -->
    <div class="main-course-bg-header">
        <!-- <div class="share-icon">
                <i class="fas fa-share-alt-square"></i>
              </div> -->
        <div class="course-main-title text-center ">
            <h2>Course Registration</h2>
        </div>
    </div>
    <div class="container" style="margin-top: 70px;">
        @if ($message = Session::get('message'))
            <div id="alertDiv" class="alert alert-info alert-block">
                {{-- <button type="button" id="alertClose" class="close" data-dismiss="alert">×</button> --}}
                <strong style="color:black;font-weight:bold">{{ $message }}</strong>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="container form-container">
                    <h2 class="form-title f-s-20">Course Registration Form</h2>

                    <form action="{{ url('/registerApplicantRounds') }}" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" id="course_id" value="{{ $course->id  }}">
                        <!-- Course Details -->
                        <h4 class="section-title f-s-15">Course Details</h4>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <input type="hidden" name="applicant_type_id" value=0 />
                                <label for="courseCode" class="form-label">Code:</label>

                                <span class="courseCode">{{ $course->course_code ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 mb-3">
                                <label for="courseTitle" class="form-label">Title:</label>

                                <span class="courseCode">{{ $course->course_en_name ?? '' }}</span>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 mb-3">
                                <label for="dateVenue" class="form-label">Date & Venue:</label>
                                <select class="form-select" name="register_round_id">
                                    @isset($course_rounds)
                                        @foreach ($course_rounds as $course_round)
                                            <?php $date = date_create($course_round->round_start_date); ?>
                                            <option value="{{ $course_round->id }}"
                                                @if (old('register_round_id') == "$course_round->id") {{ 'selected' }} @endif>
                                                {{ date_format($date, 'd-m-Y') }} |
                                                {{ $course_round->country->country_en_name }}
                                                {{ $course_round->venue->venue_en_name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>

                        <!-- Personal Data -->
                        <h4 class="section-title f-s-15">Personal Data</h4>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="salutation" class="form-label required">Salutation</label>
                                <select name="salut_id" class="form-select">
                                    <option value=""></option>
                                    @foreach ($saluts as $salut)
                                        <option value='{{ $salut->id }}'
                                            @if (old('salut_id') == "$salut->id") {{ 'selected' }} @endif>
                                            {{ $salut->en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fullName" class="form-label required">Full Name *</label>
                                <input type="text" class="form-control" id="fullName" name="name"
                                    value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="designation" class="form-label required">Designation</label>
                                <input name="job_title" type="text" value="{{ old('job_title') }}" class="form-control"
                                    id="designation" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="company" class="form-label required">Company *</label>
                                <input type="text" class="form-control" id="company" name="company"
                                    value="{{ old('company') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                             <div class="col-md-6 mb-3">
                                <label for="email" class="form-label required">Email *</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    id="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label required">Phone *</label>
                                <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}"
                                    id="phone" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="country" class="form-label required">Country</label>
                                <select name="country_id" id="personal_country" class="form-select">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value='{{ $country->id }}'
                                            @if (old('country_id') == "$country->id") {{ 'selected' }} @endif>
                                            {{ $country->country_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label required">City</label>
                                <select name="venue_id" id="personal_city" class="form-select">
                                    <option value="">Select City</option>
                                    @foreach ($venues as $venue)
                                        <option value='{{ $venue->id }}'
                                            @if (old('venue_id') == "$venue->id") {{ 'selected' }} @endif>
                                            {{ $venue->venue_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">

                        </div>

                        <!-- Payment Details -->
                        <h4 class="section-title f-s-15">Payment Details</h4>
                        <div class="row mb-3">
                            <div class="col-md-12 mb-3">
                                <select class="form-select" id="paymentMethod" required>
                                    <option value="bank" selected>Bank Transfer</option>
                                </select>
                            </div>
                        </div>
                        <h4 class="section-title f-s-15">Billing Details</h4>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="salutation" class="form-label required">Salutation</label>
                                <select name="billing_salut_id" class="form-select">
                                    <option value=""></option>
                                    @foreach ($saluts as $salut)
                                        <option value='{{ $salut->id }}'
                                            @if (old('billing_salut_id') == "$salut->id") {{ 'selected' }} @endif>
                                            {{ $salut->en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fullName" class="form-label required">Full Name *</label>
                                <input type="text" class="form-control" name="billing_name"
                                    value="{{ old('billing_name') }}" id="fullName" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="designation" class="form-label ">Designation</label>
                                <input type="text" name="billing_job_title" value="{{ old('billing_job_title') }}"
                                    class="form-control" id="designation" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="company" class="form-label required">Company *</label>
                                <input type="text" name="billing_company" value="{{ old('billing_company') }}"
                                    class="form-control" id="company" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label required">Phone *</label>
                                <input type="tel" name="billing_phone" value="{{ old('billing_phone') }}"
                                    class="form-control" id="phone" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="country" class="form-label required">Country</label>
                                <select name="billing_country_id" id="billing_country" class="form-select">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value='{{ $country->id }}'
                                            @if (old('billing_country_id') == "$country->id") {{ 'selected' }} @endif>
                                            {{ $country->country_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label required">City</label>
                                <select name="billing_venue_id" id="billing_city" class="form-select">
                                    <option value="">Select City</option>
                                    @foreach ($venues as $venue)
                                        <option value='{{ $venue->id }}'
                                            @if (old('billing_venue_id') == "$venue->id") {{ 'selected' }} @endif>
                                            {{ $venue->venue_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label required">Email *</label>
                                <input type="email" name="billing_email" value="{{ old('billing_email') }}"
                                    class="form-control" id="email" required>
                            </div>
                        </div>

                        <div class="form-check mt-4">
                            <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">I accept the <a href="{{ route('terms-conditions') }}" target="_blank" style="color: #007bff; text-decoration: underline;">Terms &amp; Conditions</a>*</label>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-lg-4 col-md-6">
                                <label>Captcha*</label>
                                <div class="captcha d-flex align-items-center gap-2">
                                                                 <span id="captcha-img" style="display:inline-block; width:auto; height:auto;">
    {!! captcha_img('math') !!}
</span>
                                    <button type="button" class="btn btn-secondary btn-sm" id="refresh-captcha"
                                        style="margin-left: 10px; padding: 6px 10px;">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>

                                <div class="mt-3">
                                    <label>Enter Captcha*</label>
                                    <input id="captcha" type="text" class="form-control" name="captcha">
                                    @error('captcha')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" style="border-radius: 6px;">Submit
                                </button>

                            </div>
                        </div>
                    </form>
                </div>



            </div>
            <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                <h3 class="mb-4">Popular Courses</h3>
                <div class="row popular-courses">
                    @isset($rounds)
                        @foreach ( $rounds as $round )

                    <div class="col-12 col-sm-6">
                        <div class="ltn__product-item ltn__product-item-3 text-left w-100">
                            <div class="product-img shine">
                                <a class="img-container">
                                    <img src="{{ asset('uploads/courses')}}/{{ $round->course->course_image_thumbnail }}" alt="{{ $round->course->course_en_name }}">
                                </a>

                                <div class="course-badge">
                                    <h3 class='white-color mb-2'>
                                        <a href="{{ url('courseDetails/'.$round->course->id) }}">
                                            {{ Str::limit($round->course->course_en_name, 70, '') }}
                                        </a>
                                    </h3>
                                    <?php $date = date_create($round->round_start_date); ?>
                                    <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 15px">
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
        </div>


    </div>
@endsection
@section('script')
    <script>
        document.getElementById('refresh-captcha').addEventListener('click', function() {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('captcha-img').innerHTML = data.captcha;
                });
        });
        $(document).on('click', '#alertCloseDetails', function() {
            $('#alertDivDetails').fadeOut();
        });
        $(document).ready(function() {
            // تأكد من تفعيل المكتبة الخاصة بالـ nice-select
            $('select').niceSelect();

            // التحقق من التغيير في الـ nice-select
            $(".nice-select").on("change", function() {
                var selectedValue = $(this).find('input').val();
                $('select[name="country_id"]').val(selectedValue);
            });

            // Cascading select for Personal Data section
            $('#personal_country').on('change', function() {
                var countryId = $(this).val();
                var citySelect = $('#personal_city');

                if (countryId) {
                    $.ajax({
                        url: '/get-venues-by-country/' + countryId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            citySelect.empty();
                            citySelect.append('<option value="">Select City</option>');
                            $.each(data, function(key, venue) {
                                citySelect.append('<option value="' + venue.id + '">' + venue.venue_en_name + '</option>');
                            });
                            // Update nice-select if it's initialized
                            if (citySelect.next('.nice-select').length) {
                                citySelect.niceSelect('update');
                            }
                        },
                        error: function() {
                            console.log('Error loading cities');
                        }
                    });
                } else {
                    citySelect.empty();
                    citySelect.append('<option value="">Select City</option>');
                    if (citySelect.next('.nice-select').length) {
                        citySelect.niceSelect('update');
                    }
                }
            });

            // Cascading select for Billing Details section
            $('#billing_country').on('change', function() {
                var countryId = $(this).val();
                var citySelect = $('#billing_city');

                if (countryId) {
                    $.ajax({
                        url: '/get-venues-by-country/' + countryId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            citySelect.empty();
                            citySelect.append('<option value="">Select City</option>');
                            $.each(data, function(key, venue) {
                                citySelect.append('<option value="' + venue.id + '">' + venue.venue_en_name + '</option>');
                            });
                            // Update nice-select if it's initialized
                            if (citySelect.next('.nice-select').length) {
                                citySelect.niceSelect('update');
                            }
                        },
                        error: function() {
                            console.log('Error loading cities');
                        }
                    });
                } else {
                    citySelect.empty();
                    citySelect.append('<option value="">Select City</option>');
                    if (citySelect.next('.nice-select').length) {
                        citySelect.niceSelect('update');
                    }
                }
            });
        });
    </script>
@endsection
