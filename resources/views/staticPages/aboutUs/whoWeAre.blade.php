@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Who we are</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Who we are</li>
                    <li class="breadcrumb-item text-dark">Update</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
        </div>
    </div>
@endsection

@section('content')
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <div class="container-xxl">
            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Something went wrong</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form d-flex flex-column flex-lg-row" action="{{ route('whoWeAreUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General Information</h2>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <!-- Row 1: Small Description & Details -->
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Small Description</label>
                                        <textarea   class="form-control" name="small_description" >{{ $row->small_description }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Details</label>
                                        <textarea   class="form-control tinymce-editor" name="details" >{{ $row->details }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2: Image Upload Fields -->
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">details 2</label>
                                        <textarea   class="form-control tinymce-editor" name="details2" >{{ $row->details2 }}</textarea>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label class="form-label">details 3 </label>
                                        <textarea   class="form-control tinymce-editor" name="details3" >{{ $row->details3 }}</textarea>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <label class="form-label">youtube link</label>
                                        <input type="text" class="form-control" name="details4" value="{{ $row->details4 }}" />
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end::General options-->

                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('whoWeAreView') }}" class="btn btn-light me-5">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Main column-->
            </form>
        </div>
    </div>
    <!--end::Post-->
@endsection
