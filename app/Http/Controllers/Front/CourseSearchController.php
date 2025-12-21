<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\DawnloadNotification;
use App\Mail\OnlineEnqueryNotification;
use App\Mail\QuickEnqueryNotification;
use App\Mail\QuickInhouseNotification;
use App\Mail\RegisterNotification;
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
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CourseSearchController extends Controller
{
    protected $orderByColumn    = 'courses.course_en_name';
    protected $orderByDirection = 'ASC';
    public function __construct()
    {}

    public function index(Request $request)
    {
        // Handle "All Courses" checkbox - if checked, ignore all other filters
        $all_courses = $request->input('all_courses');

        // Handle both homepage form and search page form fields
        $word               = $request->input('course_name') ?: $request->input('search');
        $search             = $request->input('search');
        $category_id        = $request->input('category_id'); // SubCategory ID from homepage
        $subcategory_id     = $request->input('subcategory_id');
        $city_id            = $request->input('city_id');
        $start              = $request->input('start');
        $end                = $request->input('end');
        $venuesInput        = $request->input('venue', []); // Venue filter array
        $date_from          = $request->input('date_from') ?: $start;
        $date_to            = $request->input('date_to') ?: $end;
        $category_id_search = $request->input('category_id_search'); // CourseCategory ID from sidebar
        $now_date           = now();

        $sort_by = $request->get('sort_by'); // title, venue, date, duration

        // Base query
        $filters = Round::with(['course.subCategory.courseCategory', 'venue', 'country'])
            ->join('courses', 'courses.id', '=', 'rounds.course_id')
            ->where(function ($query) use ($now_date) {
                $query->where('rounds.round_start_date', '>', $now_date)
                    ->orWhereNull('rounds.round_start_date');
            })
            ->where('rounds.active', '=', 1);

        // If "All Courses" is NOT checked, apply filters
        if (empty($all_courses)) {
            // Filter by SubCategory (from homepage category dropdown)
            if (! empty($category_id) && $category_id !== "Category") {
                $filters->where('courses.course_sub_category_id', '=', $category_id);
            }

            // Filter by SubCategory ID directly
            if (! empty($subcategory_id)) {
                $filters->where('courses.course_sub_category_id', '=', $subcategory_id);
            }

            // Filter by CourseCategory (from sidebar Training Categories)
            if (! empty($category_id_search) && $category_id_search !== "Category") {
                $filters->whereHas('course.subCategory', function ($query) use ($category_id_search) {
                    $query->where('course_category_id', $category_id_search);
                });
            }

            // Filter by venue - handle both city_id from homepage and venue[] from search page
            if (! empty($venuesInput) && is_array($venuesInput) && count($venuesInput) > 0) {
                $filters->whereIn('rounds.venue_id', $venuesInput);
            } elseif (! empty($city_id) && $city_id !== "Venue") {
                $filters->where('rounds.venue_id', '=', $city_id);
            }

            // Date from filter
            if (! empty($date_from)) {
                $filters->where('rounds.round_start_date', '>=', Carbon::parse($date_from));
            }

            // Date to filter
            if (! empty($date_to)) {
                $filters->where('rounds.round_start_date', '<=', Carbon::parse($date_to));
            }

            // Search by course name
            if (! empty($word)) {
                $words = explode(' ', $word);
                $filters->where(function ($q) use ($words) {
                    foreach ($words as $w) {
                        $q->where('courses.course_en_name', 'like', '%' . $w . '%');
                    }
                });
            }
        }

        // Sorting
        switch ($sort_by) {
            case 'course_en_name':
                $filters->orderBy('courses.course_en_name');
                break;
            case 'venue_id':
                $filters->orderBy('rounds.venue_id');
                break;
            case 'date':
                $filters->orderBy('rounds.round_start_date');
                break;
            case 'duration':
                $filters->orderByDesc('courses.course_duration');
                break;
            default:
                $filters->orderBy('rounds.round_start_date');
                break;
        }

        // Paginate results
        $filtered = $filters->paginate(15);

        // Get venues and categories for filters
        $venues = Venue::all();

        // Get CourseCategories for Training Categories sidebar
        $courseCategories = CourseCategory::where('active', 1)
            ->orderBy('category_en_name', 'asc')
            ->get();

        // Get SubCategories for homepage category filter badge display
        $subCategoriesList = CourseSubCategory::where('active', 1)
            ->orderBy('subcategory_en_name', 'asc')
            ->get();

        $total = $filtered->total();

        return view('front-design-pages.course-search', compact(
            'filtered',
            'word',
            'category_id',
            'city_id',
            'start',
            'end',
            'venues',
            'courseCategories',
            'subCategoriesList',
            'sort_by',
            'total',
            'search',
            'date_from',
            'date_to',
            'category_id_search',
            'all_courses'
        ));
    }

    public function courseDetails($course_id)
    {
// session()->forget('captcha');
        $now_date        = now();
        $course          = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();
        $rounds          = $course->rounds()->where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->get();
        $specfic_round   = $course->rounds()->where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->first();
        $related_courses = RelatedCourses::with('course')->where('course_id', $course_id)->get();
        $venues          = Venue::all();
        $countries       = Country::all();
        $saluts          = ApplicantSalut::all();
        $objectCourses   = Course::orderBy("course_en_name", "asc")->get();
        return view('front-design-pages.single-course', compact('objectCourses', 'venues', 'countries', 'course', 'rounds', 'specfic_round', 'related_courses', 'saluts'));
    }

    public function registerApplicantsDawnload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string',
            'company' => 'required|string',
            'email'   => [
        'required',
        'email',
        // شرط رفض الإيميلات الشخصية
        function ($attribute, $value, $fail) {
            $personalDomains = [
                'gmail.com',
                'yahoo.com',
                'outlook.com',
                'hotmail.com',
                'live.com',
                'aol.com',
                'icloud.com',
                'protonmail.com',
                'zoho.com',
            ];

            $domain = strtolower(substr(strrchr($value, "@"), 1));

            if (in_array($domain, $personalDomains)) {
                $fail("Please use a business email address, personal emails are not accepted.");
            }
        },
    ],
            'captcha' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data     = $request->all();
        $dawnload = Applicant::create($data);

        $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];

        Mail::to($emails)->send(new DawnloadNotification($dawnload));

        if (! $request->get('courseBrochure')) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Thanks; your request has been submitted successfully !',
            ], 200);
        }

    }

    public function requestInHouse($course_id)
    {
        $now_date  = now();
        $course    = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();
        // Get unique courses by selecting the earliest upcoming round per course
        $rounds    = Round::where('rounds.active', '=', 1)
            ->where('round_start_date', '>', $now_date)
            ->whereIn('id', function ($query) use ($now_date) {
                $query->selectRaw('MIN(id)')
                    ->from('rounds')
                    ->where('active', '=', 1)
                    ->where('round_start_date', '>', $now_date)
                    ->groupBy('course_id');
            })
            ->orderBy('round_start_date', 'asc')
            ->take(7)
            ->get();
        $venues    = Venue::all();
        $countries = Country::all();
        $saluts    = ApplicantSalut::all();
        // session()->forget('captcha');
        return view('front-design-pages.courses.requestInHouse', compact('course', 'countries', 'venues', 'saluts', 'rounds'))->with('message', 'Thanks; your request has been submitted successfully !');
    }
    public function requestOnline($course_id)
    {
        // session()->forget('captcha');
        $now_date  = now();
        $course    = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();
        // Get unique courses by selecting the earliest upcoming round per course
        $rounds    = Round::where('rounds.active', '=', 1)
            ->where('round_start_date', '>', $now_date)
            ->whereIn('id', function ($query) use ($now_date) {
                $query->selectRaw('MIN(id)')
                    ->from('rounds')
                    ->where('active', '=', 1)
                    ->where('round_start_date', '>', $now_date)
                    ->groupBy('course_id');
            })
            ->orderBy('round_start_date', 'asc')
            ->take(7)
            ->get();
        $venues    = Venue::all();
        $countries = Country::all();
        $saluts    = ApplicantSalut::all();
        return view('front-design-pages.courses.requestOnline', compact('course', 'countries', 'venues', 'saluts', 'rounds'))->with('message', 'Thanks; your request has been submitted successfully !');
    }
    //form in tabs in single course inhouse
    public function registerApplicants(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'    => 'required|string',
            'company' => 'required|string',
            'email'   => [
        'required',
        'email',
        function ($attribute, $value, $fail) {
            $personalDomains = [
                'gmail.com',
                'yahoo.com',
                'outlook.com',
                'hotmail.com',
                'live.com',
                'aol.com',
                'icloud.com',
                'protonmail.com',
                'zoho.com',
            ];

            $domain = strtolower(substr(strrchr($value, "@"), 1));

            if (in_array($domain, $personalDomains)) {
                $fail("Please use a business email address, personal emails are not accepted.");
            }
        },
    ],
            'captcha' => 'required|captcha',
            'phone'   => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data   = $request->all();
        $quick  = Applicant::create($data);
        $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];

          Mail::to($emails)->send(new QuickInhouseNotification($quick));

        // if (!$request->get('courseBrochure')) {
        return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
        // }
    }
     public function registerApplicantsEnquiry(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name'                => 'required|string|max:255',
        'company'             => 'required|string|max:255',
        'salut_id'            => 'nullable|integer',
        'job_title'           => 'nullable|string|max:255',
        'country_id'          => 'required|integer',
        'venue_id'            => 'required|integer',
        'course_id'           => 'required|integer',
        'applicant_type_id'   => 'required|integer',
        'quk_enquery_notes'   => 'required|string',
        'captcha'             => 'required|captcha',
        'email'               => [
            'required',
            'email',
            function ($attribute, $value, $fail) {
                $personalDomains = ['gmail.com', 'yahoo.com', 'outlook.com', 'hotmail.com', 'live.com', 'aol.com', 'icloud.com', 'protonmail.com', 'zoho.com'];
                $domain = strtolower(substr(strrchr($value, "@"), 1));

                if (in_array($domain, $personalDomains)) {
                    $fail("Please use a business email address; personal emails are not accepted.");
                }
            },
        ],
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Save the data
    $quick = Applicant::create($request->all());

    // Optional: Send Email (Uncomment if needed)
    $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];
    Mail::to($emails)->send(new QuickEnqueryNotification($quick));

    return redirect()->back()->with('success', 'Thanks; your request has been submitted successfully!');
}
    public function registerApplicantsOnline(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string',
            'company' => 'required|string',
            'email'   => [
        'required',
        'email',
        // شرط رفض الإيميلات الشخصية
        function ($attribute, $value, $fail) {
            $personalDomains = [
                'gmail.com',
                'yahoo.com',
                'outlook.com',
                'hotmail.com',
                'live.com',
                'aol.com',
                'icloud.com',
                'protonmail.com',
                'zoho.com',
            ];

            $domain = strtolower(substr(strrchr($value, "@"), 1));

            if (in_array($domain, $personalDomains)) {
                $fail("Please use a business email address, personal emails are not accepted.");
            }
        },
    ],
            'captcha' => 'required|captcha',
            'phone'   => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data   = $request->all();
        $quick  = Applicant::create($data);
        $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];

          Mail::to($emails)->send(new OnlineEnqueryNotification($quick));

        // if (!$request->get('courseBrochure')) {
        return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
        // }
    }

    public function registerCourse($round_id)
    {
        // session()->forget('captcha');
        $now_date      = now();
        $course        = Round::where('id', '=', $round_id)->firstOrFail()->course;
        $course_rounds = $course->rounds()->with('course')->where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->get();
        $venues        = Venue::all();
        $countries     = Country::all();
        $saluts        = ApplicantSalut::all();
        // Get unique courses by selecting the earliest upcoming round per course
        $rounds        = Round::where('rounds.active', '=', 1)
            ->where('round_start_date', '>', $now_date)
            ->whereIn('id', function ($query) use ($now_date) {
                $query->selectRaw('MIN(id)')
                    ->from('rounds')
                    ->where('active', '=', 1)
                    ->where('round_start_date', '>', $now_date)
                    ->groupBy('course_id');
            })
            ->orderBy('round_start_date', 'asc')
            ->take(7)
            ->get();
        return view('front-design-pages.courses.registerCourse', compact('course_rounds', 'rounds', 'course', 'countries', 'venues', 'saluts'));
    }

    public function registerApplicantRounds(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha',
            'email' => [
        'required',
        'email',
        // شرط رفض الإيميلات الشخصية
        function ($attribute, $value, $fail) {
            $personalDomains = [
                'gmail.com',
                'yahoo.com',
                'outlook.com',
                'hotmail.com',
                'live.com',
                'aol.com',
                'icloud.com',
                'protonmail.com',
                'zoho.com',
            ];

            $domain = strtolower(substr(strrchr($value, "@"), 1));

            if (in_array($domain, $personalDomains)) {
                $fail("Please use a business email address, personal emails are not accepted.");
            }
        },
    ],
    'billing_email'=> [
        'required',
        'email',
        // شرط رفض الإيميلات الشخصية
        function ($attribute, $value, $fail) {
            $personalDomains = [
                'gmail.com',
                'yahoo.com',
                'outlook.com',
                'hotmail.com',
                'live.com',
                'aol.com',
                'icloud.com',
                'protonmail.com',
                'zoho.com',
            ];

            $domain = strtolower(substr(strrchr($value, "@"), 1));

            if (in_array($domain, $personalDomains)) {
                $fail("Please use a business email address, personal emails are not accepted.");
            }
        },
    ]
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $applicant_data['course_id']         = $request->get('course_id');
        $applicant_data['salut_id']          = $request->get('salut_id');
        $applicant_data['name']              = $request->get('name');
        $applicant_data['country_id']        = $request->get('country_id');
        $applicant_data['job_title']         = $request->get('job_title');
        $applicant_data['company']           = $request->get('company');
        $applicant_data['venue_id']          = $request->get('venue_id');
        $applicant_data['address']           = $request->get('address');
        $applicant_data['email']             = $request->get('email');
        $applicant_data['phone']             = $request->get('phone');
        $applicant_data['mobile']            = $request->get('mobile');
        $applicant_data['fax']               = $request->get('fax');
        $applicant_data['register_round_id'] = $request->get('register_round_id');
        $applicant_data['applicant_type_id'] = $request->get('applicant_type_id');
        $applicant_id                        = Applicant::create($applicant_data);

        $billing_data['salut_id']     = $request->get('billing_salut_id');
        $billing_data['name']         = $request->get('billing_name');
        $billing_data['job_title']    = $request->get('billing_job_title');
        $billing_data['company']      = $request->get('billing_company');
        $billing_data['address']      = $request->get('billing_address');
        $billing_data['venue_id']     = $request->get('billing_venue_id');
        $billing_data['country_id']   = $request->get('billing_country_id');
        $billing_data['phone']        = $request->get('billing_phone');
        $billing_data['email']        = $request->get('billing_email');
        $billing_data['applicant_id'] = $applicant_id->id;
        $billingDetails               = BillingDetails::create($billing_data);
$emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];

// 🔑 ACTION: Send the email with both models attached
Mail::to($emails)->send(new RegisterNotification($applicant_id, $billingDetails));
        return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
    }

    public function downloadBrochure($course_id)
    {
        // session()->forget('captcha');
        $countries = Country::all();
        $course    = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();

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
            'name'    => 'required|string',
            'title'   => 'required|string',
            'email'   => [
        'required',
        'email',
        // شرط رفض الإيميلات الشخصية
        function ($attribute, $value, $fail) {
            $personalDomains = [
                'gmail.com',
                'yahoo.com',
                'outlook.com',
                'hotmail.com',
                'live.com',
                'aol.com',
                'icloud.com',
                'protonmail.com',
                'zoho.com',
            ];

            $domain = strtolower(substr(strrchr($value, "@"), 1));

            if (in_array($domain, $personalDomains)) {
                $fail("Please use a business email address, personal emails are not accepted.");
            }
        },
    ],
            'captcha' => 'required|captcha',
            'mobile'  => 'required',
        ]);

        if ($validator->fails()) {
             return back()->withErrors($validator)->withInput();
        }

        TailorCourse::create($request->all());

        return response()->json(['message' => 'success'], 200);
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
