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

<div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50" style="padding-left: 15px;padding-right: 15px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area mb-0 ltn__section-title-2">
                    <h5 class="col-12 col-md-8 p-5 m-auto txt-al" style="font-weight: 400;">
                        Contact us to meet all your inquiries and needs, as our professional team is pleased to provide immediate support and advice to ensure you achieve your goals and facilitate your experience with us in the best possible way.
                    </h5>
                </div>

                <div class="row">
                    <style>
                        .contact-grid-container .contact-grid-item a:hover {
                            color:#000 !important;
                            cursor: default !important;
                        }
                        .contact-grid-item a {
                            width: 100% !important;
                            text-align: center;
                        }
                    </style>

                    <div class="col-lg-12">
                        <div class="ltn__our-history-inner">
                            <!-- Tab Navigation -->
                            <div class="ltn__tab-menu">
                                <div class="container">
                                    <div class="contact-grid-container" role="tablist" aria-label="Contact locations">
                                        <div class="contact-grid-item">
                                            <a class="theme-btn-1 btn btn-effect-1 active" style="font-size: 19px;"
                                                data-bs-toggle="tab" href="#egypt_tab" role="tab"
                                                aria-controls="egypt_tab" aria-selected="true">
                                                Egypt
                                            </a>
                                        </div>
                                        <div class="contact-grid-item">
                                            <a class="theme-btn-1 btn btn-effect-1" style="font-size: 19px;"
                                                data-bs-toggle="tab" href="#uae_tab" role="tab"
                                                aria-controls="uae_tab" aria-selected="false">
                                                United Arab Emirates
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Content -->
                            <div class="tab-content">
                                <!-- Egypt Tab Content -->
                                <div class="tab-pane fade active show" id="egypt_tab" role="tabpanel">
                                    <div class="ltn__product-tab-content-inner">
                                        <div class="container">
                                            <div class="row align-items-center">
                                                <!-- Egypt Contact Info -->
                                                <div class="col-12 col-lg-6 mt-5 mt-lg-0" style="height: max-content;">
                                                    <div class="contact-us-main-page row flex-column p-3">
                                                        <div class="">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/hom.png') }}"
                                                                    alt="">
                                                                Egypt
                                                            </div>
                                                            <span>{{ $egyptBranch->address ?? 'Cairo, Egypt' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Office
                                                            </div>
                                                            <span>{{ $egyptBranch->office_phone ?? '+20 2 1234567' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Mobile
                                                            </div>
                                                            <span>{{ $egyptBranch->mobile ?? '+20 10 1234567' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"  style="height: 12px !important"
                                                                    src="{{ asset('front-assets/img/icons/mail.png') }}"
                                                                    alt="">Email
                                                            </div>
                                                            <span>{{ $egyptBranch->email ?? 'egypt@company.com' }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Egypt Map -->
                                                <div class="col-12 col-lg-6 d-flex justify-content-end">
                                                    <img src="{{ asset('img/egy.png') }}"
                                                        alt="Egypt Map" class="map-image img-fluid">
                                                </div>

                                                <!-- Egypt Contact Form -->
                                                <div class="col-12">
                                                    <form id="contact-form-egypt" action="{{url('/sendMessage')}}" method="POST" novalidate>
                                                        @csrf
                                                        <input type="hidden" name="country" value="egypt">
                                                        <div class="row">
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-name ltn__custom-icon">
                                                                    <label for="eg_sender_name" class="visually-hidden">Your name</label>
                                                                    <input id="eg_sender_name" type="text" name="sender_name"
                                                                        value="{{ old('sender_name') }}" placeholder="Your name" required>
                                                                    @error('sender_name')<small class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-email ltn__custom-icon">
                                                                    <label for="eg_sender_email" class="visually-hidden">Email address</label>
                                                                    <input id="eg_sender_email" type="email" name="sender_email"
                                                                        value="{{ old('sender_email') }}" placeholder="Email address" required>
                                                                    @error('sender_email')<small class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-phone ltn__custom-icon">
                                                                    <label for="eg_mobile" class="visually-hidden">Mobile number</label>
                                                                    <input id="eg_mobile" type="text" name="mobile"
                                                                        value="{{ old('mobile') }}" placeholder="Mobile number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-email ltn__custom-icon">
                                                                    <label for="eg_sender_subject" class="visually-hidden">Message title</label>
                                                                    <input id="eg_sender_subject" type="text" name="sender_subject"
                                                                        value="{{ old('sender_subject') }}" placeholder="Message title" required>
                                                                    @error('sender_subject')<small class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-item input-item-textarea ltn__custom-icon my-3">
                                                            <label for="eg_sender_message" class="visually-hidden">Your message</label>
                                                            <textarea id="eg_sender_message" name="sender_message"
                                                                placeholder="Your message" rows="5" required>{{ old('sender_message') }}</textarea>
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

                                <!-- UAE Tab Content -->
                                <div class="tab-pane fade" id="uae_tab" role="tabpanel">
                                    <div class="ltn__product-tab-content-inner">
                                        <div class="container">
                                            <div class="row align-items-center">
                                                <!-- UAE Contact Info -->
                                                <div class="col-12 col-lg-6 mt-5 mt-lg-0" style="height: max-content;">
                                                    <div class="contact-us-main-page row flex-column p-3">
                                                        <div class="">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/hom.png') }}"
                                                                    alt="">
                                                                UAE
                                                            </div>
                                                            <span>{{ $branch->address ?? '3012, Block 3, 30 Euro Business Park, Little Island, Co. Cork, T45 V220' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Office
                                                            </div>
                                                            <span>{{ $branch->office_phone ?? '+353214552955' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2"
                                                                    src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                                    alt="">Mobile
                                                            </div>
                                                            <span>{{ $branch->mobile ?? '+353876480984' }}</span>
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="title-of-contact-us d-flex align-items-center">
                                                                <img class="pr-2" style="height: 12px !important"
                                                                    src="{{ asset('front-assets/img/icons/mail.png') }}"
                                                                    alt="">Email
                                                            </div>
                                                            <span>{{ $branch->email ?? 'uae@company.com' }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- UAE Map -->
                                                <div class="col-12 col-lg-6 d-flex justify-content-end">
                                                    <img src="{{ asset('img/uae.jpeg') }}"
                                                        alt="UAE Map" class="map-image img-fluid">
                                                </div>

                                                <!-- UAE Contact Form -->
                                                <div class="col-12">
                                                    <form id="contact-form-uae" action="{{url('/sendMessage')}}" method="POST" novalidate>
                                                        @csrf
                                                        <input type="hidden" name="country" value="uae">
                                                        <div class="row">
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-name ltn__custom-icon">
                                                                    <label for="uae_sender_name" class="visually-hidden">Your name</label>
                                                                    <input id="uae_sender_name" type="text" name="sender_name"
                                                                        value="{{ old('sender_name') }}" placeholder="Your name" required>
                                                                    @error('sender_name')<small class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-email ltn__custom-icon">
                                                                    <label for="uae_sender_email" class="visually-hidden">Email address</label>
                                                                    <input id="uae_sender_email" type="email" name="sender_email"
                                                                        value="{{ old('sender_email') }}" placeholder="Email address" required>
                                                                    @error('sender_email')<small class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-phone ltn__custom-icon">
                                                                    <label for="uae_mobile" class="visually-hidden">Mobile number</label>
                                                                    <input id="uae_mobile" type="text" name="mobile"
                                                                        value="{{ old('mobile') }}" placeholder="Mobile number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <div class="input-item input-item-email ltn__custom-icon">
                                                                    <label for="uae_sender_subject" class="visually-hidden">Message title</label>
                                                                    <input id="uae_sender_subject" type="text" name="sender_subject"
                                                                        value="{{ old('sender_subject') }}" placeholder="Message title" required>
                                                                    @error('sender_subject')<small class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-item input-item-textarea ltn__custom-icon my-3">
                                                            <label for="uae_sender_message" class="visually-hidden">Your message</label>
                                                            <textarea id="uae_sender_message" name="sender_message" style="min-height: 113px"
                                                                placeholder="Your message" rows="5" required>{{ old('sender_message') }}</textarea>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle tab switching
    const tabLinks = document.querySelectorAll('[data-bs-toggle="tab"]');

    tabLinks.forEach(function(tabLink) {
        tabLink.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all tabs
            tabLinks.forEach(function(link) {
                link.classList.remove('active');
                link.setAttribute('aria-selected', 'false');
            });

            // Add active class to clicked tab
            this.classList.add('active');
            this.setAttribute('aria-selected', 'true');

            // Hide all tab panes
            const tabPanes = document.querySelectorAll('.tab-pane');
            tabPanes.forEach(function(pane) {
                pane.classList.remove('active', 'show');
            });

            // Show target tab pane
            const targetId = this.getAttribute('href').substring(1);
            const targetPane = document.getElementById(targetId);
            if (targetPane) {
                targetPane.classList.add('active', 'show');
            }
        });
    });
});
</script>

@endsection
