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
    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -31px;
            position: relative;
            z-index: 2;
            padding: 0 10px;
            font-size: 20px;
        }
    </style>
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container-xxl">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <p><strong> Something went wrong</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                                style="background-image: url(assets/media/svg/files/blank-image.svg)">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="course_image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->

                        </div>
                        <!--end::Card body-->
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
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                                style="background-image: url(assets/media/svg/files/blank-image.svg)">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" name="course_image_thumbnail" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->

                        </div>
                        <!--end::Card body-->
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
                             <div class="d-flex flex-wrap gap-5 mt-4">
                                <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="required form-label"> Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input id="course_en_name" type="text"
                                    class="form-control @error('course_en_name') is-invalid @enderror" name="course_en_name"
                                    value="{{ old('course_en_name') }}" required autocomplete="course_en_name" autofocus>

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
                                    value="{{ old('course_duration') }}" required autocomplete="course_duration" autofocus>

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
                                    <option value="">select....</option>
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
                                    <option value="">select....</option>

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
                                <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_training_methods" placeholder="description">{{ old('course_training_methods') }}</textarea>
                                <!--end::Editor-->

                            </div>
                            <div class="fv-row w-100 flex-md-root">
                                <!--begin::Label-->
                                <label class="form-label"> Daily Agenda </label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_daily_agenda" placeholder="description">{{ old('course_daily_agenda') }}</textarea>
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
                            <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_highlight" placeholder="description">{{ old('course_highlight') }}</textarea>
                            <!--end::Editor-->

                        </div>
                        <div class="fv-row w-100 flex-md-root">
                            <!--begin::Label-->
                            <label class="form-label">Audience</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_audience" placeholder="description">{{ old('course_audience') }}</textarea>
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
                            <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_objectives" placeholder="description">{{ old('course_objectives') }}</textarea>
                            <!--end::Editor-->

                        </div>
                        <div class="fv-row w-100 flex-md-root">
                            <!--begin::Label-->
                            <label class="form-label">Accreditation</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="Accreditation" placeholder="description">{{ old('Accreditation') }}</textarea>
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
                            <textarea class="form-control form-control-solid tinymce-editor" rows="3" name="course_en_desc" placeholder="description">{{ old('course_en_desc') }}</textarea>
                            <!--end::Editor-->

                        </div>
                        <div class="fv-row w-100 flex-md-root">
                            <!--begin::Label-->
                            <label class="form-label"> Brochure</label>
                            <!--end::Label-->
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
        <!--end::Container-->
    </div>
    <!--end::Post-->

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
