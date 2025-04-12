@extends('front-design-pages.front-layout.app')

@section('page-class', 'course-search-page')
@section('page-content')

    <div class="container-fluid main-course-search-nav" style='background-color:#232F3E;'>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3"
                    style="background-color: #12576D;border-top-right-radius:7px;border-bottom-right-radius:7px;">
                    <div class="container-fluid">
                        <form method="get" action="{{ route('searchCourse.index') }}">
                            <input type="text" name="search" value="{{ request('search') }}"
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
                            <div class="widget main-sidebar-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">Fulfilled by BTS</h4>
                                <div class="row justify-content-between">
                                    <div class="left-item-filter col-8">
                                        <input type="checkbox" name="all_courses" id="all_courses"> <span>All Courses</span>
                                    </div>
                                    <span class="col-4 row justify-content-center">( {{ $filtered->total() }} )</span>
                                </div>
                            </div>

                            <!-- Venue Filter -->
                            <div class="widget main-sidebar-widget Venue mt-35">
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
    max-height: 200px; /* تحديد الارتفاع الأقصى للقائمة */
    overflow-y: auto; /* السماح بالتمرير عموديًا إذا كانت المحتويات أكثر من المساحة المحددة */
    padding: 0;
    list-style-type: none; /* إزالة النقط من القائمة */
}

.category-list li {
    padding: 5px 0; /* إضافة مسافة بين العناصر */
}

.category-list a {
    text-decoration: none; /* إزالة التسطير من الروابط */
    color: #000; /* تحديد اللون للنص */
}

.category-list a:hover {
    color: #007bff; /* تغيير اللون عند التمرير على الرابط */
}



    </style>
                            <!-- Date Filter -->
                            <div class="date-filter main-sidebar-widget mt-35">
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

                            <div class="widget ltn__tagcloud-widget mt-35">
                                <h4 class="ltn__widget-title ltn__widget-title-border">Training Categories</h4>
                                <ul class="category-list">
                                    @foreach ($subCategories as $category)
                                        <li>
                                            <a href="{{ route('searchCourse.index', ['category_id' => $category->id]) }}">
                                                {{ $category->subcategory_en_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>



                            <div class="row filter-buttons mt-35 p-5">
                                <button class="col-12 filter-btn" type="submit"
                                    style="position: relative !important">Filter</button>

                                <button class="col-12 tailor-btn mt-15"
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
