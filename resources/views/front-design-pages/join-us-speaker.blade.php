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
              <h4 class="second-title">Then, YOU ARE WHO WE’RE LOOKING FOR!</h4>
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

              <form>

                <div class="row mb-3">
                  <div class="col-md-12 mb-3">
                    <label for="dateVenue" class="form-label">select Salutation....</label>
                    <select class="form-select" id="dateVenue" required>
                      <option value="" selected>Select</option>
                      <option value="1">March 15-17, 2025 - New York</option>
                      <option value="2">April 10-12, 2025 - Chicago</option>
                      <option value="3">May 5-7, 2025 - Houston</option>
                    </select>
                  </div>
                </div>

                <!-- Personal Data -->
                <h4 class="section-title f-s-15">Personal Data</h4>
                <div class="row mb-3">
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="First Name" class="form-control" id="salutation" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="Last Name" class="form-control" id="fullName" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="Email Address" class="form-control" id="designation" required>
                  </div>
                </div>
                <h4 class="section-title f-s-15">Contact Information</h4>
                <div class="row mb-3">
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="Adress" class="form-control" id="salutation" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="dateVenue" class="form-label">select country....</label>
                    <select class="form-select" id="dateVenue" required>
                      <option value="" selected>Select</option>
                      <option value="1">March 15-17, 2025 - New York</option>
                      <option value="2">April 10-12, 2025 - Chicago</option>
                      <option value="3">May 5-7, 2025 - Houston</option>
                    </select>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="dateVenue" class="form-label">select</label>
                    <select class="form-select" id="dateVenue" required>
                      <option value="" selected>Select</option>
                      <option value="1">March 15-17, 2025 - New York</option>
                      <option value="2">April 10-12, 2025 - Chicago</option>
                      <option value="3">May 5-7, 2025 - Houston</option>
                    </select>
                  </div>
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="Phone" class="form-control" id="salutation" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <input type="text" placeholder="Mobile" class="form-control" id="salutation" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <textarea name="" rows="10" class="form-control" id="">Other Data</textarea>
                  </div>
                </div>


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
              <input type="checkbox" name="" id="">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Contracts</span>
              <input type="checkbox" name="" id="">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Decommissioning</span>
              <input type="checkbox" name="" id="">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Finance & Accounting</span>
              <input type="checkbox" name="" id="">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Geology & Petrophysics</span>
              <input type="checkbox" name="" id="">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Health & Safety</span>
              <input type="checkbox" name="" id="">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Instrumentation & Automation</span>
              <input type="checkbox" name="" id="">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Risk Management</span>
              <input type="checkbox" name="" id="">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Terminals</span>
              <input type="checkbox" name="" id="">
            </div>
            <div class="checkBox-option-container d-flex justify-content-between">
              <span>Maintenance</span>
              <input type="checkbox" name="" id="">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-12 mb-3">
                <label for="designation" class="form-label required">Upload CV with a clear photo</label>
                <input type="file" class="form-control" id="designation" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="company" class="form-label required">Upload other supporting documents</label>
                <input type="file" class="form-control" id="company" required>
            </div>
          </div>

          </div>
        </div>


      </div>
    </div>
@endsection
