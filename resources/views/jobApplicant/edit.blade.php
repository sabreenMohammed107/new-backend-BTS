@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2"> Jobs Applicants</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted"> Jobs Applicants</li>

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
                action="{{ route('jobApplicant.update', $row->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class=" form-label"> Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $row->name }}"  autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class=" form-label"> Jib title</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="carrer_level_id" type="text"
                                        class="form-control @error('carrer_level_id') is-invalid @enderror"
                                        name="carrer_level_id" value="{{ $row->career->job_name ?? '' }}"
                                        autocomplete="carrer_level_id" autofocus>

                                    @error('carrer_level_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                            </div>
                            <!--end::Input group-->
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class=" form-label"> Email</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" email="email"
                                        value="{{ $row->email }}"  autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class=" form-label"> Career Level</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="carrer_level_id" type="text"
                                        class="form-control @error('carrer_level_id') is-invalid @enderror"
                                        name="carrer_level_id" value="{{ $row->level->level ?? '' }}"
                                        autocomplete="carrer_level_id" autofocus>

                                    @error('carrer_level_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class=" form-label"> Mobile</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="mobile" type="text"
                                        class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                        value="{{ $row->mobile }}"  autocomplete="mobile" autofocus>

                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class=" form-label">Salery</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="expected_salary" type="text"
                                        class="form-control @error('expected_salary') is-invalid @enderror"
                                        name="expected_salary" value="{{ $rowexpected_salary ?? '' }}"
                                        autocomplete="expected_salary" autofocus>

                                    @error('expected_salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                            </div>
                            <!--begin::Input group-->
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="form-label"> CV</label>
                                    <!--end::Label-->
                                    <a href="{{ asset('uploads/applicant') }}/{{ $row->cv_path }}" dawnload>   <i class="fa fa-download"></i> Download</a>

                                </div>
                            <!--end::Input group-->
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label"> Document</label>
                                    <!--end::Label-->
                                    <a href="{{ asset('uploads/applicant') }}/{{ $row->doc_path }}" dawnload>   <i class="fa fa-download"></i> Download</a>

                                </div>
                            </div>
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->


                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('jobApplicant.index') }}" id="kt_ecommerce_add_product_cancel"
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
