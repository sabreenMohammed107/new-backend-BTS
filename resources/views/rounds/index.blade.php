@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Rounds</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Rounds</li>

                    <li class="breadcrumb-item text-dark">All</li>
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
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!--begin::Category-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <form action="{{ route('rounds.index') }}" method="GET" class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" name="search" value="{{ $search ?? '' }}"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search by code, course, venue..." />
                            <button type="submit" class="btn btn-sm btn-primary ms-2">Search</button>
                            @if($search)
                                <a href="{{ route('rounds.index') }}" class="btn btn-sm btn-secondary ms-2">Clear</a>
                            @endif
                        </form>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
											<a href="{{ route('rounds.create') }}" class="btn btn-primary">Add round</a>

                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">

                       <!--begin::Table-->
                       <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_rounds_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_rounds_table .form-check-input"
                                            value="1" />
                                    </div>
                                </th>
                                <th class="min-w-100px">Code</th>
                                <th class="min-w-100px">Course</th>
                                <th class="min-w-100px">Duration</th>
                                <th class="min-w-100px">Venue</th>
                                <th class="min-w-100px">Start</th>
                                <th class="min-w-100px">End</th>
                                <th class="min-w-100px">Price</th>
                                 <th class="min-w-100px">HOme order</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($rows as $index => $row)
     <!--begin::Table row-->
     <tr>
        <!--begin::Checkbox-->
        <td>
            <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
            </div>
        </td>
        <!--end::Checkbox-->
            <td>
                <!--end::Thumbnail-->
                <div class="d-flex align-items-center">
                    <!--begin::Title-->
                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
                    data-kt-ecommerce-category-filter="category_name" >{{ $row->round_code }}</a>
                    <!--end::Title-->
                </div>
        </td>
        <!--end::Category=-->
        <!--begin::SKU=-->
        <td class="text-end pe-0">
            <div class="d-flex align-items-center">
            <input type="hidden" name="" id=""  data-kt-ecommerce-category-filter="category_id" value="{{$row->id}}" >
            <span class="fw-bolder">{{$row->course->course_en_name ?? ''}}</span>
        </div>
        </td>
        <!--end::SKU=-->
    <!--begin::SKU=-->
    <td class="text-end pe-0">
        <div class="d-flex align-items-center">
        <span class="fw-bolder">{{$row->course->course_duration ?? ''}}</span>
    </div>
    </td>
    <!--end::SKU=-->
    <td class="text-end pe-0">
        <div class="d-flex align-items-center">
            @if($row->venue!=null)
            {{$row->venue->venue_en_name ?? ''}}
            @endif
    </div>
    </td>
    <!--end::SKU=-->
    <td class="text-end pe-0">
        <div class="d-flex align-items-center">
        <span class="fw-bolder">  <?php $date = date_create($row->round_start_date) ?>
            {{ date_format($date,"d-m-Y") }}</span>
    </div>
    </td>
    <!--end::SKU=-->
    <td class="text-end pe-0">
        <div class="d-flex align-items-center">
        <span class="fw-bolder">   <?php $date = date_create($row->round_end_date) ?>
            {{ date_format($date,"d-m-Y") }}</span>
    </div>
    </td>
    <!--end::SKU=-->
    <td class="text-end pe-0">
        <div class="d-flex align-items-center">
        <span class="fw-bolder">{{$row->round_price}}
            @if($row->currancy!=null)
            {{$row->currancy->currency_name}}</span>
            @endif
    </div>
    </td>
      <td class="text-end pe-0">
        <div class="d-flex align-items-center">
        <span class="fw-bolder">{{$row->show_home_order}}

    </div>
    </td>
    <!--end::SKU=-->
        <!--begin::Action=-->
        <td class="text-end">
            <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                <span class="svg-icon svg-icon-5 m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none">
                        <path
                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
            <!--begin::Menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{ route('rounds.edit', $row->id) }}"
                        class="menu-link px-3">Edit</a>
                </div>
                <!--end::Menu item-->
                 <!--begin::Menu item-->
                 <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3"
                        data-kt-ecommerce-category-filter="delete_row"
                        data-applicant-count="{{ $row->applicant->count() }}">Delete</a>


        <form id="delete_{{$row->id}}" action="{{ route('rounds.destroy', $row->id) }}"  method="POST" style="display: none;">
        @csrf
        @method('DELETE')

        <button type="submit" value=""></button>
        </form>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu-->
        </td>
        <!--end::Action=-->
    </tr>
    <!--end::Table row-->
@endforeach


                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->

                    <!--begin::Pagination-->
                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-5">
                        <div class="d-flex flex-wrap py-2 me-3">
                            {{ $rows->links() }}
                        </div>
                        <div class="d-flex align-items-center py-3">
                            <span class="text-muted">
                                Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }}
                                of {{ $rows->total() }} entries
                            </span>
                        </div>
                    </div>
                    <!--end::Pagination-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection

@section('scripts')
<script>
    // Delete round handler
    document.querySelectorAll('[data-kt-ecommerce-category-filter="delete_row"]').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = e.target.closest('tr');
            const categoryName = parent.querySelector('[data-kt-ecommerce-category-filter="category_name"]').innerText;
            const categoryId = parent.querySelector('[data-kt-ecommerce-category-filter="category_id"]').value;
            const applicantCount = parseInt(e.target.getAttribute('data-applicant-count')) || 0;

            let message = "Are you sure you want to delete round " + categoryName + "?";
            if (applicantCount > 0) {
                message = "This round has " + applicantCount + " registered applicant(s). Deleting this round will also delete all related applicants. Are you sure you want to proceed?";
            }

            Swal.fire({
                title: applicantCount > 0 ? "Warning!" : "Delete Round",
                text: message,
                icon: applicantCount > 0 ? "warning" : "question",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: applicantCount > 0 ? "Yes, delete all!" : "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function(result) {
                if (result.value) {
                    document.getElementById('delete_' + categoryId).submit();
                }
            });
        });
    });
</script>
@endsection
