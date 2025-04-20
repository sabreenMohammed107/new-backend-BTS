@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'single-course-page')
@section('page-content')

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
                        <select class="form-control" name="country_id" required>
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                    {{ $country->country_en_name }}
                                </option>
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
    <!-- FEATURE AREA START ( Feature - 3) -->
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

                  <button href="" class="theme-btn-1 btn btn-effect-1 text-uppercase w-100">Send</button>
                </form>
              </div>
              <div class="col-12 col-lg-6 mt-5 mt-lg-0" style="height: max-content;">

                <div class="contact-us-main-page row flex-column p-3">
                  <div class="">
                    <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2" src="{{ asset('front-assets/img/icons/hom.png') }}"
                        alt="">
                      UAE
                    </div>
                    <span>3012, Block 3, 30 Euro Business Park,<br> Little Island, Co. Cork, T45 V220</span>
                  </div>
                  <div class="pt-3">
                    <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                        src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Office
                    </div>
                    <span>+353214552955</span>
                  </div>
                  <div class="pt-3">
                    <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                        src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Mobile
                    </div>
                    <span>+353876480984</span>
                  </div>
                  <div class="pt-3">
                    <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                        src="{{ asset('front-assets/img/icons/mail.png') }}" alt="">E-mail
                    </div>
                    <span>Info@btsconsultant.com</span>
                  </div>
                  <div class="pt-3">
                    <div class="row">
                      <div class="col-12 col-lg-6">
                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                            src="{{ asset('front-assets/img/icons/time.png') }}" alt="">Working
                          hours</div>
                        <span>Sun to Fri 09:00 AM to 06:00 PM</span>
                      </div>
                      <div class="col-12 col-lg-6 text-end">
                        <a href="" class="theme-btn-1 btn btn-effect-1 text-uppercase"><img src="{{ asset('front-assets/img/icons/loc.png') }}"
                            alt="">Location</a>

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
