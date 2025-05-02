<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Venue;
use Illuminate\Http\Request;
class VenueController extends Controller
{
    private $route;
    private $view;
    protected $object;
    function __construct(Venue $object)
    {
        $this->object = $object;
        $this->route = 'venue';
        $this->view = 'venue';
    }

    public function index()
    {
        $rows=$this->object::with('country')->orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create()
    {
        $countries=Country::orderBy("country_en_name", "asc")->get();

        return view("{$this->view}.add",compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate(['venue_en_name' => 'required|string|max:255']);

        $input = $request->except(['_token']);
        $this->object::create($input);
        return redirect()->route("{$this->route}.index")->with('success', 'create new row.');
    }

    public function edit($id)
    {
        $row=$this->object::findOrFail($id);
        // dd($subCategory);
        $countries=Country::orderBy("country_en_name", "asc")->get();

        return view("{$this->view}.edit", compact('row','countries'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate(['venue_en_name' => 'required|string|max:255']);
        $row=$this->object::findOrFail($id);
        $input = $request->except(['_token']);
        $row->update($input);

        return redirect()->route("{$this->route}.index")->with('success', ' update Sucees.');
    }

    public function destroy($id)
    {
        $row=$this->object::findOrFail($id);
        $row->delete();
        return redirect()->route("{$this->route}.index")->with('success', ' delete Sucess.');
    }

    /**
     * Fetch venues based on country ID
     */
    // Controller method
public function fetchVenues(Request $request)
{
    try {
        $countryId = $request->input('country_id');
        \Log::info('Fetching venues for country ID: ' . $countryId);

        if (!$countryId) {
            \Log::warning('No country ID provided');
            return response()->json(['error' => 'Country ID is required'], 400);
        }

        $venues = Venue::where('country_id', $countryId)->get();
        \Log::info('Found ' . $venues->count() . ' venues');

        // Return venues as JSON
        return response()->json([
            'success' => true,
            'venues' => $venues
        ]);
    } catch (\Exception $e) {
        \Log::error('Error fetching venues: ' . $e->getMessage());
        return response()->json(['error' => 'An error occurred while fetching venues'], 500);
    }
}
}

