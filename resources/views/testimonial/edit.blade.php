@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Testimonials</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Testimonials</li>

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
            @if($errors->any())
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
        action="{{ route('testimonial.update', $row->id) }}" method="post" enctype="multipart/form-data">
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
                            <!--begin::Input group-->
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="required form-label">  Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="reviewer_name" type="text" class="form-control @error('reviewer_name') is-invalid @enderror" name="reviewer_name" value="{{ $row->reviewer_name }}" required autocomplete="reviewer_name" autofocus>

                                @error('reviewer_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                            <!--end::Input-->

                               <!--begin::Input group-->
                               <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="required form-label">Rate</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="reviewer_star_rate" type="text" min="1" max="5" class="form-control @error('reviewer_star_rate') is-invalid @enderror" name="reviewer_star_rate" value="{{ $row->reviewer_star_rate }}" required autocomplete="reviewer_star_rate">

                                @error('reviewer_star_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input-->
                            </div>

                               <!--begin::Input group-->
                               <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="required form-label">FeedBack</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea id="reviewer_text" class="form-control @error('reviewer_text') is-invalid @enderror" name="reviewer_text"   >{{ $row->reviewer_text }}</textarea>

                                @error('reviewer_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input-->

 </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->


                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('testimonial.index') }}" id="kt_ecommerce_add_product_cancel"
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
<script></script>

@endsection
