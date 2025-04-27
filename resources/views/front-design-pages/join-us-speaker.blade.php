@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'join-us-speaker-page')
@section('page-content')

    <div class="main-course-bg-header">
      <div class="course-main-title">
        <h2>Join Us AS SPEAKER</h2>
      </div>
    </div>

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2 ">
              <h4 class="first-title">Are you highly qualified, experienced and respected in your field of technical
                expertise ?</h4>
              <h4 class="second-title">Then, YOU ARE WHO WE'RE LOOKING FOR!</h4>
              <span class="col-12 col-md-8 g-clr f-s-13 m-auto">
                At BTS, commitment to excellence is at the core of everything we do and we are always looking to welcome
                motivated, talented and experienced professionals to support our growth. If you have the passion to
                deliver training courses, seminars and workshops with the highest standards, we invite you to view our
                current openings for experienced trainers below:
              </span>

            </div>

          </div>
        </div>
      </div>

      <div class="container" style="margin-top: 70px;">
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="container form-container">
              <h2 class="form-title f-s-20">Personal Details</h2>

              <form action="{{ route('speaker.application.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <div class="col-md-12 mb-3">
                    <label for="salutation" class="form-label">select Salutation....</label>
                    <select class="form-select" id="salutation" name="salutation" required>
                      <option value="" selected>Select</option>
                      <option value="Mr">Mr</option>
                      <option value="Mrs">Mrs</option>
                      <option value="Ms">Ms</option>
                      <option value="Dr">Dr</option>
                      <option value="Prof">Prof</option>
                    </select>
                    @error('salutation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Personal Data -->
                <h4 class="section-title f-s-15">Personal Data</h4>
                <div class="row mb-3">
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="First Name" class="form-control" id="first_name" name="first_name" required value="{{ old('first_name') }}">
                    @error('first_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="Last Name" class="form-control" id="last_name" name="last_name" required value="{{ old('last_name') }}">
                    @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="Email Address" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <h4 class="section-title f-s-15">Contact Information</h4>
                <div class="row mb-3">
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="Address" class="form-control" id="address" name="address" value="{{ old('address') }}">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="country" class="form-label">select country....</label>
                    <select class="form-select" id="country" name="country">
                      <option value="" selected>Select</option>
                      <option value="United States">United States</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="Canada">Canada</option>
                      <option value="UAE">UAE</option>
                      <option value="Saudi Arabia">Saudi Arabia</option>
                      <option value="Other">Other</option>
                    </select>
                    @error('country')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="city" class="form-label">select city</label>
                    <select class="form-select" id="city" name="city">
                      <option value="" selected>Select</option>
                      <option value="New York">New York</option>
                      <option value="London">London</option>
                      <option value="Dubai">Dubai</option>
                      <option value="Riyadh">Riyadh</option>
                      <option value="Other">Other</option>
                    </select>
                    @error('city')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="Phone" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="Mobile" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}">
                    @error('mobile')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-12 mb-3">
                    <textarea name="other_data" rows="10" class="form-control" id="other_data" placeholder="Other Data">{{ old('other_data') }}</textarea>
                    @error('other_data')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row mt-4">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="border-radius: 6px;">Submit </button>
                  </div>
                </div>
              </form>
            </div>



          </div>
          <div class="col-12 col-lg-4 form-container">

            <h3 class="mb-4">What are your expertise?</h3>
            <h3 class="mb-4">>> Tick 1 Or More</h3>
          <div class="check-box-container">

            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Construction</span>
              <input type="checkbox" name="expertise[]" value="Construction">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Contracts</span>
              <input type="checkbox" name="expertise[]" value="Contracts">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Decommissioning</span>
              <input type="checkbox" name="expertise[]" value="Decommissioning">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Finance & Accounting</span>
              <input type="checkbox" name="expertise[]" value="Finance & Accounting">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Geology & Petrophysics</span>
              <input type="checkbox" name="expertise[]" value="Geology & Petrophysics">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Health & Safety</span>
              <input type="checkbox" name="expertise[]" value="Health & Safety">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Instrumentation & Automation</span>
              <input type="checkbox" name="expertise[]" value="Instrumentation & Automation">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Risk Management</span>
              <input type="checkbox" name="expertise[]" value="Risk Management">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Terminals</span>
              <input type="checkbox" name="expertise[]" value="Terminals">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Maintenance</span>
              <input type="checkbox" name="expertise[]" value="Maintenance">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-12 mb-3">
                <label for="cv_file" class="form-label required">Upload CV with a clear photo</label>
                <input type="file" class="form-control" id="cv_file" name="cv_file" required>
                @error('cv_file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="supporting_docs" class="form-label required">Upload other supporting documents</label>
                <input type="file" class="form-control" id="supporting_docs" name="supporting_docs">
                @error('supporting_docs')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
          </div>

          </div>
        </div>


      </div>
    </div>
@endsection
