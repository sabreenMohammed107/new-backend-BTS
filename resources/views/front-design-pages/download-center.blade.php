@extends('front-design-pages.front-layout.app')
  <!-- Body main wrapper start -->

@section('page-id' , 'download-center-page')
@section('page-content')

    <div class="main-course-bg-header">

      <div class="course-main-title text-center">
        <h2>Download Center</h2>
      </div>
    </div>

    <div class="container main-course-title-and-details text-center" style="color: #000 !important;text-align: justify !important;font-size: 20px !important;">
      <p>Welcome to the BTS Consultant Download Center. Access key resources like brochures, catalogs, and certifications. Get the tools you need to stay informed and succeed with BTS Consultant.</p>
    </div>
    <div class="container">
      <div class="row">
      <div class="col-12">
          <div class="row download-center-cards">
            @foreach ($downloadCenterData as $data )
            <div class="col-12 col-lg-3" style="display: flex;justify-content: center;align-items: center;">
                <div class="ltn__product-item ltn__product-item-3 text-left">
                  <div class="product-img" style='height: 100%;'>
                    <a href="{{ route('download-file', $data->id) }}" class="img-container"><img height="100%" src="{{ asset($data->image) }}" alt="#"></a>
                    <div class="course-badge p-3">
                      <div class="row">
                        <div class="col-12 title-section">
                          <h3 class='white-color'>{{ $data->title }}</h3>
                          <p class='white-color'>
                            {{ $data->description }}
                          </p>
                        </div>

                        <div class="col-12 row align-items-center justify-content-end">
                          <div class="col-2">
                            <span class="icon-arrow">
                             <a href=" {{ $data->upload_file }}" download=""><i class="fas fa-download clr-white"></i></a>

                              {{-- <a href="{{ route('download-file', $data->id) }}" download=""><i class="fas fa-download clr-white"></i></a> --}}
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

<style>
    @media (max-width: 767px) {
        .container.main-course-title-and-details.text-center p {
            font-size: 18px;
            padding: 0 15px;
        }
        .download-center-cards .col-12.col-lg-3 {
            justify-content: stretch;
            align-items: stretch;
            width: 100%;
        }
        .download-center-cards .ltn__product-item {
            width: 100%;
        }
        .download-center-cards .ltn__product-item .product-img,
        .download-center-cards .ltn__product-item .product-img .img-container {
            width: 100%;
            height: auto;
        }
        .download-center-cards .ltn__product-item .product-img img {
            width: 100%;
            height: auto;
            display: block;
        }
        #download-center-page .download-center-cards .course-badge h3 {
            font-size: 24px !important;
            line-height: 1.35;
        }
        #download-center-page .download-center-cards .course-badge p {
            font-size: 17px !important;
            line-height: 1.65;
        }
        #download-center-page .ltn__product-item.ltn__product-item-3 .course-badge .title-section {
            padding: 15px 15px 0 15px;
        }
    }
</style>
@endsection
