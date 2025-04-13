
        <div class="ltn__product-item ltn__product-item-3 text-center">
            <div class="product-img">
                <a href="{{ url('courseDetails/'.$round->course->id) }}"><img src="{{ asset('uploads/courses') }}/{{ $round->course->course_image_thumbnail }}" alt="{{ $round->course->course_en_name }}"></a>
            </div>
            <div class="product-info">
                <div class="product-ratting">
                    <ul class="row flags">
                        <li class="col"><i class="fas fa-map-marker-alt"></i>{{ $round->venue->venue_en_name }}</li>
                        <li class="col"><i class="fas fa-clock"></i>{{ $round->course->duration }}-Days</li>
                        <li class="col"><i class="fas fa-dollar-sign"></i>{{ $round->currency->currency_name ?? ""}}-{{ $round->round_price }}</li>
                        <li class="col"><i class="fas fa-calendar-week">  {{ $round->round_start_date }}</i></li>
                    </ul>
                </div>
                <h2 class="product-title">
                    <a href="{{ url('courseDetails/'.$round->course->id) }}">{{ $round->course->course_en_name }}</a>
                </h2>
            </div>
        </div>
