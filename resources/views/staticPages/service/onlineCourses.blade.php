@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <h1 class="text-dark fw-bolder my-1 fs-2">Online Courses</h1>
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Online Courses</li>
                    <li class="breadcrumb-item text-dark">Update</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
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

            @if(session('Success'))
                <div class="alert alert-success">
                    {{ session('Success') }}
                </div>
            @endif

            <form class="form d-flex flex-column flex-lg-row" action="{{ route('onlineCoursesUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Online Courses Information</h2>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row">
                                <label class="form-label">Small Description</label>
                                <input type="text" class="form-control" name="small_description" value="{{ $row->small_description ?? '' }}" required>
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="form-label">Details</label>
                                <input type="text" class="form-control" name="details" value="{{ $row->details ?? '' }}" required>
                            </div>
<div class="mb-10 fv-row">
                                <label class="form-label">Youtube link</label>
                                <input type="text" class="form-control" name="details4" value="{{ $row->details4 ?? '' }}">
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">Image 1 </label>
                                <input type="file" class="form-control" name="details2">
                                @if(!empty($row->details2))
                                    <div class="mt-2">
                                        <img src="{{ asset($row->details2) }}" width="50" height="50" alt="Image">
                                        <a href="{{ asset($row->details2) }}" target="_blank">View</a>
                                    </div>
                                @endif
                            </div>

                            <div class="mb-10 fv-row">
                                <label class="form-label">Image 3 </label>
                                <input type="file" class="form-control" name="details4">
                                @if(!empty($row->details4))
                                    <div class="mt-2">
                                        <img src="{{ asset($row->details4) }}" width="50" height="50" alt="Image">
                                        <a href="{{ asset($row->details4) }}" target="_blank">View</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('onlineCoursesView') }}" class="btn btn-light me-5">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
