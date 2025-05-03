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
    .main-course-bg-header .course-main-title h2 {
        color: #fff;
        font-size: 55px;
        padding-left: 30px;
        position: absolute;
        bottom: 0;
        left: 0;
    }
</style>
<div class="main-course-bg-header">
    <div class="course-main-title">
        <h2>TAILOR YOUR COURSE</h2>
    </div>
</div>
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <p class="lead">No problem! Reach out to us by filling in the course details you're interested in, and our team will work to address your needs. We'll review your request and get back to you with tailored solutions or alternatives as soon as possible. Your learning journey is our priority!</p>
        </div>
    </div>
    <form>
        <div class="row g-4">
            <div class="col-md-6">
                <label for="courseTitle" class="form-label fw-bold">Course Title</label>
                <input type="text" class="form-control" id="courseTitle" placeholder="Writing Effective Policies, Procedures, Specifications & Standards">
            </div>
            <div class="col-md-6">
                <label for="courseCity" class="form-label fw-bold">Course City</label>
                <input type="text" class="form-control" id="courseCity" placeholder="DUBAI">
            </div>
            <div class="col-md-6">
                <label for="courseDescription" class="form-label fw-bold">Course Description</label>
                <textarea class="form-control" id="courseDescription" rows="2" placeholder="1234567890"></textarea>
            </div>
            <div class="col-md-6">
                <label for="courseDate" class="form-label fw-bold">Date</label>
                <input style="height: 45px" type="date" class="form-control" id="courseDate" placeholder="MM/DD/YYYY">
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" placeholder="FARIS">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label fw-bold">E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="EXAPLE@GMAIL.COM">
            </div>
            <div class="col-md-6">
                <label for="mobile" class="form-label fw-bold">Mobile</label>
                <input type="text" class="form-control" id="mobile" placeholder="123456789">
            </div>
            <div class="col-md-6">
                <label for="organisation" class="form-label fw-bold">Organisation Or Company</label>
                <input type="text" class="form-control" id="organisation" placeholder="EXAMPLE@GMAIL.COM">
            </div>
        </div>
        <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" value="" id="dataAgreement">
            <label class="form-check-label small" for="dataAgreement">
                I AGREE TO THE PROCESSING OF MY DATA FOR THE PURPOSE OF THIS FORM
            </label>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary px-5">PREVIOUS</button>
            <button type="submit" class="btn btn-primary px-5">SUBMIT</button>
        </div>
    </form>
</div>
@endsection

