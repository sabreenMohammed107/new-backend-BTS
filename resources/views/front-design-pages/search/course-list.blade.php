
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
           <div class="ltn__product-item ltn__product-item-3 text-center w-100" >
                <div class="product-img shine">
                    <a href="{{ url('courseDetails/'.$round->course->id) }}" class="img-container">
                        <img src="{{ asset('uploads/courses') }}/{{ $round->course->course_image_thumbnail }}"
                            alt="{{ $round->country->country_en_name }}">
                    </a>

                    <div class="course-badge">
                        {{-- <h3 class='white-color mb-2'>
                            <a href="{{ url('courseDetails/'.$round->course->id) }}" class="img-container">
                            {{ Str::limit($round->course->course_en_name, 70, '') }}
                            </a>
                        </h3> --}}
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
                                <a href="{{ url('courseDetails/'.$round->course->id) }}">{{ $round->course->course_en_name }}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
