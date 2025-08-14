@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Course Categories</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('course-categories.index') }}" class="text-muted text-hover-primary">Course Categories</a>
                    </li>
                    <li class="breadcrumb-item text-dark">View Course Category</li>
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
        <!--begin::Container-->
        <div class="container-xxl">
            <!--begin::Category Details-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Course Category Details</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Edit button-->
                        <a href="{{ route('course-categories.edit', $row->id) }}" class="btn btn-primary me-3">Edit Category</a>
                        <!--end::Edit button-->
                        <!--begin::Back button-->
                        <a href="{{ route('course-categories.index') }}" class="btn btn-light">Back to List</a>
                        <!--end::Back button-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="row">
                        <!--begin::Image Column-->
                        <div class="col-md-4">
                            <div class="text-center mb-5">
                                @if($row->image)
                                    <div class="symbol symbol-200px me-5 mb-3">
                                        <img src="{{ asset($row->image) }}" alt="{{ $row->name_en }}" class="img-fluid rounded" />
                                    </div>
                                @else
                                    <div class="symbol symbol-200px me-5 mb-3">
                                        <div class="symbol-label bg-light-primary">
                                            <span class="svg-icon svg-icon-4x svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"/>
                                                    <path opacity="0.3" d="M21 5H3C2.4 5 2 5.4 2 6V18C2 18.6 2.4 19 3 19H21C21.6 19 22 18.6 22 18V6C22 5.4 21.6 5 21 5ZM21 5H3C2.4 5 2 5.4 2 6V18C2 18.6 2.4 19 3 19H21C21.6 19 22 18.6 22 18V6C22 5.4 21.6 5 21 5Z" fill="currentColor"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!--end::Image Column-->

                        <!--begin::Details Column-->
                        <div class="col-md-8">
                            <div class="row g-5">
                                <!--begin::Name EN-->
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-600 mb-2">Category Name (English)</label>
                                        <span class="fs-5 text-gray-800">{{ $row->name_en }}</span>
                                    </div>
                                </div>
                                <!--end::Name EN-->

                                <!--begin::Name AR-->
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-600 mb-2">Category Name (Arabic)</label>
                                        <span class="fs-5 text-gray-800">{{ $row->name_ar }}</span>
                                    </div>
                                </div>
                                <!--end::Name AR-->

                                <!--begin::Description EN-->
                                @if($row->description_en)
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-600 mb-2">Description (English)</label>
                                        <span class="fs-6 text-gray-800">{{ $row->description_en }}</span>
                                    </div>
                                </div>
                                @endif
                                <!--end::Description EN-->

                                <!--begin::Description AR-->
                                @if($row->description_ar)
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-600 mb-2">Description (Arabic)</label>
                                        <span class="fs-6 text-gray-800">{{ $row->description_ar }}</span>
                                    </div>
                                </div>
                                @endif
                                <!--end::Description AR-->

                                <!--begin::Sort Order-->
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-600 mb-2">Sort Order</label>
                                        <span class="badge badge-light-info fs-6">{{ $row->sort_order }}</span>
                                    </div>
                                </div>
                                <!--end::Sort Order-->

                                <!--begin::Status-->
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-600 mb-2">Status</label>
                                        @if ($row->active == 1)
                                            <div class="badge badge-light-success fs-6">Active</div>
                                        @else
                                            <div class="badge badge-light-danger fs-6">Inactive</div>
                                        @endif
                                    </div>
                                </div>
                                <!--end::Status-->

                                <!--begin::Created At-->
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-600 mb-2">Created At</label>
                                        <span class="fs-6 text-gray-800">{{ $row->created_at->format('F j, Y \a\t g:i A') }}</span>
                                    </div>
                                </div>
                                <!--end::Created At-->

                                <!--begin::Updated At-->
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <label class="fs-6 fw-bold text-gray-600 mb-2">Last Updated</label>
                                        <span class="fs-6 text-gray-800">{{ $row->updated_at->format('F j, Y \a\t g:i A') }}</span>
                                    </div>
                                </div>
                                <!--end::Updated At-->
                            </div>
                        </div>
                        <!--end::Details Column-->
                    </div>

                    <!--begin::Related Data-->
                    <div class="separator my-10"></div>

                    <div class="row g-5">
                        <!--begin::Sub Categories Count-->
                        <div class="col-md-6">
                            <div class="card card-flush h-100">
                                <div class="card-header">
                                    <h3 class="card-title">Sub Categories</h3>
                                </div>
                                <div class="card-body text-center">
                                    <div class="fs-2 fw-bold text-primary">{{ $row->courseSubCategories()->count() }}</div>
                                    <div class="fs-6 text-gray-600">Total Sub Categories</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Sub Categories Count-->

                        <!--begin::Courses Count-->
                        <div class="col-md-6">
                            <div class="card card-flush h-100">
                                <div class="card-header">
                                    <h3 class="card-title">Courses</h3>
                                </div>
                                <div class="card-body text-center">
                                    <div class="fs-2 fw-bold text-success">{{ $row->courses()->count() }}</div>
                                    <div class="fs-6 text-gray-600">Total Courses</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Courses Count-->
                    </div>
                    <!--end::Related Data-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category Details-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
