@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'join-us-speaker-page')
@section('page-content')

    <style>
      /* Scoped UI/UX enhancements without changing colors or JS */
      .main-course-bg-header { margin-bottom: 20px; }
      .form-container { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 6px 20px rgba(0,0,0,0.06); }
      .form-title { margin-bottom: 12px; }
      .section-title { margin: 16px 0 8px; }
      .form-label { font-weight: 600; }
      .form-label.required::after { content: " *"; font-weight: 700; }
      .form-control, .form-select, textarea { min-height: 44px; }
      .check-box-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 10px; }
      .checkBox-option-container { border: 1px solid rgba(0,0,0,0.1); border-radius: 10px; padding: 10px 12px; align-items: center; }
      .checkBox-option-container span { font-weight: 500; }
      .checkBox-option-container input[type="checkbox"] { margin-left: 12px; width: 18px; height: 18px; }
      .helper-text { display: block; font-size: 0.875rem; opacity: 0.8; margin-top: 6px; }
      .divider { height: 1px; background: rgba(0,0,0,0.08); margin: 16px 0; border: 0; }
      @media (min-width: 992px) {
        .sticky-aside { position: sticky; top: 20px; }
      }
      #join-us-speaker-page .nice-select, #join-us-speaker-page .form-container input {
        background-color: #efefef;
      }
      .form-select , .ts-control {
        background-color: #efefef !important;

      }
     .slct-city .ts-control {
        border:none !important;
     }
     textarea {
         min-height: 95px;
        }
    </style>
    <!-- Add Tom Select CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">

    <div class="main-course-bg-header">
      <div class="course-main-title text-center">
        <h2>Join Us As Speaker</h2>
      </div>
    </div>

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-30 pb-30">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2 ">
              <h4 class="first-title">Are you highly qualified, experienced and respected in your field of technical
                expertise ?</h4>
              <h4 class="second-title">Then, YOU ARE WHO WE'RE LOOKING FOR!</h4>
              <span class="col-12 col-md-8 f-s-13 m-auto px-0">
                At BTS, commitment to excellence is at the core of everything we do and we are always looking to welcome
                motivated, talented and experienced professionals to support our growth. If you have the passion to
                deliver training courses, seminars and workshops with the highest standards, we invite you to view our
                current openings for experienced trainers below:
              </span>

            </div>

          </div>
        </div>
      </div>

      <div class="container" style="margin-top: 10px;">
        <div class="row">
          <div class="col-12">
            <div class="container form-container">
              <h2 class="form-title f-s-20">Join as a Speaker</h2>
              <p class="helper-text">Please fill in your details below. Fields marked with * are required.</p>

              <form action="{{ route('speaker.application.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12 col-lg-8">
                    <div class="container form-container">
                      <h2 class="form-title f-s-20">1- Personal Details</h2>
                      <div class="row mb-3">
                        <div class="col-md-12 mb-3">
                          <label for="salutation" class="form-label required">Select Salutation</label>
                          <select class="form-select @error('salut_id') is-invalid @enderror" id="salutation" name="salut_id" required>
                            <option value="" selected>Select</option>
                            @foreach($salutations as $salutation)
                              <option value="{{ $salutation->id }}">{{ $salutation->en_name }}</option>
                            @endforeach
                          </select>
                          @error('salut_id')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <!-- Personal Data -->
                      <h4 class="section-title f-s-15">Personal Data</h4>
                      <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                          <label for="first_name" class="form-label required">First Name</label>
                          <input type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" required value="{{ old('first_name') }}">
                          @error('first_name')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="last_name" class="form-label required">Last Name</label>
                          <input type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" required value="{{ old('last_name') }}">
                          @error('last_name')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                          <label for="email" class="form-label required">Email Address</label>
                          <input type="text" placeholder="e.g. name@example.com" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                          @error('email')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <hr class="divider">
                      <h4 class="section-title f-s-15">Contact Information</h4>
                      <div class="row mb-3">
                        <div class="col-md-12 mb-3">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" placeholder="Street, Building, Apartment" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                          @error('address')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="country" class="form-label">Select Country</label>
                          <select class="form-select @error('country') is-invalid @enderror" id="country" name="country">
                            <option value="" selected>Select</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_en_name }}</option>
                            @endforeach
                          </select>
                          @error('country')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3 slct-city">
                          <label for="city" class="form-label">Select City</label>
                          <select class="form-select @error('city') is-invalid @enderror" id="city" name="city">
                            <option value="" selected>Select</option>
                          </select>
                          @error('city')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="phone" class="form-label">Phone</label>
                          <input type="text" placeholder="Landline (optional)" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                          @error('phone')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="mobile" class="form-label">Mobile</label>
                          <input type="text" placeholder="Mobile number" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}">
                          @error('mobile')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                          <label for="other_data" class="form-label">Other Data</label>
                          <textarea name="other_data" rows="6" class="form-control @error('other_data') is-invalid @enderror" id="other_data" placeholder="Tell us anything else relevant (experience highlights, links, etc.)">{{ old('other_data') }}</textarea>
                          @error('other_data')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-4 form-container sticky-aside">
                    <h3 class="mb-2" style="color: #333;border-bottom: 2px solid #4169E1;padding-bottom: 10px;margin-bottom: 30px;display: inline-block;width: fit-content;">2- Your Expertise</h3>
                    <p class="helper-text">Tick one or more options that best match your background.</p>
                    <div class="check-box-container">
                      <div class="checkBox-option-container d-flex justify-content-between">
                        <span>Construction</span>
                        <input type="checkbox" name="expertise[]" value="1">
                      </div>
                      <div class="checkBox-option-container d-flex justify-content-between">
                        <span>Contracts</span>
                        <input type="checkbox" name="expertise[]" value="2">
                      </div>
                      <div class="checkBox-option-container d-flex justify-content-between">
                        <span>Decommissioning</span>
                        <input type="checkbox" name="expertise[]" value="3">
                      </div>
                      <div class="checkBox-option-container d-flex justify-content-between">
                        <span>Finance & Accounting</span>
                        <input type="checkbox" name="expertise[]" value="4">
                      </div>
                      <div class="checkBox-option-container d-flex justify-content-between">
                        <span>Geology & Petrophysics</span>
                        <input type="checkbox" name="expertise[]" value="5">
                      </div>
                      <div class="checkBox-option-container d-flex justify-content-between">
                        <span>Health & Safety</span>
                        <input type="checkbox" name="expertise[]" value="6">
                      </div>
                      <div class="checkBox-option-container d-flex justify-content-between">
                        <span>Instrumentation & Automation</span>
                        <input type="checkbox" name="expertise[]" value="7">
                      </div>
                      <div class="checkBox-option-container d-flex justify-content-between">
                        <span>Risk Management</span>
                        <input type="checkbox" name="expertise[]" value="8">
                      </div>
                      <div class="checkBox-option-container d-flex justify-content-between">
                        <span>Terminals</span>
                        <input type="checkbox" name="expertise[]" value="9">
                      </div>
                      <div class="checkBox-option-container d-flex justify-content-between">
                        <span>Maintenance</span>
                        <input type="checkbox" name="expertise[]" value="10">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12 mb-3">
                        <label for="cv_file" class="form-label required">Upload CV with a clear photo</label>
                        <input type="file" class="form-control @error('cv_file') is-invalid @enderror" id="cv_file" name="cv_file" required>
                        <small class="helper-text">Accepted formats: PDF, DOCX. Max size as per site limits.</small>
                        @error('cv_file')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="supporting_docs" class="form-label">Upload other supporting documents</label>
                        <input type="file" class="form-control @error('supporting_docs') is-invalid @enderror" id="supporting_docs" name="supporting_docs">
                        <small class="helper-text">Certificates, portfolios, references, etc. (optional)</small>
                        @error('supporting_docs')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row mt-4">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="border-radius: 6px; padding: 10px 20px; min-width: 160px;">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Tom Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('Document ready');

            // Initialize Tom Select for the city dropdown
            let citySelect = null;
            const cityElement = document.getElementById('city');

            if (cityElement) {
                try {
                    citySelect = new TomSelect(cityElement, {
                        create: false,
                        sortField: {
                            field: "text",
                            direction: "asc"
                        }
                    });
                } catch (e) {
                    console.error('Error initializing Tom Select:', e);
                }
            } else {
                console.error('City element not found');
            }

            // Get CSRF token from meta tag
            const token = $('meta[name="csrf-token"]').attr('content');

            $('#country').change(function() {
                var countryId = $(this).val();
                console.log('Country changed:', countryId);

                if (countryId) {
                    $.ajax({
                        url: "{{ route('fetch.venues') }}",
                        type: "GET",
                        data: {
                            country_id: countryId
                        },
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log('AJAX success:', response);

                            // Clear the dropdown
                            if (citySelect) {
                                citySelect.clear();
                                citySelect.clearOptions();
                            } else {
                                $('#city').empty();
                            }

                            // Add the default option
                            if (citySelect) {
                                citySelect.addOption({value: '', text: 'Select'});
                            } else {
                                $('#city').append('<option value="">Select</option>');
                            }

                            // Add each venue as an option
                            if (response.success && response.venues) {
                                $.each(response.venues, function(index, venue) {
                                    if (citySelect) {
                                        citySelect.addOption({
                                            value: venue.id,
                                            text: venue.venue_en_name
                                        });
                                    } else {
                                        $('#city').append('<option value="' + venue.id + '">' + venue.venue_en_name + '</option>');
                                    }
                                });
                            }

                            // Log after update
                            console.log('City select updated:', $('#city').html());
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', error);
                            console.error('Response:', xhr.responseText);
                            if (citySelect) {
                                citySelect.clear();
                                citySelect.addOption({value: '', text: 'Error loading cities'});
                            } else {
                                $('#city').html('<option value="">Error loading cities</option>');
                            }
                        }
                    });
                } else {
                    if (citySelect) {
                        citySelect.clear();
                        citySelect.addOption({value: '', text: 'Select'});
                    } else {
                        $('#city').html('<option value="">Select</option>');
                    }
                }
            });
        });
    </script>
@endsection
