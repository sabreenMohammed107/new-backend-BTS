<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
class CareersController extends Controller
{
    private $route;
    private $view;
    protected $object;
    function __construct(Career $object)
    {
        $this->object = $object;
        $this->route = 'career';
        $this->view = 'career';
    }

    public function index()
    {
        $rows=$this->object::orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create()
    {

        return view("{$this->view}.add");
    }

    public function store(Request $request)
    {
        $request->validate(['job_name' => 'required|string|max:255']);

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
        $request->validate(['job_name' => 'required|string|max:255']);
        $row=$this->object::findOrFail($id);
        $input = $request->except(['_token']);
        if ($request->active) {
            $input['active'] = 1;
        }else{
            $input['active'] = 0;
        }
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

