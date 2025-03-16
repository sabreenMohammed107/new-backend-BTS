<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareersApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JobApplicantController extends Controller
{
    private $route;
    private $view;

    protected $object;
    function __construct(CareersApplicant $object)
    {
        $this->object = $object;
        $this->route = 'jobApplicant';
        $this->view = 'jobApplicant';
    }

    public function index()
    {
        $rows = $this->object::with('career')->with('level')->orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create() {}

    public function store(Request $request) {}
    public function show($id)
    {
        $row = CareersApplicant::where('id', '=', $id)->first();
        return view("{$this->view}.edit", compact('row'));
    }
    public function edit($id) {}

    public function update(Request $request,  $id) {}

    public function destroy($id)
    {
        $row = $this->object::findOrFail($id);
        $file = $row->doc_path;
        $cv = $row->cv_path;
        $file_name = 'uploads/applicant/' . $file;
        $doc_name = 'uploads/applicant/' . $cv;
        $row->delete();
        File::delete($file_name);
        File::delete($doc_name);
        return redirect()->route("{$this->route}.index")->with('success', ' deleted Success.');
    }
}
