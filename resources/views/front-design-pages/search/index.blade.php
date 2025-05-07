@extends('front-design-pages.front-layout.app')

@section('page-class', 'course-search-page')
@section('page-content')
    <style>
    /* Image container styles */
    .ltn__product-item-3 .product-img {
        position: relative;
        overflow: hidden;
        border-radius: 6px;
        /* height: 12rem; */
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ltn__product-item-3 .product-img .img-container {
        display: block;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .ltn__product-item-3 .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    /* Shine hover effect */
    .ltn__product-item-3 .product-img.shine {
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .ltn__product-item-3 .product-img.shine::before {
        background: linear-gradient(to right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.5) 50%,
                rgba(255, 255, 255, 0) 100%);
        content: "";
        display: block;
        height: 100%;
        left: -75%;
        position: absolute;
        top: 0;
        transform: skewX(-25deg);
        width: 50%;
        z-index: 2;
    }

    .ltn__product-item-3 .product-img.shine:hover::before,
    .ltn__product-item-3 .product-img.shine:focus::before {
        animation: shine 2s ease-in-out;
    }

    @keyframes shine {
        0% {
            left: -75%;
        }
        100% {
            left: 125%;
        }
    }
</style>

    <div class="container-fluid main-course-search-nav" style='background-color:#232F3E;'>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3"
                    style="background-color: #12576D;border-top-right-radius:7px;border-bottom-right-radius:7px;">
                    <div class="container-fluid">
                        <form method="get" action="{{ route('searchCourse.index') }}">
                            <input type="text" id="search" name="search" value="{{ request('search') }}"
                                placeholder="Search here...">
                            <button type="submit">
                                <span><i class="icon-search"></i></span>
                            </button>
                        </form>
                    </div>
                </div>
                @php $query = request()->except('sort'); @endphp

                <div class="col-9 row justify-content-between align-items-center">
                    <div class="col"><a
                            href="{{ route('searchCourse.index', ['sort_by' => 'course_en_name', 'sort_direction' => 'asc']) }}">
                            <i class="fab fa-tumblr"></i> BY TITLE</a></div>
                    <div class="col"><a
                            href="{{ route('searchCourse.index', ['sort_by' => 'venue_id', 'sort_direction' => 'asc']) }}">
                            <i class="fas fa-map-marker-alt"></i> BY VENUE</a></div>
                    <div class="col"><a
                            href="{{ route('searchCourse.index', ['sort_by' => 'round_start_date', 'sort_direction' => 'asc']) }}">
                            <i class="fas fa-calendar"></i> BY DATE</a></div>
                    <div class="col"><a
                            href="{{ route('searchCourse.index', ['sort_by' => 'duration', 'sort_direction' => 'asc']) }}">
                            <i class="far fa-clock"></i> BY DURATION</a></div>

                </div>
            </div>
        </div>
    </div>

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120 mt-50">
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-3">

                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <form method="get" action="{{ route('searchCourse.index') }}" id="courseFilterForm">
                            <!-- Category Widget -->
                            {{-- <div class="widget main-sidebar-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">Fulfilled by BTS</h4>
                                <div class="row justify-content-between">
                                    <div class="left-item-filter col-8">
                                        <input type="checkbox" name="all_courses" id="all_courses"> <span>All Courses</span>
                                    </div>
                                    <span class="col-4 row justify-content-center">( {{ $filtered->total() }} )</span>
                                </div>
                            </div> --}}
                            <!-- Venue Filter -->
                            <div class="widget main-sidebar-widget Venue ">
                                <h4 class="ltn__widget-title ltn__widget-title-border">Venue</h4>
                                <div class="Venue-menu">
                                    @foreach ($venues as $venue)
                                        <div class="row justify-content-between">
                                            <div class="left-item-filter col-12">
                                                <input type="checkbox" name="venue[]" value="{{ $venue->id }}"
                                                    id="venue-{{ $venue->id }}"
                                                    @if (in_array($venue->id, request()->get('venue', []))) checked @endif>
                                                <span>{{ $venue->venue_en_name }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <style>
                                .category-list {

                                    max-height: 200px;
                                    overflow-y: auto;
                                    display: flex;
                                    flex-wrap: wrap;
                                    gap: 10px;
                                    padding: 0;
                                    list-style: none;
                                }

                                .category-list li {
                                    margin: 0;
                                }

                                .category-list a {
                                    display: inline-block;
                                    padding: 6px 12px;
                                    background-color: #e9eff8;
                                    border-radius: 6px;
                                    font-size: 0.875rem;
                                    color: #333;
                                    text-decoration: none;
                                    white-space: nowrap;
                                    /* prevents long text from wrapping */
                                }

                                .category-list a:hover {
                                    background-color: rgb(18, 87, 109) !important;
                                    color: #007bff;

                                }



                                .filter-chip {
                                    background-color: #f1f1f1;
                                    color: #333;
                                    border-radius: 20px;
                                    padding: 6px 12px;
                                    display: inline-flex;
                                    align-items: center;
                                    font-size: 14px;
                                }

                                .filter-chip .remove-filter {
                                    color: #888;
                                    margin-left: 8px;
                                    font-weight: bold;
                                    text-decoration: none;
                                }

                                .filter-chip .remove-filter:hover {
                                    color: #d00;
                                }
                            </style>
                            <!-- Date Filter -->
                            <div class="date-filter main-sidebar-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">Date</h4>
                                <div class="price_filter">
                                    <div class="date-range-container">
                                        <div class="date-input-group">
                                            <div class="input-date">
                                                <input type="text" class="course-input" name="date_from"
                                                    placeholder="From" value="{{ request()->input('date_from') }}"
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
                                                    value="{{ request()->input('date_to') }}" onfocus="(this.type='date')">
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
                            <div class="row filter-buttons  px-5">
                                <button class="col-12 filter-btn" type="submit"
                                    style="position: relative !important">Filter</button>


                            </div>
                            <div class="widget ltn__tagcloud-widget mt-5">
                                <h4 class="ltn__widget-title ltn__widget-title-border">Training Categories</h4>
                                <ul class="category-list">
                                    @foreach ($subCategories as $category)
                                        <li>
                                            <a
                                                href="{{ route('searchCourse.index', ['category_id_search' => $category->id]) }}">
                                                {{ $category->category_en_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row filter-buttons  p-5">


                                <button class="col-12 tailor-btn "
                                    onclick="window.location.href='{{ route('course-search') }}';"
                                    style="position: relative !important">
                                    Tailor your course
                                </button>

                            </div>



                        </form>

                    </aside>
                </div>

                <div class="col-xl-9">
                    <div class="ltn__search-course-breadcrumb-area">
                        <div class="active-filters d-flex flex-wrap gap-2 mb-3">
                            @if (request('search'))
                                <div class="filter-chip">
                                    Name: {{ request('search') }}
                                    <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                        class="remove-filter">&times;</a>
                                </div>
                            @endif
                            {{-- Venues --}}
                            @if (request('venue'))
                                @foreach (request('venue') as $venueId)
                                    <div class="filter-chip">
                                        Venue: {{ $venues->firstWhere('id', $venueId)->venue_en_name ?? 'Unknown' }}
                                        <a href="{{ request()->fullUrlWithQuery(['venue' => collect(request('venue'))->reject(fn($v) => $v == $venueId)->values()->all() ?: null]) }}"
                                            class="remove-filter">&times;</a>
                                    </div>
                                @endforeach
                            @endif
                            {{-- Categories --}}
                            @if (request()->has('category_id_search'))
                                @foreach (explode(',', request('category_id_search')) as $catId)
                                    <div class="filter-chip">
                                        Category:
                                        {{ $subCategories->firstWhere('id', $catId)->category_en_name ?? 'Unknown' }}
                                        <a href="{{ request()->fullUrlWithQuery(['category_id_search' =>collect(explode(',', request('category_id_search')))->reject(fn($c) => $c == $catId)->implode(',') ?:null]) }}"
                                            class="remove-filter">&times;</a>
                                    </div>
                                @endforeach
                            @endif

                            {{-- Date From --}}
                            @if (request('date_from'))
                                <div class="filter-chip">
                                    Date From: {{ request('date_from') }}
                                    <a href="{{ request()->fullUrlWithQuery(['date_from' => null]) }}"
                                        class="remove-filter">&times;</a>
                                </div>
                            @endif

                            {{-- Date To --}}
                            @if (request('date_to'))
                                <div class="filter-chip">
                                    Date To: {{ request('date_to') }}
                                    <a href="{{ request()->fullUrlWithQuery(['date_to' => null]) }}"
                                        class="remove-filter">&times;</a>
                                </div>
                            @endif

                            {{-- Keyword --}}
                            @if (request('keyword'))
                                <div class="filter-chip">
                                    Search: {{ request('keyword') }}
                                    <a href="{{ request()->fullUrlWithQuery(['keyword' => null]) }}"
                                        class="remove-filter">&times;</a>
                                </div>
                            @endif

                            {{-- Clear All --}}
                            @if (request()->hasAny(['venue', 'category_id_search', 'date_from', 'date_to', 'keyword']))
                                <a href="{{ route('searchCourse.index') }}"
                                    class="btn btn-sm btn-outline-danger ms-2">Clear All</a>
                            @endif
                        </div>

                        <div class="row">
                            <h3>Results / <span>{{ $filtered->total() }}</span></h3>
                            <p>Check each course page for other register options.</p>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    @isset($filtered)
                                        @foreach ($filtered as $round)
                                            <div class="col-xl-4 col-sm-6 col-6 single-course-item-card">

                                                @include('front-design-pages.search.course-list', [
                                                    'round' => $round,
                                                ])
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            {{ $filtered->appends(request()->query())->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

@endsection
