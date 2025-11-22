@extends('front-design-pages.front-layout.app')
<!-- Body main wrapper start -->

@section('page-id', 'single-course-page')
@section('page-content')
<style>
    .ltn__product-item.no-size {
    width: auto !important;
    height: auto !important;
}

    .courseCode {
        background-color: #F5F7FB;
        color: #000;
        display: inline-block;
        padding: 6px 10px;
        border-radius: 6px;
    }
.nice-select:after {
    display: none
}
.ltn__product-item {

    width:100%;
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
    animation: shine 1s ease-in-out;
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
.popular-courses .ltn__product-item:hover .course-badge h3 a {
    text-decoration: underline;
    text-decoration-color: white;
}

/* Ensure links remain white */
.popular-courses .course-badge h3 a {
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}
    </style>
    <!-- Utilize Mobile Menu End -->
    <div class="main-course-bg-header">
        <!-- <div class="share-icon">
                <i class="fas fa-share-alt-square"></i>
              </div> -->
        <div class="course-main-title text-center">
            <h2>Request For Inhouse Proposal</h2>
        </div>
    </div>
    <div class="container" style="margin-top: 70px;">
        @if ($message = Session::get('message'))
            <div id="alertDiv" class="alert alert-info alert-block">
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


                    <form action="{{url('/registerApplicants')}}" method="POST">
                        @csrf
                        <!-- Course Details -->
                        <h4 class="section-title f-s-15">Course Details</h4>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <input type="hidden" name="applicant_type_id" value=3 />
                                <input type="hidden" name="course_id" value="{{$course->id}}" />
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
                            <div class="col-md-6 mb-3">
                                <label>No. of Days</label>

                                <input type="number" name="inhouse_no_days" value="{{5}}" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>No. of Participants</label>

                                <input type="number" name="inhouse_no_particants" value="{{5}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3 px-3">
                                <label>Preferred Dates : </label>
                                <input type="text" name="inhouse_perefer_dates" value="{{ old('inhouse_perefer_dates') }}"  class="form-control" />
                            </div>
                            <hr>
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
                                    id="designation" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="company" class="form-label required">Company *</label>
                                <input type="text" class="form-control" id="company" name="company"
                                    value="{{ old('company') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label required">Phone *</label>
                                <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}"
                                    id="phone" required>
                            </div>
                              <div class="col-md-6 mb-3">
                                <label for="email" class="form-label required">Email *</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    id="email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="country" class="form-label required">Country</label>
                                <select name="country_id" class="form-select">
                                    <option value=""></option>
                                    @foreach ($countries as $country)
                                        <option value='{{ $country->id }}'
                                            @if (old('country_id') == "$country->id") {{ 'selected' }} @endif>
                                            {{ $country->country_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label required">City</label>
                                <select name="venue_id" class="form-select">
                                    <option value=""></option>
                                    @foreach ($venues as $venue)
                                        <option value='{{ $venue->id }}'
                                            @if (old('venue_id') == "$venue->id") {{ 'selected' }} @endif>
                                            {{ $venue->venue_en_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label required">Other Requirements</label>
                                <textarea class="form-control" name="inhouse_requirements" style="padding:0px 12px;min-height:200px;">{{Request::old('inhouse_requirements')}}</textarea>

                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-lg-12">
                                <label>Captcha*</label>
                                <div class="captcha d-flex align-items-center">
                                   <span id="captcha-img" style="display:inline-block; width:auto; height:auto;">
    {!! captcha_img('math') !!}
</span>

                                    <button type="button" class="btn btn-secondary btn-sm" id="refresh-captcha"
                                        style="margin-left: 10px; padding: 6px 10px;">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>

                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Enter Captcha*</label>
                                <input id="captcha" type="text" class="form-control" name="captcha">
                                @error('captcha')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
            <div class="col-12 col-lg-6">
{{--  <div class="event-details-left left-contents p-4 mb-5" style="background-color:#f9f9ff">
    <h5 class="mt-4 mb-2">{{ $branch->venue->venue_en_name }}</h5>
    <p>{{ $branch->address }}</p>
    <p>{{ $branch->email }}</p>
    <p>{{ $branch->venue->venue_en_name }} ,{{ $branch->country->country_en_name }}</p>
    <p><span style="color:#32a2a8">Tel :</span> {{ $branch->mobile }}</p>
    <p><span style="color:#32a2a8">Office Phone :</span>{{ $branch->office_phone }}</p>
</div>  --}}

                <h3 class="mb-4">Popular Courses</h3>
                <div class="row popular-courses">
                    @isset($rounds)
                        @foreach ( $rounds as $round )

                    <div class="col-12 col-sm-6">
                        <div class="ltn__product-item ltn__product-item-3 text-left no-size">
                            <div class="product-img shine" style='height: 100%;'>
                                <a class="img-container" href="{{ url('courseDetails/'.$round->course->id) }}"><img height="100%"
                                        src="{{ asset('uploads/courses')}}/{{ $round->course->course_image_thumbnail }}" alt="#"></a>
                                <div class="course-badge p-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class='white-color mb-2' style="font-size: 1.075rem !important;">
                                                <a href="{{ url('courseDetails/'.$round->course->id) }}" class="white-color">
                                                    {{ $round->course->course_en_name ?? ''}}
                                                </a>
                                            </h3>
                                        </div>

                                        <div class="col-12 row">
                                            <?php $date = date_create($round->round_start_date); ?>

                                            <div class="col-10 white-color bottom-title">
                                                {{ $round->venue->venue_en_name }} -
                                                {{ $round->country->country_en_name }} |
                                                {{ date_format($date, 'd M, Y') }}
                                            </div>
                                            <div class="col-2 mb-2">
                                                <span class="icon-arrow">
                                                    <a href="{{ url('courseDetails/'.$round->course->id) }}"><i class="fa fa-arrow-right white-color"></i></a>
                                                </span>
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
        });
    </script>
@endsection
