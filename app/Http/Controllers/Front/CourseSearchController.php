<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use App\Models\Round;
use App\Models\Venue; // تأكد من أنك قد قمت بإضافة هذه السطر
use Carbon\Carbon;

class CourseSearchController extends Controller
{
    protected $orderByColumn = 'courses.course_en_name'; // الترتيب الافتراضي على اسم الدورة
    protected $orderByDirection = 'ASC'; // الترتيب الافتراضي سيكون تصاعدي

    public function __construct() {}

    public function index(Request $request)
    {
        $word = $request->input('course_name');
        $search = $request->input('search');
        $category_id = $request->input('category_id');
        $city_id = $request->input('city_id');
        $start = $request->input('start');
        $end = $request->input('end');
        $venues = $request->input('venue', []); // أخذ الفلاتر المختارة للمكان
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');
        $category_id_search=$request->input('category_id_search');
        $now_date = now();

        $sort_by = $request->get('sort_by'); // title, venue, date, duration

        // القاعدة العامة
        $filters = Round::with(['course', 'venue', 'country'])
            ->join('courses', 'courses.id', '=', 'rounds.course_id')
            ->where(function ($query) use ($now_date) {
                $query->where('rounds.round_start_date', '>', $now_date)
                    ->orWhereNull('rounds.round_start_date');
            })
            ->where('rounds.active', '=', 1);

        // فلتر الفئة
        if (!empty($category_id) && $category_id !== "Category") {
            $filters->where('courses.course_sub_category_id', '=', $category_id);
        }
        // فلتر الفئة

        if (!empty($category_id_search) && $category_id_search !== "Category") {
            $filters->whereHas('course.subCategory', function ($query) use ($category_id_search) {
                $query->where('course_category_id', $category_id_search);
            });
        }

        // فلتر المدينة
        if (!empty($city_id) && $city_id !== "Venue") {
            $filters->where('rounds.venue_id', '=', $city_id);
        }

        // تاريخ البداية
        if (!empty($start)) {
            $filters->where('rounds.round_start_date', '>=', Carbon::parse($start));
        }

        // تاريخ النهاية
        if (!empty($end)) {
            $filters->where('rounds.round_start_date', '<=', Carbon::parse($end));
        }

        //
        if (!empty($word) || !empty($search)) {
            $words = explode(' ', $word ?: $search);
            $filters->where(function ($q) use ($words) {
                foreach ($words as $word) {
                    $q->where('courses.course_en_name', 'like', '%' . $word . '%');
                }
            });
        }
        // فلتر الأماكن (Venues)
        if (!empty($venues)) {
            $filters->whereIn('rounds.venue_id', $venues); // التحقق من الأماكن المختارة
        }

        // فلتر التاريخ (Date)
        if ($date_from) {
            $filters->where('rounds.round_start_date', '>=', Carbon::parse($date_from));
        }
        if ($date_to) {
            $filters->where('rounds.round_start_date', '<=', Carbon::parse($date_to));
        }
        // الترتيب بناءً على الاختيار
        switch ($sort_by) {
            case 'course_en_name':
                $filters->orderBy('courses.course_en_name'); // ترتيب حسب اسم الدورة
                break;
            case 'venue_id':
                $filters->orderBy('rounds.venue_id'); // ترتيب حسب ID المكان
                break;
            case 'date':
                $filters->orderBy('rounds.round_start_date'); // ترتيب حسب تاريخ البداية
                break;
            case 'duration':
                $filters->orderByDesc('courses.course_duration'); // ترتيب حسب المدة
                break;
            default:
                $filters->orderBy('rounds.round_start_date'); // الترتيب الافتراضي حسب تاريخ البداية
                break;
        }

        // استخدام paginate للحصول على التصفح
        $filtered = $filters->paginate(8);

        // جلب المدن والفئات
        $venues = Venue::all();
        $subCategories = CourseCategory::where('active', 1)
            ->orderBy('category_en_name', 'asc')
            ->get();

        // عدد النتائج الإجمالي
        $total = $filtered->total();  // الحصول على العدد الإجمالي للنتائج

        return view('front-design-pages.search.index', compact(
            'filtered',   // هنا يتم إرسال rounds بدلاً من filtered
            'word',
            'category_id',
            'city_id',
            'start',
            'end',
            'venues',
            'subCategories',
            'sort_by',
            'total',
            'word',
            'search',
            'category_id',
            'venues',
            'date_from',
            'date_to'

        ));
    }
}
