@extends('front-design-pages.front-layout.app')
@section('page-id' , 'cant-found-my-course-page')
@section('page-content')
<style>
    .main-course-bg-header {
        background-image: url('{{ asset('front-assets/img/bg/TAILOR YOUR COURSE.png') }}');
        position: relative;

    height: 400px;
    background-size: cover;
    background-position: center;

    }
    .main-course-bg-header .course-main-title.text-center h2 {
        color: #fff !important;
        font-size: 55px;
        padding-left: 30px;
        position: absolute;
        bottom: 50%;
        left: 50%;
        transform: translate(-50%, 50%);
    }
</style>
<div class="main-course-bg-header">
    <div class="course-main-title text-center" >
        <h2>TAILOR YOUR COURSE</h2>
    </div>
</div>
<div class="container py-5">
    @if ($message = Session::get('message'))
            <div id="alertDiv" class="alert alert-info alert-block">
                {{-- <button type="button" id="alertClose" class="close" data-dismiss="alert">×</button> --}}
                <strong style="color:black;font-weight:bold">{{ $message }}</strong>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
    <div class="row mb-4">
        <div class="col-12 text-center">
            <p class="lead">No problem! Reach out to us by filling in the course details you're interested in, and our team will work to address your needs. We'll review your request and get back to you with tailored solutions or alternatives as soon as possible. Your learning journey is our priority!</p>
        </div>
    </div>
    <form action="{{ url('/submitTailor') }}" method="POST">
        @csrf
        <div class="row g-4">
            <div class="col-md-6">
                <label for="courseTitle" class="form-label fw-bold">Course Title</label>
                <input type="text" class="form-control" id="courseTitle" >
            </div>
            <div class="col-md-6">
                <label for="courseCity" class="form-label fw-bold">Course City</label>
                <input type="text" class="form-control" id="courseCity" >
            </div>
            <div class="col-md-6">
                <label for="courseDescription" class="form-label fw-bold">Course Description</label>
                <textarea class="form-control" id="courseDescription" rows="2" ></textarea>
            </div>
            <div class="col-md-6">
                <label for="courseDate" class="form-label fw-bold">Date</label>
                <input style="height: 45px" type="date" class="form-control" id="courseDate">
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" >
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label fw-bold">E-mail</label>
                <input type="email" class="form-control" id="email" >
            </div>
            <div class="col-md-6">
                <label for="mobile" class="form-label fw-bold">Mobile</label>
                <input type="text" class="form-control" id="mobile" >
            </div>
            <div class="col-md-6">
                <label for="organisation" class="form-label fw-bold">Organisation Or Company</label>
                <input type="text" class="form-control" id="organisation">
            </div>
        </div>
        <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" value="" id="dataAgreement">
            <label class="form-check-label small" for="dataAgreement">
                I AGREE TO THE PROCESSING OF MY DATA FOR THE PURPOSE OF THIS FORM
            </label>
        </div>
        <div class="row mb-2">
            <div class="form-group col-lg-6">
                <label>Captcha*</label>
                <div class="captcha d-flex align-items-center gap-2">
                    <span id="captcha-img">{!! captcha_img('flat') !!}</span>
                    <button type="button" class="btn btn-secondary btn-sm" id="refresh-captcha"
                        style="margin-left: 10px; padding: 6px 10px;">
                        <i class="fas fa-sync-alt"></i>
                    </button>

                </div>
            </div>

            <div class="form-group col-lg-6">
                <label>Enter Captcha*</label>
                <input id="captcha" type="text" class="form-control" name="captcha">
                @error('captcha')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary px-5">PREVIOUS</button>
            <button type="submit" class="btn btn-primary px-5">SUBMIT</button>
        </div>
    </form>
</div>
@endsection
@section('script')
    <script>
        document.getElementById('refresh-captcha').addEventListener('click', function() {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('captcha-img').innerHTML = data.captcha;
                });
        });
        $(document).on('click', '#alertCloseDetails', function() {
            $('#alertDivDetails').fadeOut();
        });
        $(document).ready(function() {
            // تأكد من تفعيل المكتبة الخاصة بالـ nice-select
            $('select').niceSelect();

            // التحقق من التغيير في الـ nice-select
            $(".nice-select").on("change", function() {
                var selectedValue = $(this).find('input').val();
                $('select[name="country_id"]').val(selectedValue);
            });
        });
    </script>
@endsection

