<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testmonials;
use Illuminate\Http\Request;
class TestimonialController extends Controller
{
    private $route;
    private $view;

    protected $object;
    function __construct(Testmonials $object)
    {
        $this->object = $object;
        $this->route = 'testimonial';
        $this->view = 'testimonial';
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
        $request->validate(['reviewer_name' => 'required|string|max:255',
        'reviewer_star_rate' => 'required|numeric|between:1,5',]);

        $input = $request->except(['_token']);

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
        $request->validate(['reviewer_name' => 'required|string|max:255',
        'reviewer_star_rate' => 'required|numeric|between:1,5',]);
        $row=$this->object::findOrFail($id);
        $input = $request->except(['_token']);

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

