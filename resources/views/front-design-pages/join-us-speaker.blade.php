@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'join-us-speaker-page')
@section('page-content')

    <!-- Add Tom Select CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">

    <div class="main-course-bg-header">
      <div class="course-main-title text-center">
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
          <div class="col-12">
            <div class="container form-container">
              <h2 class="form-title f-s-20">Personal Details</h2>

              <form action="{{ route('speaker.application.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12 col-lg-8">
                    <div class="container form-container">
                      <h2 class="form-title f-s-20">Personal Details</h2>
                      <div class="row mb-3">
                        <div class="col-md-12 mb-3">
                          <label for="salutation" class="form-label">select Salutation....</label>
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
                        <div class="col-md-12 mb-3">
                          <input type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" required value="{{ old('first_name') }}">
                          @error('first_name')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                          <input type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" required value="{{ old('last_name') }}">
                          @error('last_name')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                          <input type="text" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                          @error('email')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <h4 class="section-title f-s-15">Contact Information</h4>
                      <div class="row mb-3">
                        <div class="col-md-12 mb-3">
                          <input type="text" placeholder="Address" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                          @error('address')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                          <label for="country" class="form-label">select country....</label>
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
                        <div class="col-md-12 mb-3">
                          <label for="city" class="form-label">select city</label>
                          <select class="form-select @error('city') is-invalid @enderror" id="city" name="city">
                            <option value="" selected>Select</option>
                          </select>
                          @error('city')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                          <input type="text" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                          @error('phone')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                          <input type="text" placeholder="Mobile" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}">
                          @error('mobile')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                          <textarea name="other_data" rows="10" class="form-control @error('other_data') is-invalid @enderror" id="other_data" placeholder="Other Data">{{ old('other_data') }}</textarea>
                          @error('other_data')
                              <div class="invalid-feedback d-block">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-4 form-container">
                    <h3 class="mb-4">What are your expertise?</h3>
                    <h3 class="mb-4">>> Tick 1 Or More</h3>
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
                        @error('cv_file')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="supporting_docs" class="form-label required">Upload other supporting documents</label>
                        <input type="file" class="form-control @error('supporting_docs') is-invalid @enderror" id="supporting_docs" name="supporting_docs">
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
                    <button type="submit" class="btn btn-primary" style="border-radius: 6px;">Submit </button>
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
