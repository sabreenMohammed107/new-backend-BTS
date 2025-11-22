<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\ApplicantSalut;
use App\Models\BillingDetails;
use App\Models\Country;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use App\Models\RelatedCourses;
use App\Models\Round;
use App\Models\TailorCourse;
use App\Models\Venue; // تأكد من أنك قد قمت بإضافة هذه السطر
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Mews\Captcha\Facades\Captcha;
class CourseSearchController extends Controller
{
    protected $orderByColumn = 'courses.course_en_name'; // الترتيب الافتراضي على اسم الدورة
    protected $orderByDirection = 'ASC'; // الترتيب الافتراضي سيكون تصاعدي

    public function __construct() {}

    public function index(Request $request)
    {
        // Handle both homepage form and search page form fields
        $word = $request->input('course_name') ?: $request->input('search');
        $search = $request->input('search');
        $category_id = $request->input('category_id');
        $subcategory_id = $request->input('subcategory_id');
        $city_id = $request->input('city_id');
        $start = $request->input('start');
        $end = $request->input('end');
        $venues = $request->input('venue', []); // أخذ الفلاتر المختارة للمكان
        $date_from = $request->input('date_from') ?: $start;
        $date_to = $request->input('date_to') ?: $end;
        $category_id_search = $request->input('category_id_search');
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

        // فلتر الفئة الفرعية
        if (!empty($subcategory_id)) {
            $filters->where('courses.course_sub_category_id', '=', $subcategory_id);
        }

        if (!empty($category_id_search) && $category_id_search !== "Category") {
            $filters->whereHas('course.subCategory', function ($query) use ($category_id_search) {
                $query->where('course_category_id', $category_id_search);
            });
        }

        // فلتر المدينة - handle both city_id from homepage and venue[] from search page
        if (!empty($city_id) && $city_id !== "Venue") {
            $filters->where('rounds.venue_id', '=', $city_id);
        }

        // تاريخ البداية - handle both start and date_from
        if (!empty($start) || !empty($date_from)) {
            $startDate = $start ?: $date_from;
            $filters->where('rounds.round_start_date', '>=', Carbon::parse($startDate));
        }

        // تاريخ النهاية - handle both end and date_to
        if (!empty($end) || !empty($date_to)) {
            $endDate = $end ?: $date_to;
            $filters->where('rounds.round_start_date', '<=', Carbon::parse($endDate));
        }

        // Search by course name - handle both search and course_name fields
        if (!empty($word) || !empty($search)) {
            $searchTerm = $word ?: $search;
            $words = explode(' ', $searchTerm);
            $filters->where(function ($q) use ($words) {
                foreach ($words as $word) {
                    $q->where('courses.course_en_name', 'like', '%' . $word . '%');
                }
            });
        }
        // فلتر الأماكن (Venues) - handle both single and multiple venue selection
        if (!empty($venues) || !empty($city_id)) {
            if (!empty($venues) && is_array($venues)) {
                // If venues array is provided, use it
                $filters->whereIn('rounds.venue_id', $venues);
            } elseif (!empty($city_id) && $city_id !== "Venue") {
                // If city_id is provided, use it
                $filters->where('rounds.venue_id', '=', $city_id);
            }
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
        $filtered = $filters->paginate(15);

        // جلب المدن والفئات
        $venues = Venue::all();
        $subCategories = CourseCategory::where('active', 1)
            ->orderBy('category_en_name', 'asc')
            ->get();

        // عدد النتائج الإجمالي
        $total = $filtered->total();  // الحصول على العدد الإجمالي للنتائج

        return view('front-design-pages.course-search', compact(
            'filtered',
            'word',
            'category_id',
            'city_id',
            'start',
            'end',
            'venues',
            'subCategories',
            'sort_by',
            'total',
            'search',
            'date_from',
            'date_to'
        ));
    }

    public function courseDetails($course_id)
    {
// session()->forget('captcha');
        $now_date = now();
        $course = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();
        $rounds = $course->rounds()->where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->get();
        $specfic_round =  $course->rounds()->where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->first();
        $related_courses = RelatedCourses::with('course')->where('course_id', $course_id)->get();
        $venues = Venue::all();
        $countries = Country::all();
        $saluts = ApplicantSalut::all();
        $objectCourses = Course::orderBy("course_en_name", "asc")->get();
        return view('front-design-pages.single-course', compact('objectCourses', 'venues', 'countries', 'course', 'rounds', 'specfic_round', 'related_courses', 'saluts'));
    }


    public function registerApplicantsDawnload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'captcha' => 'required'
        ]);

        $validator->after(function ($validator) use ($request) {
            if (!captcha_check($request->input('captcha'))) {
                $validator->errors()->add('captcha', 'invalid Captcha');
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $dawnload = Applicant::create($data);

        $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];

        // \Mail::to($emails)->send(new DawnloadNotification($dawnload));

        if (!$request->get('courseBrochure')) {

            return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
        }
    }

    public function requestInHouse($course_id)
    {
        $now_date = now();
        $course = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();
        $rounds = Round::where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->take(7)->get();
        $venues = Venue::all();
        $countries = Country::all();
        $saluts = ApplicantSalut::all();
        // session()->forget('captcha');
        return view('front-design-pages.courses.requestInHouse', compact('course', 'countries', 'venues', 'saluts', 'rounds'))->with('message', 'Thanks; your request has been submitted successfully !');
    }
        public function requestOnline($course_id)
    {
        // session()->forget('captcha');
        $now_date = now();
        $course = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();
        $rounds = Round::where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->take(7)->get();
        $venues = Venue::all();
        $countries = Country::all();
        $saluts = ApplicantSalut::all();
        return view('front-design-pages.courses.requestOnline', compact('course', 'countries', 'venues', 'saluts', 'rounds'))->with('message', 'Thanks; your request has been submitted successfully !');
    }
 //form in tabs in single course inhouse
 public function registerApplicants(Request $request)
 {

    $validator = Validator::make($request->all(), [
        'captcha' => 'required'
    ]);

    $validator->after(function ($validator) use ($request) {
        if (!captcha_check($request->input('captcha'))) {
            $validator->errors()->add('captcha', 'invalid Captcha');
        }
    });

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
     $data = $request->all();
     $quick = Applicant::create($data);
     $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];

     //   \Mail::to($emails)->send(new QuickEnqueryNotification($quick));

     // if (!$request->get('courseBrochure')) {
         return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
     // }
 }
public function registerApplicantsOnline(Request $request)
 {
    $validator = Validator::make($request->all(), [
        'captcha' => 'required'
    ]);

    $validator->after(function ($validator) use ($request) {
        if (!captcha_check($request->input('captcha'))) {
            $validator->errors()->add('captcha', 'invalid Captcha');
        }
    });

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
     $data = $request->all();
     $quick = Applicant::create($data);
     $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];

     //   \Mail::to($emails)->send(new QuickEnqueryNotification($quick));

     // if (!$request->get('courseBrochure')) {
         return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
     // }
 }

    public function registerCourse($round_id)
    {
        // session()->forget('captcha');
        $now_date = now();
        $course = Round::where('id', '=', $round_id)->firstOrFail()->course;
        $course_rounds = $course->rounds()->with('course')->where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->get();
        $venues = Venue::all();
        $countries = Country::all();
        $saluts = ApplicantSalut::all();
        $rounds = Round::where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->take(7)->get();
        return view('front-design-pages.courses.registerCourse', compact('course_rounds', 'rounds', 'course', 'countries', 'venues', 'saluts'));
    }

    public function registerApplicantRounds(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'captcha' => 'required'
        ]);

        $validator->after(function ($validator) use ($request) {
            if (!captcha_check($request->input('captcha'))) {
                $validator->errors()->add('captcha', 'invalid Captcha');
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
         $applicant_data['course_id'] = $request->get('course_id');
        $applicant_data['salut_id'] = $request->get('salut_id');
        $applicant_data['name'] = $request->get('name');
        $applicant_data['country_id'] = $request->get('country_id');
        $applicant_data['job_title'] = $request->get('job_title');
        $applicant_data['company'] = $request->get('company');
        $applicant_data['venue_id'] = $request->get('venue_id');
        $applicant_data['address'] = $request->get('address');
        $applicant_data['email'] = $request->get('email');
        $applicant_data['phone'] = $request->get('phone');
        $applicant_data['mobile'] = $request->get('mobile');
        $applicant_data['fax'] = $request->get('fax');
        $applicant_data['register_round_id'] = $request->get('register_round_id');
        $applicant_data['applicant_type_id'] = $request->get('applicant_type_id');
        $applicant_id = Applicant::create($applicant_data);

        $billing_data['salut_id'] = $request->get('billing_salut_id');
        $billing_data['name'] = $request->get('billing_name');
        $billing_data['job_title'] = $request->get('billing_job_title');
        $billing_data['company'] = $request->get('billing_company');
        $billing_data['address'] = $request->get('billing_address');
        $billing_data['venue_id'] = $request->get('billing_venue_id');
        $billing_data['country_id'] = $request->get('billing_country_id');
        $billing_data['phone'] = $request->get('billing_phone');
        $billing_data['email'] = $request->get('billing_email');
        $billing_data['applicant_id'] = $applicant_id->id;
        $billingDetails = BillingDetails::create($billing_data);

        $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];

        // \Mail::to($emails)->send(new RegisterNotification($applicant_id,$billingDetails));
        return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
    }

    public function downloadBrochure($course_id)
    {
        // session()->forget('captcha');
        $countries = Country::all();
        $course = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();

        return view('front-design-pages.downloadBrochure', compact('course', 'countries'));
    }
    public function tailorCourse(Request $request)
    {
        $now_date = now();

        return view('front-design-pages.tailor-your-course');
    }

    public function submitTailor(Request $request)
    {
       $validator = Validator::make($request->all(), [
           'captcha' => 'required'
       ]);

       $validator->after(function ($validator) use ($request) {
           if (!captcha_check($request->input('captcha'))) {
               $validator->errors()->add('captcha', 'invalid Captcha');
           }
       });

       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       }
        $data = $request->all();
        $quick = TailorCourse::create($data);
        $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];

        //   \Mail::to($emails)->send(new QuickEnqueryNotification($quick));

        // if (!$request->get('courseBrochure')) {
            return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
        // }
    }

    // Get venues/cities by country ID for cascading select
    public function getVenuesByCountry($country_id)
    {
        $venues = Venue::where('country_id', $country_id)
            ->orderBy('venue_en_name', 'ASC')
            ->get(['id', 'venue_en_name']);

        return response()->json($venues);
    }

}
