<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\careerLevel;
use Illuminate\Http\Request;

class CareerLevelController extends Controller
{
    private $route;
    private $view;
    protected $object;

    function __construct(careerLevel $object)
    {
        $this->object = $object;
        $this->route = 'careerLevel';
        $this->view = 'careerLevel';
    }

    public function index()
    {
        $rows = $this->object::orderBy("created_at", "Desc")->get();
        return view("{$this->view}.index", compact('rows'));
    }

    public function create()
    {
        return view("{$this->view}.add");
    }

    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required|string|max:100',
        ]);

        $this->object::create([
            'level' => $request->level,
            'active' => isset($request->active) ? 1 : 0,
        ]);

        return redirect()->route("{$this->route}.index")->with('success', 'Career Level created successfully');
    }

    public function show($id)
    {
        $row = $this->object::findOrFail($id);
        return view("{$this->view}.edit", compact('row'));
    }

    public function edit($id)
    {
        $row = $this->object::findOrFail($id);
        return view("{$this->view}.edit", compact('row'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'level' => 'required|string|max:100',
        ]);

        $row = $this->object::findOrFail($id);
        $row->update([
            'level' => $request->level,
            'active' => isset($request->active) ? 1 : 0,
        ]);

        return redirect()->route("{$this->route}.index")->with('success', 'Career Level updated successfully');
    }

    public function destroy($id)
    {
        $row = $this->object::findOrFail($id);
        $row->delete();

        return redirect()->route("{$this->route}.index")->with('success', 'Career Level deleted successfully');
    }
}
