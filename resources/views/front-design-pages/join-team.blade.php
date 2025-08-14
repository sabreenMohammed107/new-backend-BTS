@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'join-team-page')
@section('page-content')


    <div class="main-course-bg-header">
    <div class="course-main-title text-center">
        <h2>Join Us AS TEAM MEMBER</h2>
    </div>
    </div>

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2 text-left">

            <span class="col-12 col-md-8 g-clr text-left f-s-13 m-auto">
                We are always interested to meet potential team members to join our fast-growing, dynamic team of professionals in order to continue providing a personalized, efficient, professional and confidential service to our increasing portfolio of clients. Our people are undoubtedly our greatest asset and we pride ourselves on creating an environment where our team look forward to come to work every day. While experience is not a requirement (for certain positions), preference will be given to those applicants who are interested in a challenge, who are results and target-oriented besides wanting to form part of our dynamic team and fast- growing business. Read on below to find out more about what our positions entail and what skills are required.
            </span>

            </div>

        </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
        <h4 class="bullhorn"> <i class="fas fa-bullhorn"></i> Currently Available Jobs </h4>
        <div class="col-lg-6">
            <div class="ltn__faq-inner ltn__faq-inner-2">
            <div id="accordion_2">
                <!-- card -->
                <div class="card">
                <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-1"
                    aria-expanded="false">
                    Training Coordinator
                </h6>
                <div id="faq-item-2-1" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                    <p>Artificial intelligence is transforming our interaction with documents rapidly. AI holds
                        incalculable potential – from data extraction automation to improving review systems.
                        Nonetheless, this potential hinges critically on the quality of the input documents. Like
                        the first Optical Character Recognition (OCR)
                        systems struggled to read poorly scanned documents, AI can be misled by unstructured and
                        unhelpful data. A relationship between AI and document management is necessary to discover
                        the power of AI in document
                        processing. We need to move beyond our AI tools simply recognizing text. Perhaps we should
                        delve deeper into the orbit of semantic understanding. Still, what do we need to create
                        smart documents, and how do we use them to train AI? Let's review how AI support can lead
                        to more intelligent content creation with the bonus of integrated accessibility. Managing
                        a growing
                        volume of documents and records can be challenging. This document
                        control course focuses on effective strategies, tools, and technologies
                        essential to categorizing, managing, storing, preserving, and delivering
                        documents and records in line with business processes. Dive into the core components of
                        ISO 15489 to embrace compliance with best practices in records management. Enhance your
                        expertise in document control and records management with this comprehensive course
                        designed to take you on a journey through the world of managing important documentation.
                        Align your skills with industry standards, including records management ISO 15489 and
                        information security ISO 27001, to ensure compliance and security in handling your
                        organization's data resources. Learn the intricacies of managing both paper and electronic
                        records, enhance your understanding of best practices, and get introduced to the latest
                        technological solutions.</p>
                    </div>
                </div>
                </div>
                <!-- card -->
                <div class="card">
                <h6 class="ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-2"
                    aria-expanded="true">
                    Marketing Specialist
                </h6>
                <div id="faq-item-2-2" class="collapse show" data-parent="#accordion_2">
                    <div class="card-body">
                    <div class="ltn__video-img alignleft">
                        <img src="{{ asset('front-assets/img/bg/17.jpg') }}" alt="video popup bg image">
                        <a class="ltn__video-icon-2 ltn__video-icon-2-small ltn__video-icon-2-border----"
                        href="https://www.youtube.com/embed/LjCzPp-MK48?autoplay=1&showinfo=0"
                        data-rel="lightcase:myCollection">
                        <i class="fa fa-play"></i>
                        </a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec
                        sagittis. Proin libero nunc consequat interdum. Condimentum lacinia quis vel eros donec
                        ac. Mauris sit amet massa vitae tortor. Quisque id diam vel quam elementum pulvinar.
                        Gravida in fermentum et sollicitudin ac orci phasellus. Facilisis gravida neque convallis
                        a cras semper. Non arcu risus quis varius quam quisque id.</p>
                    </div>
                </div>
                </div>
                <!-- card -->
                <div class="card">
                <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-3"
                    aria-expanded="false">
                    Finance Manager
                </h6>
                <div id="faq-item-2-3" class="collapse" data-parent="#accordion_2">
                    <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec
                        sagittis. Proin libero nunc consequat interdum. Condimentum lacinia quis vel eros donec
                        ac. Mauris sit amet massa vitae tortor. Quisque id diam vel quam elementum pulvinar.
                        Gravida in fermentum et sollicitudin ac orci phasellus. Facilisis gravida neque convallis
                        a cras semper. Non arcu risus quis varius quam quisque id.</p>
                    </div>
                </div>
                </div>


            </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="container form-container">
            <h2 class="form-title f-s-20">Apply For Your Desired Job Here</h2>

            <form action="{{ route('job.application.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Course Details -->

                <div class="row mb-3">
                    <div class="col-md-12 mb-3">
                        <label for="career_id" class="form-label"> <i class="fas fa-thumbtack"></i> Job Title</label>
                        <select class="form-select" id="career_id" name="career_id" required>
                            <option value="" selected>Select</option>
                            @foreach($careers as $career)
                                <option value="{{ $career->id }}" {{ old('career_id') == $career->id ? 'selected' : '' }}>{{ $career->job_name }}</option>
                            @endforeach
                        </select>
                        @error('career_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 mb-3">
                        <label for="carrer_level_id" class="form-label"> <i class="fas fa-thumbtack"></i> Career Level</label>
                        <select class="form-select" id="carrer_level_id" name="carrer_level_id" required>
                            <option value="" selected>Select</option>
                            @foreach($careerLevels as $level)
                                <option value="{{ $level->id }}" {{ old('carrer_level_id') == $level->id ? 'selected' : '' }}>{{ $level->level }}</option>
                            @endforeach
                        </select>
                        @error('carrer_level_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-12 mb-3">
                        <label for="expected_salary" class="form-label required"><i class="fas fa-thumbtack"></i> Expected Salary</label>
                        <input type="text" class="form-control" placeholder="Expected Salary" id="expected_salary" name="expected_salary" value="{{ old('expected_salary') }}" required>
                        @error('expected_salary')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="text" class="form-control" placeholder="Mobile" id="mobile" name="mobile" value="{{ old('mobile') }}" required>
                        @error('mobile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 mb-3">
                        <label for="cv_file" class="form-label required">Upload CV with a clear photo</label>
                        <input type="file" class="form-control" id="cv_file" name="cv_file" required>
                        @error('cv_file')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="supporting_docs" class="form-label required">Upload other supporting documents</label>
                        <input type="file" class="form-control" id="supporting_docs" name="supporting_docs">
                        @error('supporting_docs')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row mt-4">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" style="border-radius: 6px;">Apply Now </button>
                    </div>
                </div>
            </form>
            </div>
        </div>


        </div>
    </div>
    </div>
@endsection
