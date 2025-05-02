@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'single-course-page')
@section('page-content')
<style>
    .input-hidden .ts-control > input {
    position: relative !important;
}
    </style>
    <!-- Utilize Mobile Menu End -->
    <div class="main-course-bg-header">
      <!-- <div class="share-icon">
        <i class="fas fa-share-alt-square"></i>
      </div> -->
      <div class="course-main-title">
        <h2>Download Brochure</h2>
      </div>
    </div>
    <div class="container" style="margin-top: 70px;">
      <div class="row">
        <div class="col-12 col-lg-9">
          <div class="container form-container">
            <h2 class="form-title f-s-20">Download and further your knowledge with us.</h2>
            <form id="downloadForm">
                <input type="hidden" name="_token" value="KPAiROFBPjxN5bxHj8Ymng6hMjcFGnEyiyxOPlDh" autocomplete="off">						<div class="form-group form-inline">
                    <input type="hidden" name="courseBrochure" value="https://btsconsultant.com/uploads/courseBrochure/Integrating AI in Workplace Safety Practices.pdf" alt="Integrating AI in Workplace Safety Practices">
                    <input type="hidden" name="course_id" value="2903">
                    <input type="hidden" name="applicant_type_id" value="1">
                    <input type="hidden" id="fileName" value="Integrating AI in Workplace Safety Practices.pdf">

                    <div class="form-group col-lg-12 col-md-12">
                        <label>Your Name : </label>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <input name="name" type="text" value="" class="form-control">
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <label>Your Company : </label>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <input name="company" type="text" value="" class="form-control">
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <label>Your Country:</label>
                    </div>

                    <div class="form-group col-lg-12 col-md-12">
                            <select id="country_id" name="country_id" placeholder="Select a Country...">
                            <option value=""></option>
                            @foreach ($countries as $country)
                                <option value='{{ $country->id }}'
                                    @if (old('country_id') == "$country->id") {{ 'selected' }} @endif>
                                    {{ $country->country_en_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-12 col-md-12">
                        <label>Your Job Title : </label>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <input type="text" name="job_title" value="" class="form-control">
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <label>Your Email Address : </label>
                    </div>
                    <div class="form-group col-lg-12 col-md-12">
                        <input type="text" name="email" value="" class="form-control" id="emailAddrees">
                    </div>
                </div>
                <hr>
                <div>
                    <h6></h6>
                </div>
                <div class=" form-inline" style="padding-bottom:10px">
                    <h5>Terms &amp; Conditions</h5>
                </div>
                <div class="form-check form-inline">
                    <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">I accept the Terms &amp; Conditions*</label>
                </div>
                <div class="form-inline">
                    <div class="form-group">
                        <label class="form-check-label" for="exampleCheck1"><a href="{{url('/conditions')}}" target="blank" style="color:#4169E1">Terms & Conditions of Registration</a></label>                    </div>
                    <span style="color:red;display:block" class="error-message"> </span>
                </div>
                <div id="alertDivDanger" class="alert alert-danger alert-block" style="display:none">

                    <strong><span style="color:red;display:block" class="error-message">Please accept conditions </span>
                    </strong>
                </div>
                <div id="alertDivMail" class="alert alert-danger alert-block" style="display:none">

                    <strong><span style="color:red;display:block" class="error-message">You cannot use free email address!</span>
                    </strong>
                </div>
                <div id="alertDivValid" class="alert alert-danger alert-block" style="display:none">

                    <strong><span style="color:red;display:block" class="error-message">Please enter a valid Company email address!</span>
                    </strong>
                </div>
                <div id="alertDivinfo" class="alert alert-info alert-block" style="display:none">

                    <strong><span style="color:black;display:block" class="error-message">Thanks; your request has been submitted successfully ! </span>
                    </strong>
                </div>

                    <div class="row mb-2">
                        <div class="form-group col-lg-6">
                            <label>Captcha*</label>
                            <div class="captcha d-flex align-items-center gap-2">
                                <span id="captcha-img">{!! captcha_img('flat') !!}</span>
                                <button type="button" class="btn btn-secondary btn-sm" id="refresh-captcha" style="margin-left: 10px; padding: 6px 10px;">
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
                    <a id="downloadButton" class="theme-btn-1 btn btn-effect-1 text-uppercase " style="background-color: #376EFF;">Submit</a>
            </form>
          </div>
        </div>
        <div class="col-12 col-lg-3 event-details-left left-contents" style="background-color:#f9f9ff">
            <h5 style="margin-top:30px;margin-bottom:10px"> {{ $branch->venue->venue_en_name }}</h5>
            <p> {{ $branch->address }} </p>
            <p> {{ $branch->email}} </p>
            <p> {{ $branch->venue->venue_en_name }} ,{{ $branch->country->country_en_name }}</p>
            <p><span style="color:#32a2a8">Tel :</span> {{ $branch->mobile}}</p>
            <p><span style="color:#32a2a8">Office Phone :</span>{{ $branch->office_phone}}</p>

        </div>
      </div>


    </div>
@endsection
@section('script')
<script>
    document.getElementById('refresh-captcha').addEventListener('click', function () {
        fetch('/refresh-captcha')
            .then(response => response.json())
            .then(data => {
                document.getElementById('captcha-img').innerHTML = data.captcha;
            });
    });
    $(document).on('click', '#alertCloseDetails', function () {
        $('#alertDivDetails').fadeOut();
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Category
        var categorySelect = document.getElementById('country_id');
if (categorySelect && !categorySelect.tomselect) {
    new TomSelect(categorySelect, {
        create: false,
        placeholder: "Select a country",
        allowEmptyOption: true,
        sortField: { field: "text", direction: "asc" }
    });
}

 });
 $(document).ready(function () {
    $('#downloadButton').click(function () {
        var data = $('#downloadForm').serialize();
        var _token = $('input[name="_token"]').val();
        var courseBrochure = $('input[name="courseBrochure"]').val();
        var fileName = $('#fileName').val();
        var email = $('#emailAddrees').val();

        var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        var freeRegex = /@(gmail\.com|hotmail\.com|yahoo\.com)$/i;

        if (email.match(emailRegex)) {
            if (!email.match(freeRegex)) {
                if ($('input[name="agree"]:checked').length > 0) {
                    $.ajax({
                        url: "{{route('registerApplicantsDawnload')}}",
                        method: "POST",
                        data: data,
                        success: function (result) {
                            var link = document.createElement("a");
                            link.download = fileName;
                            link.href = courseBrochure;
                            link.click();
                        },
                    });
                    $('#alertDivinfo').fadeTo(2000, 500).slideUp(500, function () {
                        $("#alertDivinfo").slideUp(3000);
                    });
                } else {
                    $('#alertDivDanger').fadeTo(2000, 500).slideUp(500, function () {
                        $("#alertDivDanger").slideUp(3000);
                    });
                }
            } else {
                $('#alertDivValid').fadeTo(2000, 500).slideUp(500, function () {
                    $("#alertDivValid").slideUp(3000);
                });
            }
        } else {
            $('#alertDivValid').fadeTo(2000, 500).slideUp(500, function () {
                $("#alertDivValid").slideUp(3000);
            });
        }
    });
});


</script>
@endsection
