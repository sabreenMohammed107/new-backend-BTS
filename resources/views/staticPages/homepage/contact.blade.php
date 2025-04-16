@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Contact</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Contact</li>
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

            <form class="form d-flex flex-column flex-lg-row" action="{{ route('homeContactUpdate') }}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="small_description" value="{{ $row->small_description }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Details</label>
                                        <input type="text" class="form-control" name="details" value="{{ $row->details }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Facebook</label>
                                        <input type="text" class="form-control" name="details2" value="{{ $row->details2 }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">linkedin</label>
                                        <input type="text" class="form-control" name="details3" value="{{ $row->details3 }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">X</label>
                                        <input type="text" class="form-control" name="details4" value="{{ $row->details4 }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">instagram</label>
                                        <input type="text" class="form-control" name="details5" value="{{ $row->details5 }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::General options-->

                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('homeContactView') }}" class="btn btn-light me-5">Cancel</a>
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
