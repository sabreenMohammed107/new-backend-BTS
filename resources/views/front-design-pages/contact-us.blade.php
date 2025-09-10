@extends('front-design-pages.front-layout.app')
@section('page-id' , 'contact-us-page')
@section('page-content')
<div class="main-course-bg-header">
    <div class="course-main-title text-center">
    <h2>Contact Us</h2>
    </div>
</div>
<div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        <div class="section-title-area ltn__section-title-2 text-center">

            <h5 class="col-12 col-md-8 g-clr text-center f-s-20 p-5 m-auto">Contact us to meet all your inquiries and needs, as our professional team is pleased to provide immediate support and advice to ensure you achieve your goals and facilitate your experience with us in the best possible way.</h5>

        </div>
        <div class="row">

            <div class="col-lg-12">
            <div class="ltn__our-history-inner">
                <div class="ltn__tab-menu">
                     <div class="container">
  <div class="nav text-center">
    <a class="col-12 col-md-6 d-flex justify-content-center align-items-center"
       data-bs-toggle="tab" href="#liton_tab_2_2">
       United Arab Emirates
    </a>
    <a class="col-12 col-md-6 d-flex justify-content-center align-items-center"
       data-bs-toggle="tab" href="#liton_tab_2_3">
       Egypt
    </a>
  </div>
</div>
                </div>
                <div class="tab-content">
                    {{-- <div class="tab-pane fade active show" id="liton_tab_2_1">
                            <div class="ltn__product-tab-content-inner">
                            <div class="container">
                                <div class="row align-items-center">
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

                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 d-flex justify-content-end">


                                            <img src="{{ asset('front-assets/img/bg/Group 112.png') }}" alt="World Map" class="map-image img-fluid">

                                </div>
                                <div class="col-12">
                                    <form id="contact-form main-page-form" action="{{url('/sendMessage')}}" method="POST">
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                              <input type="text" name="sender_name" value="{{ old('sender_name') }}" placeholder="Your name">
                                        </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" name="sender_email"  value="{{ old('sender_email') }}" placeholder="Email address">
                                        </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input type="text" name="mobile" name="sender_mobile" value="{{ old('sender_mobile') }}" placeholder="Mobile number">
                                        </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                             <input type="text" name="title" name="sender_subject" value="{{ old('sender_subject') }}" placeholder="Message title">

                                        </div>
                                        </div>
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon my-3">
                                         <textarea name="message" placeholder="Your message">{{ old('sender_message') }}</textarea>
                                    </div>

                                    <p class="form-messege mb-0 mt-20"></p>

                                    <button href="" type="submit" class="theme-btn-1 btn btn-effect-1">Send</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>

                    </div> --}}
                    <div class="tab-pane fade active show" id="liton_tab_2_2">
                            <div class="ltn__product-tab-content-inner">
                            <div class="container">
                                <div class="row align-items-center">
                                <div class="col-12 col-lg-6 mt-5 mt-lg-0" style="height: max-content;">

                                    <div class="contact-us-main-page row flex-column p-3">
                                    <div class="">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2" src="{{ asset('front-assets/img/icons/hom.png') }}"
                                            alt="">
                                        {{ $branch->country->country_en_name ?? '' }}
                                        </div>
                                        <span>{{ $branch->office_phone ?? '' }}</span>
                                    </div>
                                    <div class="pt-3">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                                            src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Office
                                        </div>
                                        <span>{{ $branch->office_phone ?? '' }}</span>
                                    </div>
                                    <div class="pt-3">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                                            src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Mobile
                                        </div>
                                        <span>{{ $branch->mobile ?? '' }}</span>
                                    </div>
<div class="pt-3">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                                            src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Email
                                        </div>
                                        <span>{{ $branch->email ?? '' }}</span>
                                    </div>

                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 d-flex justify-content-end">


                                            <img src="{{ asset('front-assets/img/bg/Group 112.png') }}" alt="World Map" class="map-image img-fluid">

                                </div>
                                <div class="col-12">
                                    <form id="contact-form main-page-form" action="{{url('/sendMessage')}}" method="POST">
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                              <input type="text" name="sender_name" value="{{ old('sender_name') }}" placeholder="Your name">
                                        </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" name="sender_email"  value="{{ old('sender_email') }}" placeholder="Email address">
                                        </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input type="text" name="mobile" name="sender_mobile" value="{{ old('sender_mobile') }}" placeholder="Mobile number">
                                        </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                             <input type="text" name="title" name="sender_subject" value="{{ old('sender_subject') }}" placeholder="Message title">

                                        </div>
                                        </div>
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon my-3">
                                         <textarea name="message" placeholder="Your message">{{ old('sender_message') }}</textarea>
                                    </div>

                                    <p class="form-messege mb-0 mt-20"></p>

                                    <button href="" type="submit" class="theme-btn-1 btn btn-effect-1">Send</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>

                    </div>
                    <div class="tab-pane fade" id="liton_tab_2_3">
                            <div class="ltn__product-tab-content-inner">
                            <div class="container">
                                <div class="row align-items-center">
                                <div class="col-12 col-lg-6 mt-5 mt-lg-0" style="height: max-content;">

                                    <div class="contact-us-main-page row flex-column p-3">
                                    <div class="">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2" src="{{ asset('front-assets/img/icons/hom.png') }}"
                                            alt="">
                                         {{ $egyptBranch->country->country_en_name ?? '' }}
                                        </div>
                                        <span>{{ $egyptBranch->address ?? '' }}</span>
                                    </div>
                                    <div class="pt-3">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                                            src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Office
                                        </div>
                                        <span>{{ $egyptBranch->office_phone ?? '' }}</span>
                                    </div>
                                    <div class="pt-3">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                                            src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Mobile
                                        </div>
                                        <span>{{ $egyptBranch->mobile ?? '' }}</span>
                                    </div>
                                     <div class="pt-3">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                                            src="{{ asset('front-assets/img/icons/phone.png') }}" alt="">Email
                                        </div>
                                        <span>{{ $egyptBranch->email ?? '' }}</span>
                                    </div>

                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 d-flex justify-content-end">


                                            <img src="{{ asset('front-assets/img/bg/Group 112.png') }}" alt="World Map" class="map-image img-fluid">

                                </div>
                                <div class="col-12">
                                    <form id="contact-form main-page-form" action="{{url('/sendMessage')}}" method="POST">
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                              <input type="text" name="sender_name" value="{{ old('sender_name') }}" placeholder="Your name">
                                        </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" name="sender_email"  value="{{ old('sender_email') }}" placeholder="Email address">
                                        </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input type="text" name="mobile" name="sender_mobile" value="{{ old('sender_mobile') }}" placeholder="Mobile number">
                                        </div>
                                        </div>
                                        <div class="col-md-6 my-3">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                             <input type="text" name="title" name="sender_subject" value="{{ old('sender_subject') }}" placeholder="Message title">

                                        </div>
                                        </div>
                                    </div>
                                    <div class="input-item input-item-textarea ltn__custom-icon my-3">
                                         <textarea name="message" placeholder="Your message">{{ old('sender_message') }}</textarea>
                                    </div>

                                    <p class="form-messege mb-0 mt-20"></p>

                                    <button href="" type="submit" class="theme-btn-1 btn btn-effect-1">Send</button>
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
    </div>
    </div>
</div>
@endsection

