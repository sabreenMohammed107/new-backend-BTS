<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Country;
use App\Models\Course;
use App\Models\Currency;
use App\Models\Round;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoundsController extends Controller
{
    private $route;
    private $view;

    protected $object;
    function __construct(Round $object)
    {
        $this->object = $object;
        $this->route = 'rounds';
        $this->view = 'rounds';
    }

    public function index()
    {
        $rows = $this->object::where('round_start_date', '>', now())->orderBy("created_at", "Desc")->take(300)->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create()
    {
        $courses = Course::orderBy("course_en_name", "asc")->get();
        $countries = Country::all();
        $currencies = Currency::all();
        return view("{$this->view}.add", compact('countries', 'courses', 'currencies'));
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        // if ($request->active) {
            $input['active'] = 1;
        // } else {
        //     $input['active'] = 0;
        // }
        $maxValue = Round::where('course_id', '=', $request->input('course_id'))->orderBy('id', 'desc')->value('round_code');
        $cors = Course::where('id', '=', $request->input('course_id'))->first();
        $max = substr($maxValue, strrpos($maxValue, '-') + 1);

        if ($max >= 01) {
            $max = $max + 1;

            $roundCode = $cors->course_code . '-0' . $max;
        } else {
            $max = 01;
            $roundCode = $cors->course_code . '-0' . $max;
        }
        $input['round_code'] = $roundCode;
        $input['round_start_date'] = Carbon::parse($request->input('round_start_date'));
        $input['round_end_date'] = Carbon::parse($request->input('round_end_date'));
        $this->object::create($input);
        return redirect()->route("{$this->route}.index")->with('success', 'create new row.');
    }

    public function edit($id)
    {
        $row = $this->object::findOrFail($id);
        $courses = Course::orderBy("course_en_name", "asc")->get();
        $countries = Country::all();
        $currencies = Currency::all();
        return view("{$this->view}.edit", compact('row', 'courses', 'countries', 'currencies'));
    }

    public function update(Request $request,  $id)
    {
        $row = $this->object::findOrFail($id);
        $data = [

            'round_start_date' => Carbon::parse($request->input('round_start_date')),
            'round_end_date' => Carbon::parse($request->input('round_end_date')),
            'round_price' => $request->input('round_price'),
            'round_place' => $request->input('round_place'),
            'show_home_order' => $request->input('show_home_order'),
        ];

        // if ($request->active) {
            $data['active'] = 1;
        // } else {
        //     $data['active'] = 0;
        // }
        if ($request->input('course_id')) {

            $data['course_id'] = $request->input('course_id');
        }
        if ($request->input('country_id')) {

            $data['country_id'] = $request->input('country_id');
        }
        if ($request->input('venue_id')) {

            $data['venue_id'] = $request->input('venue_id');
        }
        if ($request->input('currency_id')) {

            $data['currency_id'] = $request->input('currency_id');
        }

        $row->update($data);

        return redirect()->route("{$this->route}.index")->with('success', ' update Sucess.');
    }

    public function destroy($id)
    {
        $row = $this->object::findOrFail($id);
        $row->delete();
        return redirect()->route("{$this->route}.index")->with('success', ' deleted Success.');
    }
    /**
     * Get venue on country
     */
    function fetchCountry(Request $request)
    {


        $select = $request->get('select');
        $value = $request->get('value');

        $data = Venue::where('country_id', $value)->get();
        $output = '<option value="">Select Venue</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->venue_en_name . '</option>';
        }
        echo $output;
    }
    function fetchRound(Request $request)
    {
        $name = $request->get('name');
        $rounds = Round::whereHas('course', function ($q) use ($name) {
            $q->where('course_en_name', 'like', '%' . $name . '%');
        })->orwhereHas('venue', function ($q) use ($name) {
            $q->where('venue_en_name', 'like', '%' . $name . '%');
        })
            ->orderBy("created_at", "Desc")->paginate(150);
        return view("{$this->view}.preIndex", compact('rounds', 'name'))->render();
    }


    function fetchRoundPage(Request $request)
    {
        $name = $request->get('name');
        $rounds = Round::whereHas('course', function ($q) use ($name) {
            $q->where('course_en_name', 'like', '%' . $name . '%');
        })->orwhereHas('venue', function ($q) use ($name) {
            $q->where('venue_en_name', 'like', '%' . $name . '%');
        })
            ->orderBy("created_at", "Desc")->paginate(150);

        return view( "{$this->view}.preIndex", compact('rounds', 'name'))->render();
    }
    function roundHistory()
    {

        $appCount = 0;
        $roundCount = 0;
        $rounds = Round::where('round_start_date', '<', Carbon::yesterday())->get();

        foreach ($rounds as $round) {
            $applicants = Applicant::where('register_round_id', $round->id)->get();

            foreach ($applicants as $applicant) {
                //$applicant->delete();
                $appCount = $appCount + 1;
            }
            //$round->delete();
            $roundCount = $roundCount + 1;
        }
        dd([$appCount, $roundCount]);
        return redirect()->route("{$this->view}.index")->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
}
