@extends('front-design-pages.front-layout.app')
    <!-- Body main wrapper start -->
@section('page-id' , 'single-course-page')
@section('page-content')
    <div class="main-course-bg-header">
      <div class="share-icon">
        <i class="fas fa-share-alt-square"></i>
      </div>
      <div class="course-main-title">
        <h2>{{ $course->course_en_name }}</h2>
      </div>
    </div>
    @if ($message = Session::get('message'))
    <div id="alertDivDetails" class="alert alert-info" style="position: relative; padding: 15px; border-radius: 5px; margin-top: 20px;">
        <button type="button" id="alertCloseDetails" style="position: absolute; top: 5px; right: 10px; background: none; border: none; font-size: 20px; line-height: 20px;">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

    <div class="container main-course-title-and-details">
      <span>{{ $course->subCategory->courseCategory->category_en_name ?? '' }}</span>
      <h2>Courses Details</h2>
      <p>We will never stop improving</p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="main-img-of-course text-center">
            <img src="{{ asset('uploads/courses')}}/{{ $course->course_image }}" alt="{{ $course->course_en_name }}">
          </div>

          <div class="ltn__faq-area mb-100">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="ltn__faq-inner ltn__faq-inner-2">
                    <div id="accordion_2">
                      <!-- card -->
                      <div class="card">
                        <h6 class="ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-1"
                          aria-expanded="true">
                          Course Description
                        </h6>
                        <div id="faq-item-2-1" class="collapse show" data-parent="#accordion_2">
                          <div class="card-body">
                            {!!  $course->course_en_desc !!}
                          </div>
                        </div>
                      </div>
                      <!-- card -->
                      <div class="card">
                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-2"
                          aria-expanded="false">
                          The Training Course Will Highlight ?
                        </h6>
                        <div id="faq-item-2-2" class="collapse " data-parent="#accordion_2">
                          <div class="card-body">
                            <div class="ltn__video-img alignleft">
                              <img src="{{ asset('front-assets/img/bg/17.jpg') }}" alt="video popup bg image">
                              <a class="ltn__video-icon-2 ltn__video-icon-2-small ltn__video-icon-2-border----"
                                href="https://www.youtube.com/embed/LjCzPp-MK48?autoplay=1&showinfo=0"
                                data-rel="lightcase:myCollection">
                                <i class="fa fa-play"></i>
                              </a>
                            </div>
                            {!!  $course->course_highlight !!}
                          </div>
                        </div>
                      </div>
                      <!-- card -->
                      <div class="card">
                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-3"
                          aria-expanded="false">
                          Training Objective
                        </h6>
                        <div id="faq-item-2-3" class="collapse" data-parent="#accordion_2">
                          <div class="card-body">
                            {!!  $course->course_highlight !!}
                          </div>
                        </div>
                      </div>
                      <!-- card -->
                      <div class="card">
                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-4"
                          aria-expanded="false">
                          Returns and refunds
                        </h6>
                        <div id="faq-item-2-4" class="collapse" data-parent="#accordion_2">
                          <div class="card-body">
                            {!! $course->course_objectives !!}
                          </div>
                        </div>
                      </div>
                      <!-- card -->
                      <div class="card">
                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-5"
                          aria-expanded="false">
                          Target Audience
                        </h6>
                        <div id="faq-item-2-5" class="collapse" data-parent="#accordion_2">
                          <div class="card-body">
                            {!! $course->course_audience !!}
                          </div>
                        </div>
                      </div>
                      <!-- card -->
                      <div class="card">
                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-6"
                          aria-expanded="false">
                          Training Methods
                        </h6>
                        <div id="faq-item-2-6" class="collapse" data-parent="#accordion_2">
                          <div class="card-body">
                            {!! $course->course_training_methods !!}
                          </div>
                        </div>
                      </div>
                      <!-- card -->
                      <div class="card">
                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-7"
                          aria-expanded="false">
                          Daily Agenda
                        </h6>
                        <div id="faq-item-2-7" class="collapse" data-parent="#accordion_2">
                          <div class="card-body">
                            {!! $course->course_daily_agenda !!}
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-8"
                          aria-expanded="false">
                          Accreditation
                        </h6>
                        <div id="faq-item-2-8" class="collapse" data-parent="#accordion_2">
                          <div class="card-body">
                            {!! $course->Accreditation !!}
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-9"
                          aria-expanded="false">
                          Quick Enquiry
                        </h6>
                        <div id="faq-item-2-9" class="collapse" data-parent="#accordion_2">
                          <div class="card-body">
                            <h4>Request Info</h4>
                            <form class="form-area contact-form text-right" action="{{url('/registerApplicants')}}" method="POST">
                                @csrf
                                <input type="hidden" name="course_id" value="{{$course->id}}" />
                                <input type="hidden" name="applicant_type_id" value=2 />
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 name">
                                        <label>Salutation*</label>
                                        <select name="salut_id" class="form-control" style="padding:0 12px;border: 1px solid #CCC;">
                                            <option value=""></option>
                                            @foreach ($saluts as $salut)
                                            <option value='{{$salut->id}}' @if (old('salut_id')=="$salut->id" ) {{ 'selected' }} @endif>
                                                {{ $salut->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 email">
                                        <label>Full Name*</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 name">
                                        <label>Designation*</label>
                                        <input name="job_title" type="text" value="{{ old('job_title') }}" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 email">
                                        <label>Company*</label>
                                        <input type="text" name="company" value="{{ old('company') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 name">
                                        <label>Country*</label>
                                        <select name="country_id" class="form-control" style="padding:0 15px;border: 1px solid #CCC;">
                                            <option value=""></option>
                                            @foreach ($countries as $country)
                                            <option value='{{$country->id}}' @if (old('country_id')=="$country->id" ) {{ 'selected' }} @endif>
                                                {{ $country->country_en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 email">
                                        <label>City*</label>
                                        <select name="venue_id" class="form-control" style="padding:0 12px;border: 1px solid #CCC;">
                                            <option value=""></option>
                                            @foreach ($venues as $venue)
                                            <option value='{{$venue->id}}' @if (old('venue_id')=="$venue->id" ) {{ 'selected' }} @endif>
                                                {{ $venue->venue_en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 name">
                                        <label>Address*</label>
                                        <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 email">
                                        <label> Email*</label>
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 name">
                                        <label>Fax*</label>
                                        <input type="text" name="fax" value="{{ old('fax') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group  form-inline">
                                    <label>Enquiry*</label>
                                    <textarea name="quk_enquery_notes" value="{{ old('quk_enquery_notes') }}" class="form-control mb-10" rows="5">{{Request::old('quk_enquery_notes')}}</textarea>
                                </div>

                                <div class="row">
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


                                <button type="submit" class="mt-40 text-uppercase genric-btn primary text-center">Submit</button>
                            </form>
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
        <div class="col-12 col-lg-6">
          <div class="row action-btns mb-4">

            <div class="col-12 d-flex flex-wrap justify-content-end gap-2">
                <a href='{{url ("/downloadBrochure/$course->id") }}' class=" btn-single-course-option">
                    <i class="fas fa-download mr-2"></i> Download Brochure</a>
              {{-- <button class=" btn-single-course-option"><i class="fas fa-download mr-2"></i>Download Brochure</button> --}}
              {{-- <button class=" btn-single-course-option">Request Online Proposal</button> --}}
              {{-- <button class=" btn-single-course-option">Request In house Proposal</button> --}}
              <a href='{{url ("/requestInHouse/$course->id") }}' class=" btn-single-course-option">
                Request In house Proposal</a>
            </div>
          </div>
          <!-- Course Rounds Table -->
          <div class="table-single-course-details">

            <h3 class="mb-4">Course Rounds: ({{ $course->course_duration }} -Days)</h3>
            <div class="table-responsive">
              <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                  <tr>
                    <th>Code</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Fees</th>
                    <th>Register</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($rounds as $round)
                  <tr>
                    <td>{{ $round->round_code }}</td>
                    <td>
                        <?php if ($round): ?>
                            <?php $date = date_create($round->round_start_date); ?>
                            <?= date_format($date, 'Y-m-d') ?>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td>{{ $round->venue->venue_en_name ?? ''}}</td>
                    <td>{{ $round->currancy->currency_name ?? ''}} {{ $round->round_price}}</td>
                    <td>   <button class="btn btn-primary btn-sm">
                        <a href='{{url ("/registerCourse/$round->id") }}' style="padding:2px 3px;color:#fff"> Register</a>
                    </button></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <p class="pricing-note">Prices doesn't Include VAT</p>
          </div>
          <div class="social-single-course">
            <div class="upcoming-date-card">
              <h2 class="upcoming-date-title">UpComing Date</h2>

              <h3 class="section-title">Details</h3>
              <div class="info-row">
                <div class="info-label">Start date</div>
                <div class="info-value">
                              {{ $specfic_round && $specfic_round->round_start_date ? \Carbon\Carbon::parse($specfic_round->round_start_date)->format('d-m-Y') : 'N/A' }}
                </div>
              </div>
              <div class="info-row">
                <div class="info-label">End date</div>
                <div class="info-value">                {{ $specfic_round && $specfic_round->round_end_date ? \Carbon\Carbon::parse($specfic_round->round_end_date)->format('d-m-Y') : 'N/A' }}
                </div>
              </div>

              <h3 class="section-title">Venue</h3>
              <div class="info-row">
                <div class="info-label">Country</div>
                <div class="info-value">{{ $specfic_round->country->country_en_name ??'' }}</div>
              </div>
              <div class="info-row">
                <div class="info-label">Venue</div>
                <div class="info-value">{{ $specfic_round->venue->venue_en_name ??''}}</div>
              </div>

              <div class="row action-row mt-4 align-items-center">
                <div class="col-md-6 col-12">

                    <a href='{{url ("/registerCourse/$specfic_round->id") }}' class="btn btn-primary register-btn">
                        Register Now</a>
                  {{-- <button class="btn btn-primary register-btn">Register Now</button> --}}
                </div>
                <div class="col-md-6 col-12">
                  <div class="social-buttons">
                    <a href="#" class="social-btn fb-btn">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-btn twitter-btn">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-btn linkedin-btn">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="social-btn whatsapp-btn">
                      <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#" class="social-btn messenger-btn">
                      <i class="fab fa-facebook-messenger"></i>
                    </a>
                    <a href="#" class="social-btn email-btn">
                      <i class="fas fa-envelope"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
      <div class="row">
        <div class="container main-course-title-and-details">
          <span>Technical Training</span>
          <h2>Related Courses</h2>
          <p>We will never stop improving</p>
        </div>
        <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
            @foreach($related_courses as $related_course)
            <!-- Blog Item -->
          <div class="col-lg-12 ">
            <div class="ltn__product-item ltn__product-item-3 text-left">
              <div class="product-img">
                <a href="{{ url('courseDetails/'.$related_course->relatedcourse->id) }}" class="img-container"><img height="100%" src="{{ asset('uploads/courses')}}/{{ $related_course->relatedcourse->course_image_thumbnail }}" alt="{{ $related_course->relatedcourse->course_en_name }}"></a>
                <div class="course-badge p-3">
                  <div class="row">
                    <div class="col-12 title-section">
                      <h3 class='white-color'>{{ Str::limit( $related_course->relatedcourse->course_en_name ,89,'') }}</h3>
                      <p class='white-color'>
                        {{ Str::limit($related_course->relatedcourse->course_en_desc, 200, ' ...') }}
                      </p>
                    </div>

                    <div class="col-12 row align-items-center">
                      <span class="category-title">{{ $related_course->relatedcourse->subCategory->courseCategory->category_en_name ?? '' }}</span>
                      <div class="col-10 white-color bottom-title">{{ $related_course->related_course->venue->venue_en_name ??''}} - {{ $related_course->related_course->country->country_en_name ??''}} | 24 Nov, 2024
                      </div>
                      <div class="col-2 ">
                        <span class="icon-arrow">
                          <a href="{{ url('courseDetails/'.$related_course->relatedcourse->id) }}"><i class="fa fa-arrow-right white-color"></i></a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
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
</script>
@endsection
