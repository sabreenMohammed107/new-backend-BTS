@extends('layout.main')
@section('title', 'Speaker Application Details')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Speaker Application Details</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('speaker.index') }}" class="text-muted text-hover-primary">Speaker Applications</a>
                    </li>
                    <li class="breadcrumb-item text-dark">Application Details</li>
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
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex flex-column flex-xl-row">
            <!-- Personal Information Card -->
            <div class="flex-column flex-lg-row-auto w-100 w-xl-500px mb-10">
                <div class="card mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Personal Information</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="{{ route('speaker.index') }}" class="btn btn-sm btn-light-primary">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                    </svg>
                                </span>
                                Back to List
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">Full Name</div>
                            <div class="text-gray-600">{{ $row->salutation }} {{ $row->first_name }} {{ $row->last_name }}</div>
                        </div>
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">Email</div>
                            <div class="text-gray-600"><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></div>
                        </div>
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">Address</div>
                            <div class="text-gray-600">{{ $row->address ?? 'N/A' }}</div>
                        </div>
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">Country</div>
                            <div class="text-gray-600">{{ $row->country ?? 'N/A' }}</div>
                        </div>
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">City</div>
                            <div class="text-gray-600">{{ $row->city ?? 'N/A' }}</div>
                        </div>
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">Phone</div>
                            <div class="text-gray-600">{{ $row->phone ?? 'N/A' }}</div>
                        </div>
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">Mobile</div>
                            <div class="text-gray-600">{{ $row->mobile ?? 'N/A' }}</div>
                        </div>
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">Application Date</div>
                            <div class="text-gray-600">{{ $row->created_at->format('d-m-Y H:i') }}</div>
                        </div>
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">Status</div>
                            <div class="text-gray-600">
                                <span class="badge {{ $row->status == 'approved' ? 'badge-light-success' : ($row->status == 'rejected' ? 'badge-light-danger' : 'badge-light-warning') }}">
                                    {{ ucfirst($row->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-lg-row-fluid ms-lg-15">
                <!-- Areas of Expertise Card -->
                <div class="card mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Areas of Expertise</span>
                        </h3>
                    </div>
                    <div class="card-body pt-3">
                        @if(is_array($row->expertise) && count($row->expertise) > 0)
                            <div class="d-flex flex-wrap">
                                @foreach($row->expertise as $expertise)
                                    <span class="badge badge-light-primary fs-7 m-1">{{ $expertise }}</span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-600">No expertise areas specified.</p>
                        @endif
                    </div>
                </div>

                <!-- Other Information Card -->
                <div class="card mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Other Information</span>
                        </h3>
                    </div>
                    <div class="card-body pt-3">
                        <p class="text-gray-600">{{ $row->other_data ?? 'No additional information provided.' }}</p>
                    </div>
                </div>

                <!-- Documents Card -->
                <div class="card mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Documents</span>
                        </h3>
                    </div>
                    <div class="card-body pt-3">
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">CV</div>
                            <div class="text-gray-600">
                                @if($row->cv_path)
                                    <a href="{{ asset('storage/' . $row->cv_path) }}" class="btn btn-sm btn-light-primary" target="_blank">
                                        <i class="fa fa-download"></i> Download CV
                                    </a>
                                @else
                                    <span class="text-muted">No CV uploaded</span>
                                @endif
                            </div>
                        </div>
                        <div class="py-3">
                            <div class="fw-bolder fs-5 text-gray-800 mb-1">Supporting Documents</div>
                            <div class="text-gray-600">
                                @if($row->doc_path)
                                    <a href="{{ asset('storage/' . $row->doc_path) }}" class="btn btn-sm btn-light-primary" target="_blank">
                                        <i class="fa fa-download"></i> Download Documents
                                    </a>
                                @else
                                    <span class="text-muted">No supporting documents uploaded</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update Status Card -->
                <div class="card mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Update Status</span>
                        </h3>
                    </div>
                    <div class="card-body pt-3">
                        <form action="{{ route('speaker.status.update', $row->id) }}" method="POST">
                            @csrf
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Application Status</label>
                                <select name="status" class="form-select form-select-solid" data-control="select2" data-placeholder="Select status">
                                    <option value="pending" {{ $row->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $row->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $row->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Update Status</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection
