@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Branches</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Branches</li>

                    <li class="breadcrumb-item text-dark">All</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->

        </div>
    </div>
@endsection

@section('content')
    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -31px;
            position: relative;
            z-index: 2;
            padding: 0 10px;
            font-size: 20px;
        }
    </style>
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container-xxl">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <p><strong> Something went wrong</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                action="{{ route('branches.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="required form-label"> Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="branch_name" type="text"
                                    class="form-control @error('branch_name') is-invalid @enderror" name="branch_name"
                                    value="{{ old('branch_name') }}" required autocomplete="branch_name" autofocus>

                                @error('branch_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                            <!--end::Input-->

                            <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="required form-label">Address</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                        </div>
                            <!--end::Input-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-wrap gap-5 mt-4">
                                    <div class="fv-row w-100 flex-md-root">
                                        <!--begin::Label-->
                                        <label class="required form-label"> Office phone</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input id="office_phone" type="text"
                                            class="form-control @error('office_phone') is-invalid @enderror"
                                            name="office_phone" value="{{ old('office_phone') }}" required
                                            autocomplete="office_phone" autofocus>

                                        @error('office_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                    </div>
                                    <!--end::Input-->

                                    <!--begin::Input group-->
                                    <div class="fv-row w-100 flex-md-root">
                                        <!--begin::Label-->
                                        <label class="required form-label">Mobile</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input id="mobile" type="text"
                                            class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                            value="{{ old('mobile') }}" required autocomplete="mobile">

                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                    </div>
                                    <!--end::Input-->
                                </div>
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-wrap gap-5 mt-4">
                                        <div class="fv-row w-100 flex-md-root">
                                            <!--begin::Label-->
                                            <label class="required form-label"> email</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        </div>
                                        <!--end::Input-->

                                        <!--begin::Input group-->
                                        <div class="fv-row w-100 flex-md-root">
                                            <!--begin::Label-->
                                            <label class="required form-label">Map location</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="map_location" type="text"
                                                class="form-control @error('map_location') is-invalid @enderror"
                                                name="map_location" value="{{ old('map_location') }}" required
                                                autocomplete="map_location">

                                            @error('map_location')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class="d-flex flex-wrap gap-5 mt-4">
                                        <div class="fv-row w-100 flex-md-root">
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <option value="">Country..</option>
                                            {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                        </label>
                                        <select name="country_id" class="form-select form-select-solid  dynamic"
                                            data-control="select2" data-show-subtext="true" data-live-search="true"
                                            id="country" data-dependent="state">
                                            <option value="">select....</option>
                                            @foreach ($countries as $country)
                                                <option value='{{ $country->id }}'>
                                                    {{ $country->country_en_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                        <div class="fv-row w-100 flex-md-root">
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <option value="">Select Venue..</option>
                                            {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                        </label>
                                        <select name="venue_id" class="form-select form-select-solid "
                                            data-control="select2" data-show-subtext="true" data-live-search="true"
                                            id="state">
                                            <option value="">select....</option>

                                        </select>
                                    </div>
                                </div>
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->


                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <a href="{{ route('branches.index') }}" id="kt_ecommerce_add_product_cancel"
                                    class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $('.dynamic').change(function() {

                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{ route('dynamicdependent.fetch') }}",
                        method: "GET",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dependent: dependent
                        },
                        success: function(result) {

                            $('#state').html(result);

                        }

                    })
                }
            });




        });
    </script>
@endsection
