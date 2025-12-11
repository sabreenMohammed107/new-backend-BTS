@extends('front-design-pages.front-layout.app')
<!-- Body main wrapper start -->

@section('page-class', 'course-search-page')
@section('page-content')
<style>
    /* Search Container Styling */
    .search-container {
        background: linear-gradient(135deg, #12576D 0%, #0d414f 100%);
        border-top-right-radius: 12px;
        border-bottom-right-radius: 12px;
        padding: 2px 0;
        box-shadow: 0 4px 20px rgba(18, 87, 109, 0.3);
        position: relative;
        overflow: hidden;
    }

    .search-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .search-form {
        position: relative;
        z-index: 2;
    }

    .search-input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 25px;
        padding: 5px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .search-input-wrapper:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);

    }

    .search-input-wrapper:focus-within {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);

    }

    .search-input {
        flex: 1;
        border: none;
        outline: none;
        padding: 15px 20px;
        font-size: 16px;
        background: transparent;
        color: #333;
        font-weight: 500;
    }

    .search-input::placeholder {
        color: #999;
        font-weight: 400;
        transition: color 0.3s ease;
    }

    .search-input:focus::placeholder {
        color: #12576D;
        transform: translateX(10px);
    }

    .search-button {
        margin: 5px 6px;
        background: linear-gradient(135deg, #12576D 0%, #0d414f 100%);
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(18, 87, 109, 0.3);
        position: relative;
        overflow: hidden;
    }

    .search-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .search-button:hover::before {
        left: 100%;
    }

    .search-button:hover {
        background: linear-gradient(135deg, #0d414f 0%, #0a2f38 100%);
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(18, 87, 109, 0.4);
    }

    .search-button i {
        color: white;
        font-size: 18px;
        transition: transform 0.3s ease;
    }

    .search-button:hover i {
        transform: scale(1.1);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .search-container {
            border-radius: 12px;
            margin: 10px;
        }

        .search-input-wrapper {
            border-radius: 20px;
        }

        .search-input {
            padding: 12px 15px;
            font-size: 14px;
        }

        .search-button {
            width: 45px;
            height: 45px;
        }

    }

    .filter-chip {
        display: inline-block;
        background: #f0f0f0;
        padding: 5px 10px;
        margin: 2px;
        border-radius: 15px;
        font-size: 12px;
    }

    .remove-filter {
        color: #ff0000;
        text-decoration: none;
        margin-left: 5px;
        font-weight: bold;
    }

    .remove-filter:hover {
        color: #cc0000;
    }

    .active-filters {
        margin-bottom: 20px;
    }

    /* Fix for venue section and filter buttons positioning */
    .Venue-menu {
        max-height: 250px;
        overflow-y: auto;
        margin-bottom: 30px !important;
        padding-bottom: 15px;
        padding-right: 10px;
    }

    .venue-item {
        margin-bottom: 12px;
        padding: 8px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .venue-item:last-child {
        border-bottom: none;
    }

    .filter-buttons-container {
        margin-top: 30px;
        padding: 25px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid #e9ecef;
    }

    .filter-btn {
        background: linear-gradient(135deg, #6A93FF 0%, #3B66E3 100%);
        color: white;
        border: none;
        padding: 15px 25px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(106, 147, 255, 0.3);
        position: relative;
        overflow: hidden;
        width: 100%;
        display: block;
    }

    .filter-btn:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .filter-btn:hover:before {
        left: 100%;
    }

    .filter-btn:hover {
        background: linear-gradient(135deg, #4B79FF 0%, #365FD6 100%);
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(106, 147, 255, 0.4);
    }

    .tailor-btn {
        background: #ffffff;
        color: #6A93FF;
        border: 2px solid #6A93FF;
        padding: 15px 25px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(106, 147, 255, 0.15);
        position: relative;
        overflow: hidden;
        width: 100%;
        display: block;
    }

    .tailor-btn:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .tailor-btn:hover:before {
        left: 100%;
    }

    .tailor-btn:hover {
        background: #6A93FF;
        color: #6A93FF;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(106, 147, 255, 0.35);
    }

    .widget {
        margin-bottom: 30px;
        position: relative;
    }

    /* Ensure proper spacing between sections */
    .main-sidebar-widget {
        margin-bottom: 35px !important;
    }

    /* Fix for the venue checkboxes */
    .left-item-filter {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .left-item-filter input[type="checkbox"] {
        margin: 0;
        transform: scale(1.2);
    }

    .left-item-filter span {
        font-size: 14px;
        color: #333;
    }

    /* Ensure the filter button doesn't overlap */
    .filter-btn {
        position: relative !important;
        z-index: 10;
    }

    /* Remove horizontal scrollbar */
    .Venue-menu::-webkit-scrollbar {
        width: 8px;
    }

    .Venue-menu::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .Venue-menu::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 4px;
    }

    .Venue-menu::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }

    /* Ensure all course card titles render on a single line with ellipsis */
    .single-course-item-card .card h6 {
        {{--  white-space: nowrap;
        overflow: hidden;  --}}
        text-overflow: ellipsis;
        width: 100%;
    }

    .single-course-item-card .card h6 a {
        display: block;
        white-space: inherit;
    }

    /* Align overlay content so titles share the same baseline across cards */
    .single-course-item-card .course-card-overlay {
        display: flex;
        flex-direction: column;
        gap: 8px;
        /* Reserve space for metadata so title baseline is consistent */
        min-height: 115px;
        position: absolute;
        top: 60%;
    }

    .single-course-item-card .course-card-overlay .course-meta {
        margin-bottom: 0 !important;
    }

    /* Course card hover effects */
    .single-course-item-card .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .single-course-item-card:hover .card {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    /* Metadata overlay hover effect */
    .single-course-item-card .course-metadata-overlay {
        opacity: 0 !important;
        transition: opacity 0.3s ease;
        border-radius: 8px 8px 0 0;
    }

    .single-course-item-card:hover .course-metadata-overlay {
        opacity: 1 !important;
    }

    /* Ensure the metadata overlay covers the top portion of the card */
    .single-course-item-card .course-metadata-overlay {
        height: 100%;
        min-height: 80px;
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
    }

    /* Style the metadata items */
    .single-course-item-card .course-metadata-overlay .course-meta li {
        background: rgba(255, 255, 255, 0.1);
        padding: 4px 8px;
        border-radius: 12px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .single-course-item-card .course-metadata-overlay .course-meta li i {
        margin-right: 4px;
        font-size: 11px;
    }

    /* Debug: Make sure the hover area is working */
    .single-course-item-card {
        cursor: pointer;
    }


    {{--  .single-course-item-card .course-card-overlay h6 {
        margin-top: auto;
    }  --}}

    /* Course Search Navigation Links Hover Effects */
    .main-course-search-nav .col-8.row a {
        color: #ffffff !important;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        padding-bottom: 3px;
        display: inline-block;
    }

    .main-course-search-nav .col-8.row a i {
        color: #ffffff !important;
        transition: transform 0.3s ease;
        margin-right: 5px;
    }

    .main-course-search-nav .col-8.row a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #ffffff;
        transition: width 0.3s ease;
    }

    .main-course-search-nav .col-8.row a:hover {
        color: #ffffff !important;
    }

    .main-course-search-nav .col-8.row a:hover::after {
        width: 100%;
    }

    .main-course-search-nav .col-8.row a:hover i {
        color: #ffffff !important;
        transform: scale(1.1);
    }
</style>
<div class="container-fluid main-course-search-nav" style='background-color:#232F3E;'>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 search-container">
                <div class="container-fluid">
                    <form method="get" action="{{ route('course-search') }}" class="search-form">
                        <div class="search-input-wrapper" style="padding: 0">
                            <input type="text" name="search" value="{{ request('search') ?: request('course_name') }}"
                                placeholder="Search for courses..." class="search-input">
                            <button type="submit" class="search-button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-8 row jsutify-content-betwween align-items-center">
                <div class="col"> <a href="{{ route('course-search') }}"> <i class="fas fa-bars"></i> All</a></div>
                <div class="col"><a
                        href="{{ route('course-search', array_merge(request()->query(), ['sort_by' => 'course_en_name'])) }}">
                        <i class="fab fa-tumblr"></i> By Title</a></div>
                <div class="col"><a
                        href="{{ route('course-search', array_merge(request()->query(), ['sort_by' => 'venue_id'])) }}">
                        <i class="fas fa-map-marker-alt"></i> By Venue</a></div>
                <div class="col"><a
                        href="{{ route('course-search', array_merge(request()->query(), ['sort_by' => 'date'])) }}"> <i
                            class="fas fa-calendar"></i> By Date</a></div>
                <div class="col"><a
                        href="{{ route('course-search', array_merge(request()->query(), ['sort_by' => 'duration'])) }}">
                        <i class="far fa-clock"></i> By Duration</a></div>
            </div>
        </div>
    </div>

</div>

<!-- PRODUCT DETAILS AREA START -->
<div class="ltn__product-area ltn__product-gutter mb-120 mt-50">
    <div class="container-fluid">
        <div class="row d-flex flex-column flex-xl-row">
            <div class="col-xl-3 order-xl-1 order-2">
                <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                    <form method="get" action="{{ route('course-search') }}" id="courseFilterForm">
                        <!-- Hidden fields to preserve homepage form data -->
                        @if (request('category_id'))
                        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                        @endif
                        @if (request('city_id'))
                        <input type="hidden" name="city_id" value="{{ request('city_id') }}">
                        @endif

                        <!-- Category Widget -->
                        <div class=" widget main-sidebar-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Fulfilled by BTS</h4>
                            <div class="row justify-content-between">
                                <div class="left-item-filter col-8 ">
                                    <input type="checkbox" name="all_courses" id="all_courses" @if (request('all_courses')) checked @endif> <span>All Courses</span>
                                </div>
                                <span class="col-4 row justify-content-center">( {{ $total ?? 0 }} )</span>
                            </div>
                        </div>
                        <div class="widget main-sidebar-widget Venue">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Venue</h4>
                            <div class="Venue-menu" style="padding :0 20px">
                                @foreach ($venues as $venue)
                                <div class="row justify-content-between venue-item">
                                    <div class="left-item-filter col-12">
                                        <input type="checkbox" name="venue[]" value="{{ $venue->id }}"
                                            id="venue-{{ $venue->id }}" @if (in_array($venue->id,
                                        request()->get('venue', [])) || request('city_id') == $venue->id) checked
                                        @endif>
                                        <span>{{ $venue->venue_en_name }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Price Filter Widget -->
                        <div class=" date-filter main-sidebar-widget mt-35">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Date</h4>
                            <div class="price_filter">
                                <div class="date-range-container">

                                    <div class="date-input-group">
                                        <div class="input-date">
                                            <input type="text" class="course-input" name="date_from" placeholder="From"
                                                value="{{ request('date_from') ?: request('start') }}"
                                                onfocus="(this.type='date')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="calendar-icon bi bi-calendar"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </div>

                                        <span class="separator">-</span>

                                        <div class="input-date">
                                            <input type="text" class="course-input" name="date_to" placeholder="To"
                                                value="{{ request('date_to') ?: request('end') }}"
                                                onfocus="(this.type='date')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="calendar-icon bi bi-calendar"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget ltn__tagcloud-widget mt-35">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Training Categories</h4>
                            <ul style="
                                display: flex;
                                flex-direction: column;
                            ">
                                @foreach ($subCategories as $category)
                                <li><a
                                        href="{{ route('course-search', array_merge(request()->query(), ['category_id_search' => $category->id])) }}">{{
                                        $category->category_en_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="filter-buttons-container">
                            <button class="filter-btn w-100" type="submit">Filter</button>
                            <button class="tailor-btn w-100 mt-3" type="button"
                                onclick="window.location.href='{{ route('tailor-your-course') }}'">Tailor Your
                                Course</button>
                        </div>
                    </form>
                </aside>
            </div>

            <div class="container col-xl-9 order-xl-2 order-1">
                <div class="ltn__search-course-breadcrumb-area">
                    <div class="row">
                        <h3>Results : <span>{{ $total ?? 0 }}</span></h3>
                        <p>Check each course page for other register options.</p>
                    </div>
                </div>

                <!-- Active Filters Display -->
                <div class="active-filters d-flex flex-wrap gap-2 mb-3">
                    @if (request('search') || request('course_name'))
                    <div class="filter-chip">
                        Name: {{ request('search') ?: request('course_name') }}
                        <a href="{{ request()->fullUrlWithQuery(['search' => null, 'course_name' => null]) }}"
                            class="remove-filter">&times;</a>
                    </div>
                    @endif
                    @if (request('category_id'))
                    <div class="filter-chip">
                        Category:
                        {{ $subCategories->firstWhere('id', request('category_id'))->category_en_name ?? 'Unknown' }}
                        <a href="{{ request()->fullUrlWithQuery(['category_id' => null]) }}"
                            class="remove-filter">&times;</a>
                    </div>
                    @endif
                    @if (request('city_id'))
                    <div class="filter-chip">
                        Venue: {{ $venues->firstWhere('id', request('city_id'))->venue_en_name ?? 'Unknown' }}
                        <a href="{{ request()->fullUrlWithQuery(['city_id' => null]) }}"
                            class="remove-filter">&times;</a>
                    </div>
                    @endif
                    @if (request('venue'))
                    @foreach (request('venue') as $venueId)
                    <div class="filter-chip">
                        Venue: {{ $venues->firstWhere('id', $venueId)->venue_en_name ?? 'Unknown' }}
                        <a href="{{ request()->fullUrlWithQuery(['venue' => collect(request('venue'))->reject(fn($v) => $v == $venueId)->values()->all() ?: null]) }}"
                            class="remove-filter">&times;</a>
                    </div>
                    @endforeach
                    @endif
                    @if (request('date_from') || request('start'))
                    <div class="filter-chip">
                        Date From: {{ request('date_from') ?: request('start') }}
                        <a href="{{ request()->fullUrlWithQuery(['date_from' => null, 'start' => null]) }}"
                            class="remove-filter">&times;</a>
                    </div>
                    @endif
                    @if (request('date_to') || request('end'))
                    <div class="filter-chip">
                        Date To: {{ request('date_to') ?: request('end') }}
                        <a href="{{ request()->fullUrlWithQuery(['date_to' => null, 'end' => null]) }}"
                            class="remove-filter">&times;</a>
                    </div>
                    @endif
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_product_grid">
                        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                            <div class="row">
                                @if (isset($filtered) && $filtered->count() > 0)
                                @foreach ($filtered as $round)
                                <div class="col-xl-4 mb-3 col-sm-6 col-12 single-course-item-card">
                                    <a href="{{ url('courseDetails/' . $round->course->id) }}">
                                    <div class="card h-100 border-0 shadow-sm overflow-hidden rounded-3">
                                        <!-- الصورة -->
                                        <div class="position-relative">

                                                <img class="w-100 " style="height:250px; object-fit:cover;"
                                                    src="{{ $round->course->course_image_thumbnail
                                                        ? asset('uploads/courses/' . $round->course->course_image_thumbnail)
                                                        : asset('front-assets/img/No-Image-Placeholder.svg.png') }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('front-assets/img/No-Image-Placeholder.svg.png') }}';"
                                                    alt="{{ $round->course->course_en_name }}">

                                            <!-- Course metadata overlay - appears on hover with animation -->
                                            <div class="course-metadata-overlay w-100 text-white p-3"
                                                style="heught:100%;position: absolute; top: 0; left: 0; background: rgba(0,0,0,0.2); z-index: 2;">
                                                <ul class="d-flex flex-wrap gap-3 mb-2 small align-items-center course-meta"
                                                    style="font-size:12px; list-style: none; margin:0; padding:0;">
                                                    <li class="d-flex align-items-center mt-0 mb-0">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <span>{{ $round->venue->venue_en_name }}</span>
                                                    </li>
                                                    <li class="d-flex align-items-center mt-0 mb-0">
                                                        <i class="fas fa-clock"></i>
                                                        <span>{{ $round->course->course_duration }}-Days</span>
                                                    </li>
                                                    <li class="d-flex align-items-center mt-0 mb-0">
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <span>USD-{{ $round->course->course_price ?? 'N/A' }}</span>
                                                    </li>
                                                    <li class="d-flex align-items-center mt-0 mb-0">
                                                        <i class="fas fa-calendar-week"></i>
                                                        <span>{{ $round->round_start_date ?
                                                            \Carbon\Carbon::parse($round->round_start_date)->format('d-m-Y')
                                                            : 'TBD' }}</span>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Course title overlay -->
                                            <div class=" w-100 text-white p-4 course-card-overlay"
                                                style="background:linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0));">
                                                <h6 class="fw-bold mb-0">
                                                    <a class="text-white text-decoration-none"
                                                        href="{{ url('courseDetails/' . $round->course->id) }}">
                                                        {{ $round->course->course_en_name }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                </div>
                                @endforeach
                                @else
                                <div class="col-12 text-center">
                                    <h3>No courses found matching your criteria.</h3>
                                    <p>Try adjusting your search filters or <a
                                            href="{{ route('tailor-your-course') }}">request a tailor-made
                                            course</a>.</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @if (isset($filtered) && $filtered->hasPages())
                <div class="ltn__pagination-area text-center">
                    <div class="ltn__pagination">
                        {{ $filtered->appends(request()->query())->links('vendor.pagination.ltn') }}
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
<!-- PRODUCT DETAILS AREA END -->


@endsection

@section('style')

@endsection
