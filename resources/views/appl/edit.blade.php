@extends('layout.main')

@section('breadcrumb')
<div class="toolbar" id="kt_toolbar">
    <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder my-1 fs-2">Applicant Speaker</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb fw-bold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item text-muted">Applicant Speaker</li>

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
<?php
if($errors->any()){
    $tab=$errors->first();
}

?>
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <!--begin::General options-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4  active" data-bs-toggle="tab"
                            href="#kt_ecommerce_add_product_general">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 " data-bs-toggle="tab"
                            href="#kt_ecommerce_add_days_advanced_related">Expertises </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 " data-bs-toggle="tab"
                            href="#kt_ecommerce_add_days_advanced_related2">Training Course</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active " id="kt_ecommerce_add_product_general" role="tab-panel">
                        <form action="">
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <!-- First Name -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="{{$row->frist_name}}" disabled>
                                </div>
                                <!-- Last Name -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="{{$row->last_name}}" disabled>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <!-- Salutation -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Salutation</label>
                                    <input type="text" class="form-control" value="{{$row->salut->en_name}}" disabled>
                                </div>
                                <!-- Email -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{$row->email}}" disabled>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <!-- Mobile -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Mobile</label>
                                    <input type="tel" class="form-control" value="{{$row->mobile}}" disabled>
                                </div>
                                <!-- Phone -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" class="form-control" value="{{$row->phone}}" disabled>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <!-- Country -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control" value="{{$row->country->country_en_name}}" disabled>
                                </div>
                                <!-- Venue -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Venue</label>
                                    <input type="text" class="form-control" value="{{$row->venue->venue_en_name}}" disabled>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <!-- Address -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" disabled>{{$row->address}}</textarea>
                                </div>
                                <!-- Other Info -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Other Info</label>
                                    <textarea class="form-control" disabled>{{$row->other_data}}</textarea>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <!-- CV Link -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">CV Link</label>
                                    <div class="fileUpload">
                                        <input type="file" class="form-control" disabled>
                                        <span class="upl">{{ $row->cv_path }}</span>
                                    </div>
                                    <a href="{{ asset('uploads/courseBrochure')}}/{{ $row->cv_path }}" class="btn btn-primary" download>Download</a>
                                </div>
                                <!-- Doc Link -->
                                <div class="fv-row w-100 flex-md-root">
                                    <label class="form-label">Doc Link</label>
                                    <div class="fileUpload">
                                        <input type="file" class="form-control" disabled>
                                        <span class="upl">{{ $row->doc_path }}</span>
                                    </div>
                                    <a href="{{ asset('uploads/courseBrochure')}}/{{ $row->doc_path }}" class="btn btn-primary" download>Download</a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('appl.index') }}" class="btn btn-dark">Cancel</a>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="kt_ecommerce_add_days_advanced_related" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <!--begin::Variations-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Expertises </h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    @include("appl.expertises")
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::Variations-->

                        </div>
                    </div>
                    <div class="tab-pane fade" id="kt_ecommerce_add_days_advanced_related2" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <!--begin::Variations-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Training Course</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    @include("appl.training")
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::Variations-->

                        </div>
                    </div>
                </div>
            </div>
            <!--end::Main column-->

    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
@endsection
@section('scripts')
      <script>
          $('.dynamic').change(function() {

if ($(this).val() != '') {
    var select = $(this).attr("id");
    var value = $(this).val();
    var dependent = $(this).data('dependent');
    var _token = $('input[name="_token"]').val();

    $.ajax({
        url: "{{ route('dynamicdependentCat.fetch') }}",
        method: "GET",
        data: {
            select: select,
            value: value,
            _token: _token,
            dependent: dependent
        },
        success: function(result) {

            $('#state').html(result);

        }

    })
}
});
</script>
@endsection
