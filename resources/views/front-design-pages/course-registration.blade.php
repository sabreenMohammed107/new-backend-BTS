@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'single-course-page')
@section('page-content')

    <!-- Utilize Mobile Menu End -->
    <div class="main-course-bg-header">
      <!-- <div class="share-icon">
        <i class="fas fa-share-alt-square"></i>
      </div> -->
      <div class="course-main-title">
        <h2>Course Registration</h2>
      </div>
    </div>
    <div class="container" style="margin-top: 70px;">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="container form-container">
            <h2 class="form-title f-s-20">Course Registration Form</h2>

            <form>
                <!-- Course Details -->
                <h4 class="section-title f-s-15">Course Details</h4>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="courseCode" class="form-label">Code:</label>
                        <br>
                        <span class="courseCode">MI209-02</span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12 mb-3">
                        <label for="courseTitle" class="form-label">Title:</label>
                        <br>
                        <span class="courseCode">Maintenance & Operation Of Rotating Equipment</span>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 mb-3">
                        <label for="dateVenue" class="form-label">Date & Venue:</label>
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
                    <div class="col-md-6 mb-3">
                        <label for="salutation" class="form-label required">Salutation</label>
                        <input type="text" class="form-control" id="salutation" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fullName" class="form-label required">Full Name</label>
                        <input type="text" class="form-control" id="fullName" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="designation" class="form-label required">Designation</label>
                        <input type="text" class="form-control" id="designation" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="company" class="form-label required">Company</label>
                        <input type="text" class="form-control" id="company" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label required">Address</label>
                        <input type="text" class="form-control" id="address" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label required">Phone</label>
                        <input type="tel" class="form-control" id="phone" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="country" class="form-label required">Country</label>
                        <input type="text" class="form-control" id="country" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label required">City</label>
                        <input type="text" class="form-control" id="city" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label required">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fax" class="form-label required">Fax</label>
                        <input type="text" class="form-control" id="fax" required>
                    </div>
                </div>

                <!-- Payment Details -->
                <h4 class="section-title f-s-15">Payment Details</h4>
                <div class="row mb-3">
                    <div class="col-md-12 mb-3">
                        <label for="paymentMethod" class="form-label required">Payment Method</label>
                        <select class="form-select" id="paymentMethod" required>
                            <option value="" selected>Please Select Payment Mode</option>
                            <option value="credit">Credit Card</option>
                            <option value="bank">Bank Transfer</option>
                            <option value="check">Check</option>
                        </select>
                    </div>
                </div>
                <h4 class="section-title f-s-15">Billing Details</h4>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="salutation" class="form-label required">Salutation</label>
                        <input type="text" class="form-control" id="salutation" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fullName" class="form-label required">Full Name</label>
                        <input type="text" class="form-control" id="fullName" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="designation" class="form-label required">Designation</label>
                        <input type="text" class="form-control" id="designation" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="company" class="form-label required">Company</label>
                        <input type="text" class="form-control" id="company" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label required">Address</label>
                        <input type="text" class="form-control" id="address" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label required">Phone</label>
                        <input type="tel" class="form-control" id="phone" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="country" class="form-label required">Country</label>
                        <input type="text" class="form-control" id="country" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label required">City</label>
                        <input type="text" class="form-control" id="city" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label required">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fax" class="form-label required">Fax</label>
                        <input type="text" class="form-control" id="fax" required>
                    </div>
                  </div>
                  <h4 class="section-title f-s-15">Terms & Conditions</h4>
                  <div class="col-12 mb-3 d-flex">
                      <input type="checkbox" id="Conditions" required>
                      <label for="fax" class="form-label required" style="padding-top: 6px;"> I accept the Terms & Conditions</label>
                  </div>
                  <p class="termsAndConditio">
                    Terms & Conditions of Registration
                  </p>
                <!-- Submit Button -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" style="border-radius: 6px;">Submit </button>

                    </div>
                </div>
            </form>
          </div>



        </div>
        <div class="col-12 col-lg-6">

            <h3 class="mb-4">Popular Courses</h3>
            <div class="row popular-courses">
              <div class="col-12 col-sm-6">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                  <div class="product-img">
                      <a  class="img-container" href=""><img height="100%" src="{{ asset('front-assets/img/bg/bb.png') }}" alt="#"></a>
                      <div class="course-badge">
                          <div class="row">
                              <div class="col-12">
                                  <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                              </div>

                              <div class="col-12 row">
                                  <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                  </div>
                                  <div class="col-2 mb-2">
                                      <span class="icon-arrow">
                                          <a href=""><i class="fa fa-arrow-right white-color"></i></a>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                  <div class="product-img">
                      <a  class="img-container" href=""><img height="100%" src="{{ asset('front-assets/img/bg/bb.png') }}" alt="#"></a>
                      <div class="course-badge">
                          <div class="row">
                              <div class="col-12">
                                  <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                              </div>

                              <div class="col-12 row">
                                  <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                  </div>
                                  <div class="col-2 mb-2">
                                      <span class="icon-arrow">
                                          <a href=""><i class="fa fa-arrow-right white-color"></i></a>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                  <div class="product-img">
                      <a  class="img-container" href=""><img height="100%" src="{{ asset('front-assets/img/bg/bb.png') }}" alt="#"></a>
                      <div class="course-badge">
                          <div class="row">
                              <div class="col-12">
                                  <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                              </div>

                              <div class="col-12 row">
                                  <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                  </div>
                                  <div class="col-2 mb-2">
                                      <span class="icon-arrow">
                                          <a href=""><i class="fa fa-arrow-right white-color"></i></a>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                  <div class="product-img">
                      <a  class="img-container" href=""><img height="100%" src="{{ asset('front-assets/img/bg/bb.png') }}" alt="#"></a>
                      <div class="course-badge">
                          <div class="row">
                              <div class="col-12">
                                  <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                              </div>

                              <div class="col-12 row">
                                  <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                  </div>
                                  <div class="col-2 mb-2">
                                      <span class="icon-arrow">
                                          <a href=""><i class="fa fa-arrow-right white-color"></i></a>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                  <div class="product-img">
                      <a  class="img-container" href=""><img height="100%" src="{{ asset('front-assets/img/bg/bb.png') }}" alt="#"></a>
                      <div class="course-badge">
                          <div class="row">
                              <div class="col-12">
                                  <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                              </div>

                              <div class="col-12 row">
                                  <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                  </div>
                                  <div class="col-2 mb-2">
                                      <span class="icon-arrow">
                                          <a href=""><i class="fa fa-arrow-right white-color"></i></a>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                  <div class="product-img">
                      <a  class="img-container" href=""><img height="100%" src="{{ asset('front-assets/img/bg/bb.png') }}" alt="#"></a>
                      <div class="course-badge">
                          <div class="row">
                              <div class="col-12">
                                  <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                              </div>

                              <div class="col-12 row">
                                  <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                  </div>
                                  <div class="col-2 mb-2">
                                      <span class="icon-arrow">
                                          <a href=""><i class="fa fa-arrow-right white-color"></i></a>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                  <div class="product-img">
                      <a  class="img-container" href=""><img height="100%" src="{{ asset('front-assets/img/bg/bb.png') }}" alt="#"></a>
                      <div class="course-badge">
                          <div class="row">
                              <div class="col-12">
                                  <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                              </div>

                              <div class="col-12 row">
                                  <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                  </div>
                                  <div class="col-2 mb-2">
                                      <span class="icon-arrow">
                                          <a href=""><i class="fa fa-arrow-right white-color"></i></a>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                  <div class="product-img">
                      <a  class="img-container" href=""><img height="100%" src="{{ asset('front-assets/img/bg/bb.png') }}" alt="#"></a>
                      <div class="course-badge">
                          <div class="row">
                              <div class="col-12">
                                  <h3 class='white-color'>Advanced Drilling Best Practices</h3>
                              </div>

                              <div class="col-12 row">
                                  <div class="col-10 white-color bottom-title">Dubai - UAE | 24 Nov, 2024
                                  </div>
                                  <div class="col-2 mb-2">
                                      <span class="icon-arrow">
                                          <a href=""><i class="fa fa-arrow-right white-color"></i></a>
                                      </span>
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
