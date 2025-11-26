@extends('front-design-pages.front-layout.app')
@section('page-id' , 'tailor-your-course-page')
@section('page-content')

<style>
    .error-text { color: red; font-size: 14px; margin-top: 5px; }
    .success-msg { background: #d4edda; padding: 12px; border-left: 5px solid #28a745; margin-bottom: 20px; }
</style>

<div class="main-course-bg-header">
    <div class="course-main-title text-center">
        <h2>Tailor Your Course</h2>
    </div>
</div>

<div class="container py-5">

    <div id="successMessage" class="success-msg d-none"></div>

    <form id="tailorForm">
        @csrf

        <div class="row g-4">

            <div class="col-md-6">
                <label class="form-label">Course Title *</label>
                <input type="text" class="form-control" name="title">
                <div class="error-text" id="error-title"></div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Course City</label>
                <input type="text" class="form-control" name="city">
            </div>

            <div class="col-md-6">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="2"></textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Course Date</label>
                <input type="date" class="form-control" name="course_date">
            </div>

            <div class="col-md-6">
                <label class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" required >
                <div class="error-text" id="error-name"></div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Email *</label>
                <input type="email" class="form-control" name="email" required >
                <div class="error-text" id="error-email"></div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Phone *</label>
                <input type="text" class="form-control" name="mobile" required accept="">
                <div class="error-text" id="error-mobile"></div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Organisation or Company</label>
                <input type="text" class="form-control" name="company">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label>Captcha*</label>
                <div class="d-flex align-items-center">
                    <span id="captcha-img">{!! captcha_img('math') !!}</span>
                    <button type="button" id="refresh-captcha" class="btn btn-secondary ms-3">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>

                <input type="text" name="captcha" class="form-control mt-2" required >
                <div class="error-text" id="error-captcha"></div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-5 mt-4">Submit</button>

    </form>
</div>


@endsection


@section('script')
<script>
    // Refresh Captcha
    document.getElementById('refresh-captcha').addEventListener('click', function () {
        fetch('/refresh-captcha')
        .then(res => res.json())
        .then(data => {
            document.getElementById('captcha-img').innerHTML = data.captcha;
        });
    });

    // Ajax Form Submit
    $('#tailorForm').on('submit', function(e){
        e.preventDefault();

        $('.error-text').text('');   // Clear old errors
        $('#successMessage').addClass('d-none').text('');

        $.ajax({
            url: "/submitTailor",
            method: "POST",
            data: $(this).serialize(),
            success: function(response){
                $('#successMessage').removeClass('d-none').text("Thanks; your request has been submitted successfully !");
                $('#tailorForm')[0].reset();

                // refresh captcha
                $('#refresh-captcha').click();
            },
            error: function(xhr){
                if(xhr.status === 422){
                    let errors = xhr.responseJSON.errors;

                    for(let field in errors){
                        $('#error-' + field).text(errors[field][0]);
                    }
                }
            }
        });
    });
</script>
@endsection
