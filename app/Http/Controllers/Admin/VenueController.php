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
        $this->view = 'Venue';
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

}

