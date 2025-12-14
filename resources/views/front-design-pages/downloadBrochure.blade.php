@extends('front-design-pages.front-layout.app')
<!-- Body main wrapper start -->

@section('page-id', 'single-course-page')
@section('page-content')
    <style>
        .input-hidden .ts-control>input {
            position: relative !important;
        }

        .full .ts-control {
            background-color: #efefef !important;
        }

        /* Breadcrumb Navigation Styles - Inside Header (match single course) */
        .breadcrumb-navigation {
            background: transparent;
            padding: 15px 0;
            margin-bottom: 0;
            margin-top: 20px;
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            z-index: 100;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center;
        }

        .breadcrumb-nav-desktop {
            display: block;
        }

        .breadcrumb-nav-mobile {
            display: none;
        }

        .breadcrumb-mobile-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            color: #fff;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: background 0.2s ease, border-color 0.2s ease;
        }

        .breadcrumb-mobile-home:hover {
            background: rgba(255, 255, 255, 0.14);
            border-color: rgba(255, 255, 255, 0.4);
            color: #fff;
        }

        .breadcrumb-mobile-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
            text-align: left;
        }

        .breadcrumb-mobile-category {
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            line-height: 1.2;
            text-decoration: none;
        }

        .breadcrumb-mobile-category:hover {
            color: #f5f5f5;
        }

        .breadcrumb-mobile-course {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.2;
            text-decoration: none;
        }

        .breadcrumb-mobile-course:hover {
            color: #fff;
        }

        .breadcrumb-item {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        .breadcrumb-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
            padding: 5px 8px;
            border-radius: 4px;
        }

        .breadcrumb-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.1);
            text-decoration: none;
        }

        .breadcrumb-link i {
            font-size: 12px;
        }

        .breadcrumb-item.active {
            color: #ffffff;
            font-weight: 500;
        }

        .breadcrumb-item.active::after {
            display: none;
        }

        @media (max-width: 768px) {
            .breadcrumb {
                font-size: 12px;
                justify-content: flex-start;
                padding: 0 15px;
            }

            .breadcrumb-link {
                padding: 3px 6px;
            }
        }

        @media (max-width: 480px) {
            .breadcrumb {
                font-size: 11px;
                flex-wrap: wrap;
            }

            .breadcrumb-item {
                margin-bottom: 5px;
            }
        }

        @media (max-width: 768px) {
            .breadcrumb-navigation {
                padding: 12px 0 5px;
            }

            .breadcrumb-nav-desktop {
                display: none;
            }

            .breadcrumb-nav-mobile {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
            }

            .breadcrumb-mobile-text {
                align-items: flex-start;
            }
        }
    </style>
    <!-- Utilize Mobile Menu End -->
    <div class="main-course-bg-header">
        <!-- <div class="share-icon">
            <i class="fas fa-share-alt-square"></i>
          </div> -->
        <div class="course-main-title text-center">
            <h2>Download Brochure</h2>
            <div class="breadcrumb-navigation">
                <div class="container">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav-desktop">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="breadcrumb-link">
                                    <i class="fas fa-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            @if($course->subCategory && $course->subCategory->courseCategory)
                            <li class="breadcrumb-item">
                                <i class="fas fa-chevron-right breadcrumb-arrow"></i>
                                <a href="{{ route('category.show', ['id' => $course->subCategory->courseCategory->id]) }}"
                                    class="breadcrumb-link">
                                    {{ $course->subCategory->courseCategory->category_en_name }}
                                </a>
                            </li>
                            @endif
                            @if($course->subCategory)
                            <li class="breadcrumb-item">
                                <i class="fas fa-chevron-right breadcrumb-arrow"></i>
                                <a href="{{ route('course-search', ['subcategory_id' => $course->subCategory->id]) }}"
                                    class="breadcrumb-link">
                                    {{ $course->subCategory->subcategory_en_name }}
                                </a>
                            </li>
                            @endif
                        </ol>
                    </nav>
                    <nav aria-label="breadcrumb mobile" class="breadcrumb-nav-mobile">
                        <a href="{{ url('/') }}" class="breadcrumb-mobile-home" aria-label="Home">
                            <i class="fas fa-home"></i>
                        </a>
                        <div class="breadcrumb-mobile-text">
                            @if($course->subCategory && $course->subCategory->courseCategory)
                                <a href="{{ route('category.show', ['id' => $course->subCategory->courseCategory->id]) }}"
                                    class="breadcrumb-mobile-category">
                                    {{ $course->subCategory->courseCategory->category_en_name }}
                                </a>
                            @elseif($course->subCategory)
                                <span class="breadcrumb-mobile-category">
                                    {{ $course->subCategory->subcategory_en_name }}
                                </span>
                            @else
                                <span class="breadcrumb-mobile-category">
                                    {{ $course->course_en_name }}
                                </span>
                            @endif

                            @if($course->subCategory)
                                <a href="{{ route('course-search', ['subcategory_id' => $course->subCategory->id]) }}"
                                    class="breadcrumb-mobile-course">
                                    {{ $course->course_en_name }}
                                </a>
                            @else
                                <span class="breadcrumb-mobile-course">
                                    {{ $course->course_en_name }}
                                </span>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 70px;">
        <div class="row">
            <div class="col-12">
                <div class="container form-container">
                    <h2 class="form-title f-s-20">Download and further your knowledge with us.</h2>
                    <form id="downloadForm">
                        @csrf
                         <input type="hidden" name="type" value="downloadBrochure" />
                        <input type="hidden" name="courseBrochure"
                            value="https://btsconsultant.com/uploads/courseBrochure/Integrating AI in Workplace Safety Practices.pdf"
                            alt="Integrating AI in Workplace Safety Practices">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        {{-- <input type="hidden" name="applicant_type_id" value="1"> --}}
                        <input type="hidden" id="fileName" value="Integrating AI in Workplace Safety Practices.pdf">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Your Name *:</label>
                                    <input name="name" type="text" value="" class="form-control">
                                     <div class="error-text text-danger" id="nameError" style="display:none;"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Your Company *:</label>
                                    <input name="company" type="text" value="" class="form-control">
                                     <div class="error-text text-danger" id="companyError" style="display:none;"></div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .slct-country .ts-control {
                                border: none !important;
                                position: relative;
                            }

                            .slct-country .ts-control::after {
                                content: "▼";
                                position: absolute;
                                right: 10px;
                                top: 50%;
                                transform: translateY(-50%);
                                pointer-events: none;
                                color: #666;
                                font-size: 12px;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group slct-country">
                                    <label>Your Country:</label>
                                    <select id="country_id" name="country_id" placeholder="Select a Country..."
                                        class="form-control">
                                        <option value=""></option>
                                        @foreach ($countries as $country)
                                            <option value='{{ $country->id }}'
                                                @if (old('country_id') == "$country->id") {{ 'selected' }} @endif>
                                                {{ $country->country_en_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Your Job Title :</label>
                                    <input type="text" name="job_title" value="" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your Email Address *:</label>
                                    <input type="text" name="email" class="form-control" id="emailAddrees">
                                    <div id="emailError" style="color:red; margin-top:5px; display:none;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-check mt-4">
                            <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">I accept the <a
                                    href="{{ route('terms-conditions') }}" target="_blank"
                                    style="color: #007bff; text-decoration: underline;">Terms &amp; Conditions</a>*</label>
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
                        <a id="downloadButton" class="theme-btn-1 btn btn-effect-1"
                            style="background-color: #376EFF;">Submit</a>
                    </form>
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

        document.addEventListener('DOMContentLoaded', function() {
            // Category
            var categorySelect = document.getElementById('country_id');
            if (categorySelect && !categorySelect.tomselect) {
                new TomSelect(categorySelect, {
                    create: false,
                    placeholder: "Select a country",
                    allowEmptyOption: true,
                    sortField: {
                        field: "text",
                        direction: "asc"
                    }
                });
            }

        });
$(document).ready(function () {
    $('#downloadButton').click(function () {

        // Reset all errors
        $(".error-text").hide().text("");
        $("#emailError").hide().text("");

        var data = $('#downloadForm').serialize();
        var _token = $('input[name="_token"]').val();
        var courseBrochure = $('input[name="courseBrochure"]').val();
        var fileName = $('#fileName').val();

        // Get fields
        let name = $('input[name="name"]').val().trim();
        let company = $('input[name="company"]').val().trim();
        var email = $('#emailAddrees').val().trim();

        let hasError = false;

        // --------------------
        // 1️⃣ Required fields
        // --------------------
        if (!name) {
            $("#nameError").text("Name is required.").show();
            hasError = true;
        }

        if (!company) {
            $("#companyError").text("Company is required.").show();
            hasError = true;
        }

        if (!email) {
            $("#emailError").text("Email is required.").show();
            hasError = true;
        }

        if (hasError) return;

        // --------------------
        // 2️⃣ Validate email format
        // --------------------
        var emailRegex = /^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/;

        if (!email.match(emailRegex)) {
            $("#emailError").text("❌ Please enter a valid email address.").show();
            return;
        }

        // --------------------
        // 3️⃣ Block free emails
        // --------------------
        var freeRegex = /@(gmail\.com|hotmail\.com|yahoo\.com)$/i;

        if (email.match(freeRegex)) {
            $("#emailError").text("❌ Free email domains are not allowed. Please use your corporate email.").show();
            return;
        }

        // --------------------
        // 4️⃣ Terms not accepted
        // --------------------
        if ($('input[name="agree"]:checked').length === 0) {
            $("#emailError").text("❌ You must accept the Terms & Conditions.").show();
            return;
        }

        // --------------------
        // 5️⃣ AJAX request
        // --------------------
        $.ajax({
            url: "{{ route('registerApplicantsDawnload') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': _token
            },
            data: data,

            success: function (result) {
                var link = document.createElement("a");
                link.download = fileName;
                link.href = encodeURI(courseBrochure);
                link.click();
            },

            error: function (xhr) {

    if (xhr.status === 422) {
        let errors = xhr.responseJSON.errors;

        if (errors.name) $("#nameError").text(errors.name[0]).show();
        if (errors.company) $("#companyError").text(errors.company[0]).show();
        if (errors.email) $("#emailError").text(errors.email[0]).show();
        if (errors.captcha) $("#captchaError").text(errors.captcha[0]).show();

        return;
    }

    $("#emailError").text("❌ An error occurred. Please try again later.").show();
}

        });
    });
});


    </script>
@endsection
