
        {{-- <div class="ltn__product-item ltn__product-item-3 text-center">
            <div class="product-img shine">
                <a href="{{ url('courseDetails/'.$round->course->id) }}"><img src="{{ asset('uploads/courses') }}/{{ $round->course->course_image_thumbnail }}" alt="{{ $round->course->course_en_name }}"></a>
            </div>
            <div class="product-info w-100">
                <div class="product-ratting">
                    <ul class="row flags" style="font-weight: bold;">
                        <li class="col" ><i class="fas fa-map-marker-alt me-1"></i>{{ $round->venue->venue_en_name }}</li>
                        <li class="col"><i class="fas fa-clock  me-1"></i>{{ $round->course->duration }}-Days</li>
                        <li class="col"><i class="fas fa-dollar-sign  me-1"></i>{{ $round->round_price }}</li>
                        <li class="col"><i class="fas fa-calendar-week  me-1">  {{ \Carbon\Carbon::parse($round->round_start_date)->format('Y-m-d') }}</i></li>
                    </ul>
                </div>
                <h2 class="product-title">
                    <a href="{{ url('courseDetails/'.$round->course->id) }}">{{ $round->course->course_en_name }}</a>
                </h2>
            </div>
        </div> --}}
           <div class="ltn__product-item ltn__product-item-3 text-center w-100 course-card" >
                <div class="product-img shine">
                    <a href="{{ url('courseDetails/'.$round->course->id) }}" class="img-container">
                        <img src="{{ asset('uploads/courses') }}/{{ $round->course->course_image_thumbnail }}"
                            alt="{{ $round->country->country_en_name }}" class="course-image">
                    </a>

                    <div class="course-badge hover-content">
                        <?php $date = date_create($round->round_start_date); ?>
                        <div class="product-info w-100">
                            <div class="product-ratting">
                                <ul class="row flags" style="font-weight: bold;">
                                    <li class="col" ><i class="fas fa-map-marker-alt me-1"></i>{{ $round->venue->venue_en_name }}</li>
                                    <li class="col"><i class="fas fa-clock  me-1"></i>{{ $round->course->duration }}-Days</li>
                                    <li class="col"><i class="fas fa-dollar-sign  me-1"></i>{{ $round->round_price }}</li>
                                    <li class="col"><i class="fas fa-calendar-week  me-1">  {{ \Carbon\Carbon::parse($round->round_start_date)->format('Y-m-d') }}</i></li>
                                </ul>
                            </div>
                            <h2 class="product-title">
                                <a href="{{ url('courseDetails/'.$round->course->id) }}" class="course-title">{{ $round->course->course_en_name }}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

<style>
.course-card {
    position: relative;
    transition: all 0.3s ease;
    overflow: hidden;
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.course-image {
    transition: transform 0.5s ease;
}

.course-card:hover .course-image {
    transform: scale(1.1);
}

.hover-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    padding: 20px;
    opacity: 1;
    transition: all 0.3s ease;
}

.course-card:hover .hover-content {
    opacity: 1;
}

.course-title {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.course-title:hover {
    color: #ffd700;
}

.flags {
    color: #fff;
    margin-bottom: 10px;
}

.flags li {
    margin-bottom: 5px;
}
</style>
