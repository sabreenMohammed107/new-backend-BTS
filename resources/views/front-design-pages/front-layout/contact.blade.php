
    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-title-area ltn__section-title-2 text-center">
                <h1 class="section-title">{{ $staticContact->small_description }}</h1>
                <span class="col-12 col-md-8  fnt-siz-sm g-clr ">{!! $staticContact->details !!}</span>

              </div>
              <div class="row">
                <div class="col-12 col-lg-6" style="height: max-content;">
                  <form id="contact-form main-page-form" action="{{url('/sendMessage')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 my-3">
                        <div class="input-item input-item-name ltn__custom-icon">
                          <input type="text" name="sender_name" value="{{ old('sender_name') }}" placeholder="Enter your name">
                        </div>
                      </div>
                      <div class="col-md-6 my-3">
                        <div class="input-item input-item-email ltn__custom-icon">
                          <input type="email" name="sender_email"  value="{{ old('sender_email') }}" placeholder="Enter email address">
                        </div>
                      </div>
                      <div class="col-md-6 my-3">
                        <div class="input-item input-item-phone ltn__custom-icon">
                          <input type="text" name="mobile" name="sender_mobile" value="{{ old('sender_mobile') }}" placeholder="Enter mobile number">
                        </div>
                      </div>
                      <div class="col-md-6 my-3">
                        <div class="input-item input-item-email ltn__custom-icon">
                          <input type="text" name="title" name="sender_subject" value="{{ old('sender_subject') }}" placeholder="Enter message title">
                        </div>
                      </div>
                    </div>
                    <div class="input-item input-item-textarea ltn__custom-icon my-3">
                      <textarea name="message" placeholder="Enter message">{{ old('sender_message') }}</textarea>
                    </div>

                    <p class="form-messege mb-0 mt-20"></p>

                    <button href="" type="submit" class="theme-btn-1 btn btn-effect-1 text-uppercase w-100">SEE
                      MORE</button>
                  </form>
                </div>
                @isset($branch)
                  <div class="col-12 col-lg-6 mt-5 mt-lg-0" style="height: max-content;">

                                <div class="contact-us-main-page row flex-column p-3">
                                    <div class="">
                                        <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                                                src="{{ asset('front-assets/img/icons/hom.png') }}" alt="">
                                            {{ $branch->country->country_en_name ?? '' }}
                                        </div>
                                        <span> {{ $branch->address ?? '' }}</span>
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
                                                src="{{ asset('front-assets/img/icons/mail.png') }}" alt="">E-mail
                                        </div>
                                        <span>{{ $branch->email ?? '' }}</span>
                                    </div>
                                    <div class="pt-3">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="title-of-contact-us d-flex align-items-center"><img class="pr-2"
                                                        src="{{ asset('front-assets/img/icons/time.png') }}"
                                                        alt="">Working
                                                    hours</div>
                                                <span>{{ $branch->working_hour ?? '' }}</span>
                                            </div>
                                            <div class="col-12 col-lg-6 text-end">
                                                <a href="{{ route('contact-us') }}"
                                                    class="theme-btn-1 btn btn-effect-1 text-uppercase"><img
                                                        src="{{ asset('front-assets/img/icons/loc.png') }}"
                                                        alt="">Location</a>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                   </div>
                        @endisset

              </div>
            </div>
          </div>
        </div>
      </div>
