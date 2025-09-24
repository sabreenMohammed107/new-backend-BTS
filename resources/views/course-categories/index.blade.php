@extends('layout.main')

@section('breadcrumb')
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">Course Categories</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-dark">Course Categories</li>
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
            <!--begin::Category-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-ecommerce-category-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Course Category" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
                        <a href="{{ route('course-categories.create') }}" class="btn btn-primary">Add Course Category</a>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Cards Grid-->
                    <div class="row g-4" id="kt_ecommerce_category_cards">
                        @foreach ($rows as $index => $row)
                            <!--begin::Category Card-->
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="category-card h-100 position-relative overflow-hidden rounded-3 shadow-sm"
                                     style="background: linear-gradient(135deg, rgba(139, 125, 107, 0.1) 0%, rgba(101, 89, 73, 0.15) 100%);
                                            border: 1px solid rgba(139, 125, 107, 0.2);
                                            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">

                                    <!--begin::Card Background Pattern-->
                                    <div class="card-bg-pattern position-absolute top-0 start-0 w-100 h-100 opacity-10"
                                         style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"grain\" width=\"100\" height=\"100\" patternUnits=\"userSpaceOnUse\"><circle cx=\"25\" cy=\"25\" r=\"1\" fill=\"%23655a49\" opacity=\"0.3\"/><circle cx=\"75\" cy=\"75\" r=\"1\" fill=\"%23655a49\" opacity=\"0.2\"/><circle cx=\"50\" cy=\"10\" r=\"0.5\" fill=\"%23655a49\" opacity=\"0.4\"/><circle cx=\"10\" cy=\"60\" r=\"0.5\" fill=\"%23655a49\" opacity=\"0.3\"/><circle cx=\"90\" cy=\"40\" r=\"0.5\" fill=\"%23655a49\" opacity=\"0.2\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23grain)\"/></svg>');"></div>

                                    <!--begin::Card Content-->
                                    <div class="card-content position-relative p-4 h-100 d-flex flex-column">

                                        <!--begin::Card Header-->
                                        <div class="d-flex align-items-start justify-content-between mb-3">
                                            <!--begin::Checkbox-->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" />
                                            </div>
                                            <!--end::Checkbox-->

                                            <!--begin::Status Badge-->
                                            <div class="status-badge">
                                                @if ($row->active == 1)
                                                    <span class="badge px-3 py-2 rounded-pill"
                                                          style="background: rgba(34, 197, 94, 0.15); color: #16a34a; border: 1px solid rgba(34, 197, 94, 0.3);">
                                                        Active
                                                    </span>
                                                @else
                                                    <span class="badge px-3 py-2 rounded-pill"
                                                          style="background: rgba(239, 68, 68, 0.15); color: #dc2626; border: 1px solid rgba(239, 68, 68, 0.3);">
                                                        Inactive
                                                    </span>
                                                @endif
                                            </div>
                                            <!--end::Status Badge-->
                                        </div>
                                        <!--end::Card Header-->

                                        <!--begin::Image Section-->
                                        <div class="text-center mb-4">
                                            @if($row->category_image)
                                                <div class="category-image-wrapper mx-auto mb-3"
                                                     style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 2px solid rgba(139, 125, 107, 0.3);">
                                                    <img src="{{ asset($row->category_image) }}"
                                                         alt="{{ $row->category_en_name }}"
                                                         class="w-100 h-100 object-fit-cover" />
                                                </div>
                                            @else
                                                <div class="category-image-placeholder mx-auto mb-3 d-flex align-items-center justify-content-center"
                                                     style="width: 80px; height: 80px; border-radius: 50%; background: rgba(139, 125, 107, 0.1); border: 2px solid rgba(139, 125, 107, 0.3);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" style="color: #8b7d6b;">
                                                        <path d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"/>
                                                        <path opacity="0.3" d="M21 5H3C2.4 5 2 5.4 2 6V18C2 18.6 2.4 19 3 19H21C21.6 19 22 18.6 22 18V6C22 5.4 21.6 5 21 5ZM21 5H3C2.4 5 2 5.4 2 6V18C2 18.6 2.4 19 3 19H21C21.6 19 22 18.6 22 18V6C22 5.4 21.6 5 21 5Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Image Section-->

                                        <!--begin::Content Section-->
                                        <div class="flex-grow-1">
                                            <!--begin::Title-->
                                            <h3 class="category-title mb-2"
                                                style="color: #3a3528; font-weight: 600; font-size: 1.25rem; line-height: 1.4;">
                                                <a href="{{ route('course-categories.edit', $row->id) }}"
                                                   class="text-decoration-none text-reset"
                                                   data-kt-ecommerce-category-filter="category_name">
                                                    {{ $row->category_en_name }}
                                                </a>
                                            </h3>
                                            <!--end::Title-->

                                            <!--begin::Arabic Name-->
                                            <p class="category-arabic mb-3"
                                               style="color: #6b5d4f; font-size: 0.95rem; font-weight: 500;">
                                                {{ $row->name_ar }}
                                            </p>
                                            <!--end::Arabic Name-->

                                            <!--begin::Sort Order-->
                                            <div class="sort-order mb-3">
                                                <span class="badge px-3 py-2 rounded-pill"
                                                      style="background: rgba(139, 125, 107, 0.1); color: #8b7d6b; border: 1px solid rgba(139, 125, 107, 0.2);">
                                                    Sort: {{ $row->sort_order }}
                                                </span>
                                            </div>
                                            <!--end::Sort Order-->
                                        </div>
                                        <!--end::Content Section-->

                                        <!--begin::Actions-->
                                        <div class="card-actions mt-auto pt-3">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('course-categories.edit', $row->id) }}"
                                                   class="btn btn-sm flex-grow-1 rounded-pill"
                                                   style="background: rgba(139, 125, 107, 0.1); color: #8b7d6b; border: 1px solid rgba(139, 125, 107, 0.2); transition: all 0.3s ease;">
                                                    Edit
                                                </a>
                                                <a href="{{ route('category.show', $row->id) }}"
                                                   target="_blank"
                                                   class="btn btn-sm flex-grow-1 rounded-pill"
                                                   style="background: rgba(139, 125, 107, 0.1); color: #8b7d6b; border: 1px solid rgba(139, 125, 107, 0.2); transition: all 0.3s ease;">
                                                    View
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm rounded-pill dropdown-toggle"
                                                            type="button"
                                                            data-bs-toggle="dropdown"
                                                            style="background: rgba(139, 125, 107, 0.1); color: #8b7d6b; border: 1px solid rgba(139, 125, 107, 0.2); transition: all 0.3s ease;">
                                                        More
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <form action="{{ route('course-categories.status.update', $row->id) }}" method="post" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item">
                                                                    {{ $row->active ? 'Deactivate' : 'Activate' }}
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="dropdown-item text-danger"
                                                               data-kt-ecommerce-category-filter="delete_row"
                                                               data-id="{{ $row->id }}">Delete</a>
                                                            <form action="{{ route('course-categories.destroy', $row->id) }}"
                                                                  method="post" id="delete_{{ $row->id }}" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Card Content-->
                                </div>
                            </div>
                            <!--end::Category Card-->
                        @endforeach
                    </div>
                    <!--end::Cards Grid-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection

@section('styles')
<style>
    /* Category Cards Styling */
    .category-card {
        background: linear-gradient(135deg, rgba(139, 125, 107, 0.08) 0%, rgba(101, 89, 73, 0.12) 100%);
        border: 1px solid rgba(139, 125, 107, 0.15);
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
    }

    .category-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.05) 50%, transparent 70%);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
        z-index: 1;
    }

    .category-card:hover::before {
        transform: translateX(100%);
    }

    .category-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(139, 125, 107, 0.15),
                    0 8px 16px rgba(101, 89, 73, 0.1),
                    inset 0 1px 0 rgba(255, 255, 255, 0.1);
        border-color: rgba(139, 125, 107, 0.3);
        background: linear-gradient(135deg, rgba(139, 125, 107, 0.12) 0%, rgba(101, 89, 73, 0.18) 100%);
    }

    .category-card .card-content {
        position: relative;
        z-index: 2;
    }

    .category-image-wrapper {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .category-card:hover .category-image-wrapper {
        transform: scale(1.1);
        border-color: rgba(139, 125, 107, 0.5);
    }

    .category-image-wrapper img {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .category-card:hover .category-image-wrapper img {
        transform: scale(1.05);
        filter: brightness(1.1) contrast(1.05);
    }

    .category-title a {
        transition: all 0.3s ease;
        position: relative;
    }

    .category-title a::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #8b7d6b, #655a49);
        transition: width 0.3s ease;
    }

    .category-card:hover .category-title a::after {
        width: 100%;
    }

    .category-card:hover .category-title a {
        color: #655a49 !important;
    }

    .category-card .btn {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .category-card .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .category-card:hover .btn::before {
        left: 100%;
    }

    .category-card:hover .btn {
        background: rgba(139, 125, 107, 0.2) !important;
        border-color: rgba(139, 125, 107, 0.4) !important;
        color: #655a49 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(139, 125, 107, 0.2);
    }

    .status-badge .badge {
        transition: all 0.3s ease;
    }

    .category-card:hover .status-badge .badge {
        transform: scale(1.05);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .sort-order .badge {
        transition: all 0.3s ease;
    }

    .category-card:hover .sort-order .badge {
        background: rgba(139, 125, 107, 0.2) !important;
        border-color: rgba(139, 125, 107, 0.4) !important;
        color: #655a49 !important;
    }

    /* Card background pattern animation */
    .card-bg-pattern {
        animation: grain 8s steps(10) infinite;
    }

    @keyframes grain {
        0%, 100% { transform: translate(0, 0); }
        10% { transform: translate(-5%, -10%); }
        20% { transform: translate(-15%, 5%); }
        30% { transform: translate(7%, -25%); }
        40% { transform: translate(-5%, 25%); }
        50% { transform: translate(-15%, 10%); }
        60% { transform: translate(15%, 0%); }
        70% { transform: translate(0%, 15%); }
        80% { transform: translate(3%, 35%); }
        90% { transform: translate(-10%, 10%); }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .category-card:hover {
            transform: translateY(-4px) scale(1.01);
        }

        .category-card .btn {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }
    }

    /* Loading animation for cards */
    .category-card {
        animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Stagger animation for multiple cards */
    .category-card:nth-child(1) { animation-delay: 0.1s; }
    .category-card:nth-child(2) { animation-delay: 0.2s; }
    .category-card:nth-child(3) { animation-delay: 0.3s; }
    .category-card:nth-child(4) { animation-delay: 0.4s; }
    .category-card:nth-child(5) { animation-delay: 0.5s; }
    .category-card:nth-child(6) { animation-delay: 0.6s; }
</style>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('[data-kt-ecommerce-category-filter="delete_row"]').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');
                Swal.fire({
                    text: "Are you sure you want to delete this course category?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        document.getElementById('delete_' + id).submit();
                    }
                });
            });
        });

        // Add smooth scroll behavior for better UX
        document.addEventListener('DOMContentLoaded', function() {
            // Add intersection observer for card animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all category cards
            document.querySelectorAll('.category-card').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
@endsection
