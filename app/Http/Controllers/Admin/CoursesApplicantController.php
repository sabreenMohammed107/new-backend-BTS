<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;
class CoursesApplicantController extends Controller
{
    private $route;
    private $view;

    protected $object;
    function __construct(Applicant $object)
    {
        $this->object = $object;
        $this->route = 'applCourse';
        $this->view = 'applCourse';
    }

    public function index()
    {
        $rows=$this->object::with('courses')->orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create()
    {

    }

    public function store(Request $request)
    {

    }
    public function show($id)
    {

    }
    public function edit($id)
    {

    }

    public function update(Request $request,  $id)
    {

    }

    public function destroy($id)
    {
        $row=$this->object::findOrFail($id);
        $row->delete();
        return redirect()->route("{$this->route}.index")->with('success', ' deleted Success.');
    }

}

