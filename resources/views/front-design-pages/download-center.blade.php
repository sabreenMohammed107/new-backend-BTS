@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'download-center-page')
@section('page-content')

    <div class="main-course-bg-header">

      <div class="course-main-title">
        <h2>DOWNLOAD CENTER</h2>
      </div>
    </div>

    <div class="container main-course-title-and-details text-center">
      <p>Welcome to the BTS Consultant Download Center. Access key resources like brochures, catalogs, and certifications. Get the tools you need to stay informed and succeed with BTS Consultant.</p>
    </div>
    <div class="container">
      <div class="row">
      <div class="col-12">
          <div class="row download-center-cards">
            @foreach ($downloadCenterData as $data )
            <div class="col-12 col-lg-3">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                  <div class="product-img">
                    <a href="" class="img-container"><img height="100%" src="{{ asset($data->image) }}" alt="#"></a>
                    <div class="course-badge p-3">
                      <div class="row">
                        <div class="col-12 title-section">
                          <h3 class='white-color'>{{ $data->title }}</h3>
                          <p class='white-color'>
                            {{ $data->description }}
                          </p>
                        </div>

                        <div class="col-12 row align-items-center">


                          <div class="col-10 white-color bottom-title">{{ $data->file_size }} | {{ $data->file_extention }} | {{ \Carbon\Carbon::parse($data->created_at)->format('d M, Y') }}
                          </div>
                          <div class="col-2 ">
                            <span class="icon-arrow">
                              <a href=""><i class="fas fa-download clr-white"></i></a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach


          </div>
      </div>
      </div>


    </div>


@endsection
