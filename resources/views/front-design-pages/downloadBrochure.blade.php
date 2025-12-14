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
    </style>
    <!-- Utilize Mobile Menu End -->
    <div class="main-course-bg-header">
        <!-- <div class="share-icon">
            <i class="fas fa-share-alt-square"></i>
          </div> -->
        <div class="course-main-title text-center">
            <h2>Download Brochure</h2>
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
