<style>
    /* Contact Us Button Phone Icon Hover Effect */
    .theme-btn-1.btn-effect-1 img {
        transition: filter 0.3s ease;
    }

    .theme-btn-1.btn-effect-1:hover img {
        filter: brightness(0);
    }
</style>

    <!-- FEATURE AREA START ( Feature - 3) -->
    {{-- @if ($message = Session::get('message'))
    <div id="alertDiv" class="alert alert-info alert-block">
        <strong style="color:black;font-weight:bold">{{ $message }}</strong>
    </div>
@endif --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50"  style="padding-left: 15px;padding-right: 15px;">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-title-area ltn__section-title-2 "  style="color: #000 !important;">
                <h1 class="section-title text-center"   style="color: #000 !important;">{{ $staticContact->small_description }}</h1>
                <span class="col-12 col-md-8 pl-0" style="color: black;font-size:16px;padding-left:0">{!! $staticContact->details !!}</span>

              </div>
              <div class="row">
                <div class="col-12 col-lg-6" style="height: max-content;">
                  <form id="contact-form main-page-form" action="{{url('/sendMessage')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 my-3">
                        <div class="input-item input-item-name ltn__custom-icon">
                          <input type="text" name="sender_name" value="{{ old('sender_name') }}" placeholder="Your Name">
                        </div>
                      </div>
                      <div class="col-md-6 my-3">
                        <div class="input-item input-item-email ltn__custom-icon">
                          <input type="email" name="sender_email"  value="{{ old('sender_email') }}" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="col-md-6 my-3">
                        <div class="input-item input-item-phone ltn__custom-icon">
                          <input type="text" name="mobile" name="sender_mobile" value="{{ old('sender_mobile') }}" placeholder="Mobile Number">
                        </div>
                      </div>
                      <div class="col-md-6 my-3">
                        <div class="input-item input-item-email ltn__custom-icon">
                          <input type="text" name="title" name="sender_subject" value="{{ old('sender_subject') }}" placeholder="Subject">
                        </div>
                      </div>
                    </div>
                    <div class="input-item input-item-textarea ltn__custom-icon my-3">
                      <textarea name="message" placeholder="Your Message">{{ old('sender_message') }}</textarea>
                    </div>

                    <p class="form-messege mb-0 mt-20"></p>

                    <button href="" type="submit" class="theme-btn-1 btn btn-effect-1  w-100">Send
                      Message</button>
                  </form>
                </div>
                @isset($branch)
                  <div class="col-12 col-lg-6 mt-5 mt-lg-0" style="height: max-content;padding-top:17px">

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
                                                    Hours</div>
                                                <span>{{ $branch->working_hour ?? '' }}</span>
                                            </div>
                                            <div class="col-12 col-lg-6 text-lg-end" style="padding-top: 17px;">
                                                <a href="{{ route('contact-us') }}"
                                                    class="theme-btn-1 btn btn-effect-1 "><img
                                                        src="{{ asset('front-assets/img/icons/phone.png') }}"
                                                        alt="">Contact Us</a>

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
