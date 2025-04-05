@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <h1 class="text-dark fw-bolder my-1 fs-2">Details Page</h1>
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Details</li>
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

            <form class="form d-flex flex-column flex-lg-row" action="{{ route('btsTargetUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General Information</h2>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="row mb-10 fv-row">
                                <div class="col-md-6 mb-5">
                                    <label class="form-label">small description</label>
                                    <input type="text" class="form-control" name="small_description" value="{{ $row->small_description ?? '' }}" required>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label class="form-label">Detail 1</label>
                                    <input type="text" class="form-control" name="details" value="{{ $row->details ?? '' }}" required>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label class="form-label">Detail 2</label>
                                    <textarea  class="form-control" name="details2" >{{ $row->details2 ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label class="form-label">Detail 3</label>
                                    <input type="text" class="form-control" name="details3" value="{{ $row->details3 ?? '' }}" required>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label class="form-label">Detail 4</label>
                                    <textarea  class="form-control" name="details4" >{{ $row->details4 ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label class="form-label">Detail 5</label>
                                    <input type="text" class="form-control" name="details5" value="{{ $row->details5 ?? '' }}" required>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label class="form-label">Detail 6</label>
                                    <textarea class="form-control" name="details6">{{ $row->details6 ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label class="form-label">Detail 7</label>
                                    <input type="text" class="form-control" name="details7" value="{{ $row->details7 ?? '' }}" required>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <label class="form-label">Detail 8</label>
                                    <textarea class="form-control" name="details8">{{ $row->details8 ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('btsTargetView') }}" class="btn btn-light me-5">Cancel</a>
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
