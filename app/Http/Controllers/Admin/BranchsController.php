<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\BtsNumber;
use App\Models\Country;
use App\Models\Venue;
use Illuminate\Http\Request;
class BranchsController extends Controller
{
    private $route;
    private $view;

    protected $object;
    function __construct(Branch $object)
    {
        $this->object = $object;
        $this->route = 'branches';
        $this->view = 'branches';
    }

    public function index()
    {
        $rows=$this->object::orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create()
    {
        $countries=Country::all();

        return view("{$this->view}.add",compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate(['branch_name' => 'required|string|max:255']);
        $input = $request->except(['_token']);
        $input['active'] = 1;
        $input['hq'] = 1;
        $this->object::create($input);
        return redirect()->route("{$this->route}.index")->with('success', 'create new row.');
    }

    public function edit($id)
    {
        $row=$this->object::findOrFail($id);
        $countries=Country::all();
        return view("{$this->view}.edit", compact('row','countries'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate(['branch_name' => 'required|string|max:255']);
        $row=$this->object::findOrFail($id);
        $input = $request->except(['_token']);
        $input['active'] = 1;
        $input['hq'] = 1;
        $row->update($input);

        return redirect()->route("{$this->route}.index")->with('success', ' update Sucess.');
    }

    public function destroy($id)
    {
        $row=$this->object::findOrFail($id);
        $row->delete();
        return redirect()->route("{$this->route}.index")->with('success', ' deleted Success.');
    }
    function fetch(Request $request)
    {

     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data =Venue::where('country_id', $value)->get();
     $output = '<option value="">Select Venue</option>';
    foreach($data as $row)
    {
     $output .= '<option value="'.$row->id.'">'.$row->venue_en_name.'</option>';
    }
    echo $output;
   }
}

