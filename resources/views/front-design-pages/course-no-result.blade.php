@extends('front-design-pages.front-layout.app')
<!-- Body main wrapper start -->

@section('page-class' , 'course-search-page')
@section('page-content')
<div class="main-course-bg-header">
    <div class="course-main-title text-center">
        <h2>TAILOR YOUR COURSE</h2>
    </div>
</div>
<div class="container-fluid main-course-search-nav" style='background-color:#232F3E;'>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3"
                style="background-color: #12576D;border-top-right-radius:7px;border-bottom-right-radius:7px;">
                <div class="container-fluid">
                    <form id="#" method="get" action="#">
                        <input type="text" name="search" value="" placeholder="Search here...">
                        <button type="submit">
                            <span><i class="icon-search"></i></span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-9 row jsutify-content-betwween align-items-center">
                <div class="col"> <a href="http://"> <i class="fas fa-bars"></i> All</a></div>
                <div class="col"><a href="http://"> <i class="fab fa-tumblr"></i> BY TITLE</a></div>
                <div class="col"><a href="http://"> <i class="fas fa-map-marker-alt"></i> BY VENUE</a></div>
                <div class="col"><a href="http://"> <i class="fas fa-calendar"></i> BY DATE</a></div>
                <div class="col"><a href="http://"> <i class="far fa-clock"></i> BY DURATION</a></div>
            </div>
        </div>
    </div>

</div>

<!-- PRODUCT DETAILS AREA START -->
<div class="ltn__product-area ltn__product-gutter mb-120 mt-50">
    <div class="container-fluid">
        <div class="row d-flex flex-column flex-xl-row">
            <div class="col-xl-3 order-xl-1 order-2">
                <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                    <!-- Category Widget -->
                    <div class=" widget main-sidebar-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Fulfilled by BTS</h4>
                        <div class="row justify-content-between">
                            <div class="left-item-filter col-8 ">
                                <input type="checkbox" name="" id=""> <span>All Courses</span>
                            </div>
                            <span class="col-4 row justify-content-center">( 5405 )</span>

                        </div>
                    </div>
                    <div class=" widget main-sidebar-widget Venue mt-35">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Venue</h4>
                        <div class="Venue-menu">
                            <div class="row justify-content-between">
                                <div class="left-item-filter col-12">
                                    <input type="checkbox" name="" id=""> <span>Cairo</span>
                                </div>


                            </div>
                            <div class="row justify-content-between">
                                <div class="left-item-filter col-12">
                                    <input type="checkbox" name="" id=""> <span>Chicago</span>
                                </div>


                            </div>
                            <div class="row justify-content-between">
                                <div class="left-item-filter col-12">
                                    <input type="checkbox" name="" id=""> <span>Copenhagen</span>
                                </div>


                            </div>
                            <div class="row justify-content-between">
                                <div class="left-item-filter col-12">
                                    <input type="checkbox" name="" id=""> <span>Calgary</span>
                                </div>


                            </div>
                            <div class="row justify-content-between">
                                <div class="left-item-filter col-12">
                                    <input type="checkbox" name="" id=""> <span>Cape Town</span>
                                </div>


                            </div>
                            <div class="row justify-content-between">
                                <div class="left-item-filter col-12">
                                    <input type="checkbox" name="" id=""> <span>Canberra</span>
                                </div>


                            </div>
                            <div class="row justify-content-between">
                                <div class="left-item-filter col-12">
                                    <input type="checkbox" name="" id=""> <span>Calgary</span>
                                </div>


                            </div>
                            <div class="row justify-content-between">
                                <div class="left-item-filter col-12">
                                    <input type="checkbox" name="" id=""> <span>Cape Town</span>
                                </div>


                            </div>
                            <div class="row justify-content-between">
                                <div class="left-item-filter col-12">
                                    <input type="checkbox" name="" id=""> <span>Canberra</span>
                                </div>


                            </div>

                        </div>
                    </div>
                    <!-- Price Filter Widget -->
                    <div class=" date-filter main-sidebar-widget mt-35">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Date</h4>
                        <div class="price_filter">
                            <div class="date-range-container">

                                <div class="date-input-group">
                                    <div class="input-date">
                                        <input type="text" class="course-input" placeholder="From"
                                            onfocus="(this.type='date')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="calendar-icon bi bi-calendar"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                    </div>

                                    <span class="separator">-</span>

                                    <div class="input-date">
                                        <input type="text" class="course-input" placeholder="To"
                                            onfocus="(this.type='date')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="calendar-icon bi bi-calendar"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget ltn__tagcloud-widget mt-35">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Training Categories</h4>
                        <ul>
                            <li><a href="#">Online Courses</a></li>
                            <li><a href="#">Soft Skills Category</a></li>
                            <li><a href="#">Information Technology</a></li>
                            <li><a href="#">Technical Category</a></li>
                            <li><a href="#">Certified Courses</a></li>

                        </ul>
                    </div>

                    <div class="row filter-buttons mt-35 p-5">
                        <button class="col-12 filter-btn ">Filter</button>
                        <button class="col-12 tailor-btn mt-15">Tailor Your Course</button>
                    </div>
                </aside>
            </div>

            <div class="col-xl-9 order-xl-2 order-1">
                <div class="ltn__search-course-breadcrumb-area">
                    <div class="row">
                        <h3>Results / <span>0</span></h3>
                        <p>Try to contact us to share your thoughts.</p>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_product_grid">
                        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('front-assets/img/bg/no-result.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<!-- PRODUCT DETAILS AREA END -->

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

                            <button href="" class="theme-btn-1 btn btn-effect-1 text-uppercase w-100">SEE
                                MORE</button>
                        </form>
                    </div>
                    <div class="col-12 col-lg-6 mt-5 mt-lg-0" style="height: max-content;">

                        <div class="contact-us-main-page row flex-column p-3">
                            <div class="">
                                <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                                        src="{{ asset('front-assets/img/icons/hom.png') }}" alt="">
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
                                        <a href="" class="theme-btn-1 btn btn-effect-1 text-uppercase"><img
                                                src="{{ asset('front-assets/img/icons/loc.png') }}" alt="">Location</a>

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
