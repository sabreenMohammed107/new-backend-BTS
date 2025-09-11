@extends('front-design-pages.front-layout.app')
@section('page-id' , 'contact-us-page')
@section('page-content')
<div class="main-course-bg-header">
    <div class="course-main-title text-center">
        <h2>Contact Us</h2>
    </div>
</div>
@if(session('message'))
<div class="container py-3">
    <div class="alert alert-success" role="alert" aria-live="polite">{{ session('message') }}</div>
 </div>
@endif
@if(session('error'))
<div class="container py-3">
    <div class="alert alert-danger" role="alert" aria-live="assertive">{{ session('error') }}</div>
 </div>
@endif
@if($errors->any())
<div class="container py-2">
    <div class="alert alert-danger" role="alert" aria-live="assertive">
        Please correct the highlighted fields below.
    </div>
 </div>
@endif
<div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area mb-0 ltn__section-title-2 text-center">

                    <h5 class="col-12 col-md-8 text-center f-s-20 p-5 m-auto">Contact us to meet all your inquiries and
                        needs, as our professional team is pleased to provide immediate support and advice to ensure you
                        achieve your goals and facilitate your experience with us in the best possible way.</h5>

                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <div class="ltn__our-history-inner">
                            <div class="ltn__tab-menu">
                                <div class="container">
                                    <div class="row">
                                        <div class="nav text-center row" role="tablist" aria-label="Contact locations">
                                            <a class="col-12 col-md-6 m-0 d-flex justify-content-center align-items-center active"
                                                data-bs-toggle="tab" href="#liton_tab_2_2" role="tab"
                                                aria-controls="liton_tab_2_2" aria-selected="true">
                                                United Arab Emirates
                                            </a>
                                            <a class="col-12 col-md-6 m-0 d-flex justify-content-center align-items-center"
                                                data-bs-toggle="tab" href="#liton_tab_2_3" role="tab"
                                                aria-controls="liton_tab_2_3" aria-selected="false">
                                                Egypt
                                            </a>
                                        </div>
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
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/hom.png') }}"
                                                                    alt="">
                                                                UAE
                                                            </div>
                                                            <span>3012, Block 3, 30 Euro Business Park,<br> Little
                                                                Island, Co. Cork, T45 V220</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Office
                                                            </div>
                                                            <span>+353214552955</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Mobile
                                                            </div>
                                                            <span>+353876480984</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 d-flex justify-content-end">


                                                    <img src="{{ asset('front-assets/img/bg/Group 112.png') }}"
                                                        alt="World Map" class="map-image img-fluid">

                                                </div>
                                                <div class="col-12">
                                                    <form id="contact-form-main-page-uae"
                                                        action="{{url('/sendMessage')}}" method="POST" novalidate>
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 my-3">
                                                                <div
                                                                    class="input-item input-item-name ltn__custom-icon">
                                                                    <label for="uae_sender_name"
                                                                        class="visually-hidden">Your name</label>
                                                                    <input id="uae_sender_name" type="text"
                                                                        name="sender_name"
                                                                        value="{{ old('sender_name') }}"
                                                                        placeholder="Your name" required>
                                                                    @error('sender_name')<small class="text-danger">{{
                                                                        $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div
                                                                    class="input-item input-item-email ltn__custom-icon">
                                                                    <label for="uae_sender_email"
                                                                        class="visually-hidden">Email address</label>
                                                                    <input id="uae_sender_email" type="email"
                                                                        name="sender_email"
                                                                        value="{{ old('sender_email') }}"
                                                                        placeholder="Email address" required>
                                                                    @error('sender_email')<small class="text-danger">{{
                                                                        $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div
                                                                    class="input-item input-item-phone ltn__custom-icon">
                                                                    <label for="uae_mobile"
                                                                        class="visually-hidden">Mobile number</label>
                                                                    <input id="uae_mobile" type="text" name="mobile"
                                                                        value="{{ old('mobile') }}"
                                                                        placeholder="Mobile number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div
                                                                    class="input-item input-item-email ltn__custom-icon">
                                                                    <label for="uae_sender_subject"
                                                                        class="visually-hidden">Message title</label>
                                                                    <input id="uae_sender_subject" type="text"
                                                                        name="sender_subject"
                                                                        value="{{ old('sender_subject') }}"
                                                                        placeholder="Message title" required>
                                                                    @error('sender_subject')<small
                                                                        class="text-danger">{{ $message
                                                                        }}</small>@enderror

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="input-item input-item-textarea ltn__custom-icon my-3">
                                                            <label for="uae_sender_message" class="visually-hidden">Your
                                                                message</label>
                                                            <textarea id="uae_sender_message" name="sender_message"
                                                                placeholder="Your message" rows="5"
                                                                required>{{ old('sender_message') }}</textarea>
                                                            @error('sender_message')<small class="text-danger">{{
                                                                $message }}</small>@enderror
                                                        </div>

                                                        <p class="form-messege mb-0 mt-20"></p>

                                                        <button type="submit" class="theme-btn-1 btn btn-effect-1"
                                                            aria-label="Send message">Send</button>
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
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/hom.png') }}"
                                                                    alt="">
                                                                {{ $branch->country->country_en_name ?? '' }}
                                                            </div>
                                                            <span>{{ $branch->office_phone ?? '' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Office
                                                            </div>
                                                            <span>{{ $branch->office_phone ?? '' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Mobile
                                                            </div>
                                                            <span>{{ $branch->mobile ?? '' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Email
                                                            </div>
                                                            <span>{{ $branch->email ?? '' }}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 d-flex justify-content-end">


                                                    <img src="{{ asset('front-assets/img/bg/Group 112.png') }}"
                                                        alt="World Map" class="map-image img-fluid">

                                                </div>
                                                <div class="col-12">
                                                    <form id="contact-form-main-page-uae"
                                                        action="{{url('/sendMessage')}}" method="POST" novalidate>
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 my-3">
                                                                <div
                                                                    class="input-item input-item-name ltn__custom-icon">
                                                                    <label for="eg_sender_name"
                                                                        class="visually-hidden">Your name</label>
                                                                    <input id="eg_sender_name" type="text"
                                                                        name="sender_name"
                                                                        value="{{ old('sender_name') }}"
                                                                        placeholder="Your name" required>
                                                                    @error('sender_name')<small class="text-danger">{{
                                                                        $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div
                                                                    class="input-item input-item-email ltn__custom-icon">
                                                                    <label for="eg_sender_email"
                                                                        class="visually-hidden">Email address</label>
                                                                    <input id="eg_sender_email" type="email"
                                                                        name="sender_email"
                                                                        value="{{ old('sender_email') }}"
                                                                        placeholder="Email address" required>
                                                                    @error('sender_email')<small class="text-danger">{{
                                                                        $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div
                                                                    class="input-item input-item-phone ltn__custom-icon">
                                                                    <label for="eg_mobile"
                                                                        class="visually-hidden">Mobile number</label>
                                                                    <input id="eg_mobile" type="text" name="mobile"
                                                                        value="{{ old('mobile') }}"
                                                                        placeholder="Mobile number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div
                                                                    class="input-item input-item-email ltn__custom-icon">
                                                                    <label for="eg_sender_subject"
                                                                        class="visually-hidden">Message title</label>
                                                                    <input id="eg_sender_subject" type="text"
                                                                        name="sender_subject"
                                                                        value="{{ old('sender_subject') }}"
                                                                        placeholder="Message title" required>
                                                                    @error('sender_subject')<small
                                                                        class="text-danger">{{ $message
                                                                        }}</small>@enderror

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="input-item input-item-textarea ltn__custom-icon my-3">
                                                            <label for="eg_sender_message" class="visually-hidden">Your
                                                                message</label>
                                                            <textarea id="eg_sender_message" name="sender_message"
                                                                placeholder="Your message" rows="5"
                                                                required>{{ old('sender_message') }}</textarea>
                                                            @error('sender_message')<small class="text-danger">{{
                                                                $message }}</small>@enderror
                                                        </div>

                                                        <p class="form-messege mb-0 mt-20"></p>

                                                        <button type="submit" class="theme-btn-1 btn btn-effect-1"
                                                            aria-label="Send message">Send</button>
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
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/hom.png') }}"
                                                                    alt="">
                                                                {{ $egyptBranch->country->country_en_name ?? '' }}
                                                            </div>
                                                            <span>{{ $egyptBranch->address ?? '' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Office
                                                            </div>
                                                            <span>{{ $egyptBranch->office_phone ?? '' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Mobile
                                                            </div>
                                                            <span>{{ $egyptBranch->mobile ?? '' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Email
                                                            </div>
                                                            <span>{{ $egyptBranch->email ?? '' }}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 d-flex justify-content-end">


                                                    <img src="{{ asset('front-assets/img/bg/Group 112.png') }}"
                                                        alt="World Map" class="map-image img-fluid">

                                                </div>
                                                <div class="col-12">
                                                    <form id="contact-form-main-page-eg" action="{{url('/sendMessage')}}" method="POST" novalidate>
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-name ltn__custom-icon">
                                                                    <label for="eg_sender_name" class="visually-hidden">Your name</label>
                                                                    <input id="eg_sender_name" type="text" name="sender_name" value="{{ old('sender_name') }}" placeholder="Your name" required>
                                                                    @error('sender_name')<small class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-email ltn__custom-icon">
                                                                    <label for="eg_sender_email" class="visually-hidden">Email address</label>
                                                                    <input id="eg_sender_email" type="email" name="sender_email" value="{{ old('sender_email') }}" placeholder="Email address" required>
                                                                    @error('sender_email')<small class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-phone ltn__custom-icon">
                                                                    <label for="eg_mobile" class="visually-hidden">Mobile number</label>
                                                                    <input id="eg_mobile" type="text" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-email ltn__custom-icon">
                                                                    <label for="eg_sender_subject" class="visually-hidden">Message title</label>
                                                                    <input id="eg_sender_subject" type="text" name="sender_subject" value="{{ old('sender_subject') }}" placeholder="Message title" required>
                                                                    @error('sender_subject')<small class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-item input-item-textarea ltn__custom-icon my-3">
                                                            <label for="eg_sender_message" class="visually-hidden">Your message</label>
                                                            <textarea id="eg_sender_message" name="sender_message" placeholder="Your message" rows="5" required>{{ old('sender_message') }}</textarea>
                                                            @error('sender_message')<small class="text-danger">{{ $message }}</small>@enderror
                                                        </div>

                                                        <p class="form-messege mb-0 mt-20"></p>

                                                        <button type="submit" class="theme-btn-1 btn btn-effect-1" aria-label="Send message">Send</button>
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
