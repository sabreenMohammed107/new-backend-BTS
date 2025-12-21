@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <h1 class="text-dark fw-bolder my-1 fs-2">Applicant Details</h1>
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('applRound.index') }}" class="text-muted text-hover-primary">Round Applicants</a>
                    </li>
                    <li class="breadcrumb-item text-dark">View</li>
                </ul>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="{{ route('applRound.index') }}" class="btn btn-sm btn-light me-2">
                    <i class="fa fa-arrow-left me-1"></i> Back to List
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <div class="container-xxl">
            <div class="row g-5 g-xl-8">
                {{-- Applicant Information Card --}}
                <div class="col-xl-6">
                    <div class="card card-flush h-100">
                        <div class="card-header">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Applicant Information</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Primary contact details</span>
                            </h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                <tbody>
                                    <tr>
                                        <td class="text-muted fw-bold w-150px">Name</td>
                                        <td class="text-gray-800 fw-bolder">
                                            {{ $applicant->salut->en_name ?? '' }} {{ $applicant->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-bold">Email</td>
                                        <td class="text-gray-800">
                                            <a href="mailto:{{ $applicant->email }}">{{ $applicant->email }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-bold">Phone</td>
                                        <td class="text-gray-800">{{ $applicant->phone ?? 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted fw-bold">Company</td>
                                        <td class="text-gray-800 fw-bold">{{ $applicant->company ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-bold">Job Title</td>
                                        <td class="text-gray-800">{{ $applicant->job_title ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-bold">Country</td>
                                        <td class="text-gray-800">{{ $applicant->country->country_en_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted fw-bold">Venue/City</td>
                                        <td class="text-gray-800">{{ $applicant->venues->venue_en_name ?? 'N/A' }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Billing Information Card --}}
                <div class="col-xl-6">
                    <div class="card card-flush h-100">
                        <div class="card-header">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Billing Information</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Billing contact details</span>
                            </h3>
                        </div>
                        <div class="card-body pt-0">
                            @if($applicant->billingDetails)
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted fw-bold w-150px">Name</td>
                                            <td class="text-gray-800 fw-bolder">
                                                {{ $applicant->billingDetails->salut->en_name ?? '' }} {{ $applicant->billingDetails->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted fw-bold">Email</td>
                                            <td class="text-gray-800">
                                                <a href="mailto:{{ $applicant->billingDetails->email }}">{{ $applicant->billingDetails->email }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted fw-bold">Phone</td>
                                            <td class="text-gray-800">{{ $applicant->billingDetails->phone ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted fw-bold">Company</td>
                                            <td class="text-gray-800 fw-bold">{{ $applicant->billingDetails->company ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted fw-bold">Job Title</td>
                                            <td class="text-gray-800">{{ $applicant->billingDetails->job_title ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted fw-bold">Country</td>
                                            <td class="text-gray-800">{{ $applicant->billingDetails->country->country_en_name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted fw-bold">Venue/City</td>
                                            <td class="text-gray-800">{{ $applicant->billingDetails->venues->venue_en_name ?? 'N/A' }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            @else
                                <div class="text-center text-muted py-10">
                                    <i class="fa fa-info-circle fs-2 mb-3 d-block"></i>
                                    No billing information available
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Course & Round Information Card --}}
                <div class="col-xl-12">
                    <div class="card card-flush">
                        <div class="card-header">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">Course & Registration Details</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Course and round information</span>
                            </h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                        <tbody>
                                            <tr>
                                                <td class="text-muted fw-bold w-150px">Course</td>
                                                <td class="text-primary fw-bolder">{{ $applicant->courses->course_en_name ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-bold">Round Venue</td>
                                                <td class="text-gray-800">{{ $applicant->round->venue->venue_en_name ?? 'N/A' }}</td>
                                            </tr>
                                            @if($applicant->round)
                                            <tr>
                                                <td class="text-muted fw-bold">Round Date</td>
                                                <td class="text-gray-800">
                                                    {{ \Carbon\Carbon::parse($applicant->round->round_start_date)->format('d M, Y') ?? 'N/A' }}
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                        <tbody>
                                            <tr>
                                                <td class="text-muted fw-bold w-150px">Registration Date</td>
                                                <td class="text-gray-800">{{ $applicant->created_at->format('d M, Y H:i') }}</td>
                                            </tr>
                                            @if($applicant->quk_enquery_notes)
                                            <tr>
                                                <td class="text-muted fw-bold">Enquiry Notes</td>
                                                <td class="text-gray-800">{{ $applicant->quk_enquery_notes }}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
