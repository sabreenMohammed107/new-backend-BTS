@extends('front-design-pages.front-layout.app')
@section('page-id' , 'accre-course-page')
@section('page-content')
    <div class="main-course-bg-header">

      <div class="course-main-title text-center">
        <h2>Thanks</h2>
      </div>
    </div>
    <div class="container text-center py-5">
        <h2>Thank you!</h2>
        <p>Your request has been submitted successfully.</p>
        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go to Home</a>
    </div>

@endsection
