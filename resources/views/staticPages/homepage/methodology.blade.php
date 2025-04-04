@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Methodology</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Methodology</li>
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

            <form class="form d-flex flex-column flex-lg-row" action="{{ route('homeMethodologyUpdate') }}" method="POST" enctype="multipart/form-data">
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

                            <!-- Row 2: Image Upload Fields -->
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Image 1</label>
                                        <input type="file" class="form-control" name="details2">
                                        @if(isset($row->details2) && $row->details2)
                                        <div class="mt-2">
                                            <img src="{{ asset( $row->details2) }}" width="50" height="50" alt="Image">
                                            <a href="{{ asset( $row->details2) }}" target="_blank">View</a>
                                        </div>
                                    @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Image 2</label>
                                        <input type="file" class="form-control" name="details3">
                                        @if(isset($row->details3) && $row->details3)
                                        <div class="mt-2">
                                            <img src="{{ asset( $row->details3) }}" width="50" height="50" alt="Image">
                                            <a href="{{ asset( $row->details3) }}" target="_blank">View</a>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3: Image Upload Fields -->
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Image 3</label>
                                        <input type="file" class="form-control" name="details4">
                                        @if(isset($row->details4) && $row->details4)
                                        <div class="mt-2">
                                            <img src="{{ asset( $row->details4) }}" width="50" height="50" alt="Image">
                                            <a href="{{ asset( $row->details4) }}" target="_blank">View</a>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                                    <div class="mb-10 fv-row">
                                        <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Competency-Based Training</label>
                                        <input type="text" class="form-control" name="details5" value="{{ $row->details5 }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Icon 1</label>
                                        <input type="file" class="form-control" name="details6">
                                        @if(isset($row->details6) && $row->details6)
                                        <div class="mt-2">
                                            <img src="{{ asset( $row->details6) }}" width="50" height="50" alt="Image">
                                            <a href="{{ asset( $row->details6) }}" target="_blank">View</a>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Row 4: Training Methods & Icons -->
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Games-Based Training</label>
                                        <input type="text" class="form-control" name="details7" value="{{ $row->details7 }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Icon 2</label>
                                        <input type="file" class="form-control" name="details8">
                                        @if(isset($row->details8) && $row->details8)
                                        <div class="mt-2">
                                            <img src="{{ asset( $row->details8) }}" width="50" height="50" alt="Image">
                                            <a href="{{ asset( $row->details8) }}" target="_blank">View</a>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Row 5: Additional Training Methods -->
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Simulation</label>
                                        <input type="text" class="form-control" name="details9" value="{{ $row->details9 }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Icon 3</label>
                                        <input type="file" class="form-control" name="details10">
                                        @if(isset($row->details10) && $row->details10)
                                        <div class="mt-2">
                                            <img src="{{ asset( $row->details10) }}" width="50" height="50" alt="Image">
                                            <a href="{{ asset( $row->details10) }}" target="_blank">View</a>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Row 6: Practical Training & Icons -->
                            <div class="mb-10 fv-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Practical</label>
                                        <input type="text" class="form-control" name="details11" value="{{ $row->details11 }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Icon 4</label>
                                        <input type="file" class="form-control" name="details12">
                                        @if(isset($row->details12) && $row->details12)
                                        <div class="mt-2">
                                            <img src="{{ asset( $row->details12) }}" width="50" height="50" alt="Image">
                                            <a href="{{ asset( $row->details12) }}" target="_blank">View</a>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::General options-->

                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('homeMethodologyView') }}" class="btn btn-light me-5">Cancel</a>
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
