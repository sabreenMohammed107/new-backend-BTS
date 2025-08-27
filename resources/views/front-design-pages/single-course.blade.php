@extends('front-design-pages.front-layout.app')
<!-- Body main wrapper start -->
@section('page-id', 'single-course-page')
@section('page-content')
    <style>
        /* Action buttons hover effect */
        .btn-single-course-option {
            transition: all 0.3s ease;
        }

        .btn-single-course-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            opacity: 0.9;
        }

        /* Register button hover effect */
        .btn-primary {
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Social media buttons hover effect */
        .social-btn {
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Form submit button hover effect */
        .genric-btn {
            transition: all 0.3s ease;
        }

        .genric-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Refresh captcha button hover effect */
        #refresh-captcha {
            transition: all 0.3s ease;
        }

        #refresh-captcha:hover {
            transform: rotate(180deg);
            background-color: #6c757d;
        }

        /* Course Rounds Table Styles */
        .table-single-course-details {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }

        .course-duration {
            background: #e3f2fd;
            color: #1976d2;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .course-rounds-table {
            margin-bottom: 0;
        }

        .course-rounds-table thead th {
            background: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            color: #495057;
            font-weight: 600;
            padding: 15px;
        }

        .course-rounds-table tbody td {
            padding: 15px;
            vertical-align: middle;
        }

        .round-code {
            background: #e3f2fd;
            color: #1976d2;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: 500;
        }

        .date-info,
        .venue-info {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #495057;
        }

        .date-info i,
        .venue-info i {
            color: #6c757d;
        }

        .price-info {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .currency {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .amount {
            font-weight: 600;
            color: #2c3e50;
        }

        .btn-register {
            background: #1976d2;
            color: white;
            padding: 8px 20px;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: #1565c0;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .pricing-note {
            margin-top: 15px;
            color: #6c757d;
            font-size: 0.9rem;
        }

        /* Upcoming Course Card Styles */
        .upcoming-course-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .card-header {
            background: #1976d2;
            color: white;
            padding: 20px;
        }

        .card-title {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .card-body {
            padding: 25px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .detail-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .detail-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-value {
            color: #2c3e50;
            font-weight: 500;
        }

        .venue-section {
            margin-bottom: 25px;
        }

        .venue-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .venue-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .venue-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .venue-value {
            color: #2c3e50;
            font-weight: 500;
        }

        .btn-register-large {
            background: #1976d2;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .btn-register-large:hover {
            background: #1565c0;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .no-rounds-message {
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .social-share {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .share-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .social-buttons {
            display: flex;
            gap: 10px;
        }

        .social-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .fb-btn {
            background: #1877f2;
        }

        .twitter-btn {
            background: #000;
            color: #fff;
        }

        .linkedin-btn {
            background: #0077b5;
        }

        .whatsapp-btn {
            background: #25d366;
        }

        .messenger-btn {
            background: #0084ff;
        }

        .email-btn {
            background: #ea4335;
        }

        .social-btn.twitter-btn svg {
            display: block;
            margin: auto;
        }

        @media (max-width: 768px) {
            .social-share {
                flex-direction: column;
                align-items: flex-start;
            }

            .social-buttons {
                margin-top: 10px;
            }
        }
        .course-rounds-table tr td {
  font-size: 12px !important;
}

    </style>
    <div class="main-course-bg-header">

        <div class="course-main-title text-center text-center">
            <h2>{{ $course->course_en_name }}</h2>
        </div>
    </div>
    @if ($message = Session::get('message'))
        <div id="alertDivDetails" class="alert alert-info"
            style="position: relative; padding: 15px; border-radius: 5px; margin-top: 20px;">
            <button type="button" id="alertCloseDetails"
                style="position: absolute; top: 5px; right: 10px; background: none; border: none; font-size: 20px; line-height: 20px;">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="container main-course-title-and-details">
        {{-- <span>{{ $course->subCategory->courseCategory->category_en_name ?? '' }}</span> --}}
        <h2>Courses Details</h2>
        <p> Your Growth; our Mission </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="main-img-of-course text-center">
                    <img src="{{ asset('uploads/courses') }}/{{ $course->course_image }}"
                        alt="{{ $course->course_en_name }}">
                </div>

                <div class="ltn__faq-area mb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="ltn__faq-inner ltn__faq-inner-2">
                                    <div id="accordion_2">
                                        <!-- card -->
                                        <div class="card">
                                            <h6 class="ltn__card-title" data-bs-toggle="collapse"
                                                data-bs-target="#faq-item-2-1" aria-expanded="true">
                                                Course Description
                                            </h6>
                                            <div id="faq-item-2-1" class="collapse show" data-bs-parent="#accordion_2">
                                                <div class="card-body">
                                                    {!! $course->course_en_desc !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card -->
                                        <div class="card">
                                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                                data-bs-target="#faq-item-2-2" aria-expanded="false">
                                                The Training Course Will Highlight ?
                                            </h6>
                                            <div id="faq-item-2-2" class="collapse " data-bs-parent="#accordion_2">
                                                <div class="card-body">
                                                    <div class="ltn__video-img alignleft">
                                                        <img src="{{ asset('front-assets/img/bg/17.jpg') }}"
                                                            alt="video popup bg image">
                                                        <a class="ltn__video-icon-2 ltn__video-icon-2-small ltn__video-icon-2-border----"
                                                            href="https://www.youtube.com/embed/LjCzPp-MK48?autoplay=1&showinfo=0"
                                                            data-rel="lightcase:myCollection">
                                                            <i class="fa fa-play"></i>
                                                        </a>
                                                    </div>
                                                    {!! $course->course_highlight !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card -->
                                        <div class="card">
                                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                                data-bs-target="#faq-item-2-3" aria-expanded="false">
                                                Training Objective
                                            </h6>
                                            <div id="faq-item-2-3" class="collapse" data-bs-parent="#accordion_2">
                                                <div class="card-body">
                                                    {!! $course->course_highlight !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card -->
                                        {{-- <div class="card">
                        <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-4"
                          aria-expanded="false">
                          Returns and refunds
                        </h6>
                        <div id="faq-item-2-4" class="collapse" data-bs-parent="#accordion_2">
                          <div class="card-body">
                            {!! $course->course_objectives !!}
                          </div>
                        </div>
                      </div> --}}
                                        <!-- card -->
                                        <div class="card">
                                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                                data-bs-target="#faq-item-2-5" aria-expanded="false">
                                                Target Audience
                                            </h6>
                                            <div id="faq-item-2-5" class="collapse" data-bs-parent="#accordion_2">
                                                <div class="card-body">
                                                    {!! $course->course_audience !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card -->
                                        <div class="card">
                                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                                data-bs-target="#faq-item-2-6" aria-expanded="false">
                                                Training Methods
                                            </h6>
                                            <div id="faq-item-2-6" class="collapse" data-bs-parent="#accordion_2">
                                                <div class="card-body">
                                                    {!! $course->course_training_methods !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- card -->
                                        <div class="card">
                                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                                data-bs-target="#faq-item-2-7" aria-expanded="false">
                                                Daily Agenda
                                            </h6>
                                            <div id="faq-item-2-7" class="collapse" data-bs-parent="#accordion_2">
                                                <div class="card-body">
                                                    {!! $course->course_daily_agenda !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                                data-bs-target="#faq-item-2-8" aria-expanded="false">
                                                Accreditation
                                            </h6>
                                            <div id="faq-item-2-8" class="collapse" data-bs-parent="#accordion_2">
                                                <div class="card-body">
                                                    {!! $course->Accreditation !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse"
                                                data-bs-target="#faq-item-2-9" aria-expanded="false">
                                                Quick Enquiry
                                            </h6>
                                            <div id="faq-item-2-9" class="collapse" data-bs-parent="#accordion_2">
                                                <div class="card-body">
                                                    <h4>Request Info</h4>
                                                    <form class="form-area contact-form text-right"
                                                        action="{{ url('/registerApplicants') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="course_id"
                                                            value="{{ $course->id }}" />
                                                        <input type="hidden" name="applicant_type_id" value=2 />
                                                        <div class="row">
                                                            <div class="form-group col-lg-6 col-md-12 name">
                                                                <label>Salutation*</label>
                                                                <select name="salut_id" class="form-control"
                                                                    style="padding:0 12px;border: 1px solid #CCC;">
                                                                    <option value=""></option>
                                                                    @foreach ($saluts as $salut)
                                                                        <option value='{{ $salut->id }}'
                                                                            @if (old('salut_id') == "$salut->id") {{ 'selected' }} @endif>
                                                                            {{ $salut->en_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-12 email">
                                                                <label>Full Name*</label>
                                                                <input type="text" name="name"
                                                                    value="{{ old('name') }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-lg-6 col-md-12 name">
                                                                <label>Designation*</label>
                                                                <input name="job_title" type="text"
                                                                    value="{{ old('job_title') }}" class="form-control">
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-12 email">
                                                                <label>Company*</label>
                                                                <input type="text" name="company"
                                                                    value="{{ old('company') }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-lg-6 col-md-12 name">
                                                                <label>Country*</label>
                                                                <select name="country_id" class="form-control"
                                                                    style="padding:0 15px;border: 1px solid #CCC;">
                                                                    <option value=""></option>
                                                                    @foreach ($countries as $country)
                                                                        <option value='{{ $country->id }}'
                                                                            @if (old('country_id') == "$country->id") {{ 'selected' }} @endif>
                                                                            {{ $country->country_en_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-12 email">
                                                                <label>City*</label>
                                                                <select name="venue_id" class="form-control"
                                                                    style="padding:0 12px;border: 1px solid #CCC;">
                                                                    <option value=""></option>
                                                                    @foreach ($venues as $venue)
                                                                        <option value='{{ $venue->id }}'
                                                                            @if (old('venue_id') == "$venue->id") {{ 'selected' }} @endif>
                                                                            {{ $venue->venue_en_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-lg-6 col-md-12 name">
                                                                <label>Address*</label>
                                                                <input type="text" name="address"
                                                                    value="{{ old('address') }}" class="form-control">
                                                            </div>

                                                            <div class="form-group col-lg-6 col-md-12 email">
                                                                <label> Email*</label>
                                                                <input type="text" name="email"
                                                                    value="{{ old('email') }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-lg-6 col-md-12 name">
                                                                <label>Fax*</label>
                                                                <input type="text" name="fax"
                                                                    value="{{ old('fax') }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group  form-inline">
                                                            <label>Enquiry*</label>
                                                            <textarea name="quk_enquery_notes" value="{{ old('quk_enquery_notes') }}" class="form-control mb-10"
                                                                rows="5">{{ Request::old('quk_enquery_notes') }}</textarea>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label>Captcha*</label>
                                                                <div class="captcha d-flex align-items-center gap-2">
                                                                    <span id="captcha-img">{!! captcha_img('flat') !!}</span>
                                                                    <button type="button"
                                                                        class="btn btn-secondary btn-sm"
                                                                        id="refresh-captcha"
                                                                        style="margin-left: 10px; padding: 6px 10px;">
                                                                        <i class="fas fa-sync-alt"></i>
                                                                    </button>

                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-6">
                                                                <label>Enter Captcha*</label>
                                                                <input id="captcha" type="text" class="form-control"
                                                                    name="captcha">
                                                                @error('captcha')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <button type="submit"
                                                            class="mt-40 text-uppercase genric-btn primary text-center">Submit</button>
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
                        <a href='{{ url("/downloadBrochure/$course->id") }}' class=" btn-single-course-option">
                            <i class="fas fa-download mr-2"></i> Download Brochure</a>
                        {{-- <button class=" btn-single-course-option"><i class="fas fa-download mr-2"></i>Download Brochure</button> --}}
                        {{-- <button class=" btn-single-course-option">Request Online Proposal</button> --}}
                        {{-- <button class=" btn-single-course-option">Request In house Proposal</button> --}}
                        <a href='{{ url("/requestInHouse/$course->id") }}' class=" btn-single-course-option">
                            Request In house Proposal</a>
                               <a href='{{ url("/requestOnline/$course->id") }}' class=" btn-single-course-option">
                            Request Online Proposal</a>
                    </div>
                </div>
                <!-- Course Rounds Table -->
                <div class="table-single-course-details">
                    <div class="section-header mb-4">
                        <h3 class="section-title">Course Rounds</h3>
                        <span class="course-duration">{{ $course->course_duration }} Days</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover course-rounds-table">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Venue</th>
                                    <th>Fees</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rounds as $round)
                                    <tr style="font-size: 12px !importnant;">
                                        <td><span class="round-code">{{ $round->round_code }}</span></td>
                                        <td>
                                            @if ($round)
                                                <div class="date-info">
                                                    <i class="far fa-calendar-alt"></i>
                                                    {{ date_format(date_create($round->round_start_date), 'Y-m-d') }}
                                                </div>
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="venue-info">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $round->venue->venue_en_name ?? '' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="price-info">
                                                <span class="currency">{{ $round->currancy->currency_name ?? '' }}</span>
                                                <span class="amount">{{ $round->round_price }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <a href='{{ url("/registerCourse/$round->id") }}' class="btn btn-register" style="font-size: 12px !importnant;">
                                                Register Now
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="pricing-note"><i class="fas fa-info-circle"></i> Prices don't include VAT</p>
                </div>
                <div class="social-single-course">
                    <div class="upcoming-course-card">
                        <div class="card-header" style="background: #fff">
                            <h2 class="card-title">Upcoming Session</h2>
                        </div>

                        <div class="card-body">
                            <div class="course-details-section">
                                <h3 class="section-title">Session Details</h3>
                                <div class="details-grid">
                                    <div class="detail-item">
                                        <div class="detail-label">
                                            <i class="far fa-calendar-check"></i>
                                            Start Date
                                        </div>
                                        <div class="detail-value">
                                            {{ $specfic_round && $specfic_round->round_start_date ? \Carbon\Carbon::parse($specfic_round->round_start_date)->format('d M, Y') : 'N/A' }}
                                        </div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label">
                                            <i class="far fa-calendar-times"></i>
                                            End Date
                                        </div>
                                        <div class="detail-value">
                                            {{ $specfic_round && $specfic_round->round_end_date ? \Carbon\Carbon::parse($specfic_round->round_end_date)->format('d M, Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="venue-section">
                                <h3 class="section-title">Venue Information</h3>
                                <div class="venue-details">
                                    <div class="venue-item">
                                        <div class="venue-label">
                                            <i class="fas fa-globe"></i>
                                            Country
                                        </div>
                                        <div class="venue-value">{{ $specfic_round->country->country_en_name ?? '' }}
                                        </div>
                                    </div>
                                    <div class="venue-item">
                                        <div class="venue-label">
                                            <i class="fas fa-building"></i>
                                            Venue
                                        </div>
                                        <div class="venue-value">{{ $specfic_round->venue->venue_en_name ?? '' }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="action-section">
                                <div class="row align-items-center">
                                    <div class="col-md-4 col-12 mb-3 mb-md-0" >
                                        @if ($specfic_round)
                                            <a href="{{ url("/registerCourse/$specfic_round->id") }}"
                                                class="btn btn-primary btn-register-large p-2" >
                                                <i class="fas fa-user-plus"></i>
                                                Register Now
                                            </a>
                                        @else
                                            <p class="no-rounds-message">
                                                <i class="fas fa-info-circle"></i>
                                                No rounds available for registration
                                            </p>
                                        @endif
                                    </div>
                                    @php
                                        $courseUrl = url('/courseDetails/' . $course->id); // هذا يعطي https://bts.activegroup-eg.com/courseDetails/3032
                                        $courseTitle = $course->title ?? 'Course Title';
                                    @endphp
                                    <div class="col-md-8 col-12">
                                        <div class="social-share" style="font-size: 12px">
                                            <span class="share-label">Share </span>
                                            <div class="social-buttons">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($courseUrl) }}"
                                                    target="_blank" class="social-btn fb-btn" title="Share on Facebook">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode($courseUrl) }}&text={{ urlencode($courseTitle) }}"
                                                    target="_blank" class="social-btn twitter-btn"
                                                    title="Share on Twitter">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($courseUrl) }}"
                                                    target="_blank" class="social-btn linkedin-btn"
                                                    title="Share on LinkedIn">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                                <a href="https://wa.me/?text={{ urlencode($courseTitle . ' - ' . $courseUrl) }}"
                                                    target="_blank" class="social-btn whatsapp-btn"
                                                    title="Share on WhatsApp">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                                <a href="fb-messenger://share?link={{ urlencode($courseUrl) }}"
                                                    target="_blank" class="social-btn messenger-btn"
                                                    title="Share on Messenger">
                                                    <i class="fab fa-facebook-messenger"></i>
                                                </a>
                                                <a href="mailto:?subject={{ urlencode($courseTitle) }}&body={{ urlencode($courseUrl) }}"
                                                    class="social-btn email-btn" title="Share via Email">
                                                    <i class="fas fa-envelope"></i>
                                                </a>
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
        <div class="row">
            <div class="container main-course-title-and-details">
                <h2>Related Courses</h2>
                <p> Your Growth; our Mission </p>
            </div>
            <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                @foreach ($related_courses as $related_course)
                    <!-- Blog Item -->
                    <div class="col-lg-12 ">
                        <div class="ltn__product-item ltn__product-item-3 text-left">
                            <div class="product-img">
                                <a href="{{ url('courseDetails/' . $related_course->relatedcourse->id) }}"
                                    class="img-container"><img height="100%"
                                        src="{{ asset('uploads/courses') }}/{{ $related_course->relatedcourse->course_image_thumbnail }}"
                                        alt="{{ $related_course->relatedcourse->course_en_name }}"></a>
                                <div class="course-badge p-3">
                                    <div class="row">
                                        <div class="col-12 title-section">
                                            <h3 class='white-color'>
                                                {{ Str::limit($related_course->relatedcourse->course_en_name, 89, '') }}
                                            </h3>
                                            <p class='white-color'>
                                                {{ Str::limit($related_course->relatedcourse->course_en_desc, 200, ' ...') }}
                                            </p>
                                        </div>

                                        <div class="col-12 row align-items-center">
                                            <span
                                                class="category-title">{{ $related_course->relatedcourse->subCategory->courseCategory->category_en_name ?? '' }}</span>
                                            <div class="col-10 white-color bottom-title">
                                                {{ $related_course->related_course->venue->venue_en_name ?? '' }} -
                                                {{ $related_course->related_course->country->country_en_name ?? '' }} | 24
                                                Nov, 2024
                                            </div>
                                            <div class="col-2 ">
                                                <span class="icon-arrow">
                                                    <a
                                                        href="{{ url('courseDetails/' . $related_course->relatedcourse->id) }}"><i
                                                            class="fa fa-arrow-right white-color"></i></a>
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
    </script>
@endsection
