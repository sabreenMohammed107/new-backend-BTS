@extends('layout.main')

@section('breadcrumb')
<div class="toolbar" id="kt_toolbar">
    <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder my-1 fs-2">Courses</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb fw-bold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item text-muted">Courses</li>

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
                            href="#kt_ecommerce_add_days_advanced_related">Related Course</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active " id="kt_ecommerce_add_product_general" role="tab-panel">
                        <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                        action="{{ route('courses.update', $row->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Image</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                                style="background-image: url('{{ asset('uploads/courses') }}/{{ $row->course_image }}')">
                                <div class="image-input-wrapper w-150px h-150px"
                                    style="background-image: url(' {{ asset('uploads/courses') }}/{{ $row->course_image }}')">

                                </div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Edit-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="course_image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit-->

                            </div>
                            <!--end::Image input-->
                        </div>
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Thumb</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                         <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                            style="background-image: url('{{ asset('uploads/courses') }}/{{ $row->course_image_thumbnail }}')">
                            <div class="image-input-wrapper w-150px h-150px"
                                style="background-image: url(' {{ asset('uploads/courses') }}/{{ $row->course_image_thumbnail }}')">

                            </div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Edit-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="course_image_thumbnail" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit-->

                        </div>
                        <!--end::Image input-->
                    </div>
                    </div>
                    <!--end::Thumbnail settings-->

                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label"> Code</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="course_code" type="text" readonly
                                    class="form-control @error('course_code') is-invalid @enderror" name="course_code"
                                    value="{{ $row->course_code }}" required autocomplete="course_code" autofocus>

                                @error('course_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                            <!--end::Input-->
                             <!--begin::Input group-->
                             <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="required form-label"> Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="course_en_name" type="text"
                                    class="form-control @error('course_en_name') is-invalid @enderror" name="course_en_name"
                                    value="{{ $row->course_en_name }}" required autocomplete="course_en_name" autofocus>

                                @error('course_en_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input-->
                             <!--begin::Input group-->
                             <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="required form-label"> Duration</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="course_duration" type="text"
                                    class="form-control @error('course_duration') is-invalid @enderror" name="course_duration"
                                    value="{{ $row->course_duration }}" required autocomplete="course_duration" autofocus>

                                @error('course_duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            </div>
                            <!--end::Input-->
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value="">Category..</option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                </label>
                                <select name="category_id" class="form-select form-select-solid  dynamic"
                                    data-control="select2" data-show-subtext="true" data-live-search="true"
                                    id="country" data-dependent="state">
                                    <option value="">{{$row->subCategory->courseCategory->category_en_name ?? ''}}</option>
                                    @foreach ($categories as $category)
                                    <option value='{{$category->id}}' >
                                     {{ $category->category_en_name }}</option>
                                       @endforeach

                                </select>
                            </div>

                                <div class="fv-row w-100 flex-md-root">
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value="">Select Sub category..</option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                </label>
                                <select name="course_sub_category_id" class="form-select form-select-solid "
                                    data-control="select2" data-show-subtext="true" data-live-search="true"
                                    id="state">
                                    <option value="">{{$row->subCategory->subcategory_en_name ?? ''}}</option>

                                </select>
                            </div>
                        </div>
                            <!--begin::Input group-->
                            <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="form-label"> Training Methods</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_training_methods" placeholder="description">{{ $row->course_training_methods }}</textarea>
                                <!--end::Editor-->

                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="form-label"> Daily Agenda </label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_daily_agenda" placeholder="description">{{ $row->course_daily_agenda }}</textarea>
                                <!--end::Editor-->

                            </div>
                        </div>
                        <!-- end row -->
                          <!--begin::Input group-->
                          <div class="d-flex flex-wrap gap-5 mt-4">
                            <div class="fv-row w-100 flex-md-root">
                            <!--begin::Label-->
                            <label class="form-label"> HighLight</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_highlight" placeholder="description">{{ $row->course_highlight }}</textarea>
                            <!--end::Editor-->

                        </div>
                        <div class="fv-row w-100 flex-md-root">
                            <!--begin::Label-->
                            <label class="form-label">Audience</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_audience" placeholder="description">{{ $row->course_audience }}</textarea>
                            <!--end::Editor-->

                        </div>
                    </div>
                    <!-- end row -->
                         <!--begin::Input group-->
                         <div class="d-flex flex-wrap gap-5 mt-4">
                            <div class="fv-row w-100 flex-md-root">
                            <!--begin::Label-->
                            <label class="form-label"> Course Objectives</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_objectives" placeholder="description">{{ $row->course_objectives }}</textarea>
                            <!--end::Editor-->

                        </div>
                        <div class="fv-row w-100 flex-md-root">
                            <!--begin::Label-->
                            <label class="form-label">Accreditation</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="Accreditation" placeholder="description">{{ $row->Accreditation }}</textarea>
                            <!--end::Editor-->

                        </div>
                    </div>
                    <!-- end row -->
                           <!--begin::Input group-->
                           <div class="d-flex flex-wrap gap-5 mt-4">
                            <div class="fv-row w-100 flex-md-root">
                            <!--begin::Label-->
                            <label class="form-label"> Description</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_en_desc" placeholder="description">{{ $row->course_en_desc }}</textarea>
                            <!--end::Editor-->

                        </div>
                        <div class="fv-row w-100 flex-md-root">
                            <!--begin::Label-->
                            <label class="form-label"> Brochure</label>
                            <!--end::Label-->
                            <a href="{{ asset('uploads/courses') }}/{{ $row->course_brochure }}" dawnload> Dawnload</a>
                            <!--begin::Editor-->
                            <input type="file" class="form-control "  name="course_brochure" placeholder="course_brochure" />
                            <!--end::Editor-->

                        </div>
                    </div>
                    <!-- end row -->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->


                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('courses.index') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
                    </div>
                    <div class="tab-pane fade" id="kt_ecommerce_add_days_advanced_related" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">

                            <!--begin::Variations-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Related Course</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    @include("courses.related")
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
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new_target_form_gallery" class="form"
                    action="{{ route('saveRelated') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $row->id }}" />
                    <input type="hidden" name="tab" value="kt_ecommerce_add_days_advanced_gallery">
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Set Course</h1>
                        <!--end::Title-->

                    </div>
                    <!--end::Heading-->
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <div class="d-flex flex-wrap gap-5 mt-4">
                            <div class="fv-row w-100 flex-md-root">
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <option value="">Course..</option>
                                    {{-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Interviewer who conducts the meeting with the interviewee"></i> --}}
                                </label>
                                <select name="related_course_id"
                                    class="form-select form-select-solid  dynamic"
                                    data-control="select2" data-show-subtext="true"
                                    data-live-search="true" id="country"
                                    data-dependent="state">
                                    <option value="">select....</option>
                                    @foreach ($relateds as $related)
                                        <option value='{{ $related->id }}'>
                                            {{ $related->course_en_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Input group-->



                    <div class="d-flex flex-column mb-8 fv-row">



                        <div class="d-flex flex-column mb-8 fv-row">

                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" name="active[]" value="1"
                                        id="flexSwitchDefault2" checked />
                                    <label class="form-check-label" for="flexSwitchDefault2">
                                        Active
                                    </label>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="text-center">
                                <button type="reset" id="kt_modal_new_target_cancel"
                                    class="btn btn-light me-3">Cancel</button>
                                <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
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
