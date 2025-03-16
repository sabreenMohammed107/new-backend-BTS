<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BtsNumber;
use Illuminate\Http\Request;
class BTSNumbersController extends Controller
{
    private $route;
    private $view;

    protected $object;
    function __construct(BtsNumber $object)
    {
        $this->object = $object;
        $this->route = 'bts-numbers';
        $this->view = 'bts-numbers';
    }

    public function index()
    {
        $rows=$this->object::orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create()
    {

        return view("{$this->view}.add",);
    }

    public function store(Request $request)
    {
        $request->validate(['bts_number_en_name' => 'required|string|max:255']);

        $input = $request->except(['_token']);
        if ($request->active) {
            $input['active'] = 1;
        }else{
            $input['active'] = 0;
        }

        $this->object::create($input);
        return redirect()->route("{$this->route}.index")->with('success', 'create new row.');
    }

    public function edit($id)
    {
        $row=$this->object::findOrFail($id);

        return view("{$this->view}.edit", compact('row'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate(['bts_number_en_name' => 'required|string|max:255']);
        $row=$this->object::findOrFail($id);
        $input = $request->except(['_token']);
        if ($request->active) {
            $input['active'] = 1;
        }else{
            $input['active'] = 0;
        }
        $row->update($input);

        return redirect()->route("{$this->route}.index")->with('success', ' update Sucess.');
    }

    public function destroy($id)
    {
        $row=$this->object::findOrFail($id);
        $row->delete();
        return redirect()->route("{$this->route}.index")->with('success', ' deleted Success.');
    }

}

