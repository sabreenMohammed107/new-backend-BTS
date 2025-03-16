<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpeakerCourse;
use App\Models\Speakers;
use App\Models\SpeakersExpertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApplicantSpeakerController extends Controller
{
    private $route;
    private $view;

    protected $object;
    function __construct(Speakers $object)
    {
        $this->object = $object;
        $this->route = 'appl';
        $this->view = 'appl';
    }

    public function index()
    {
        $rows = $this->object::with('country')->with('salut')->orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create() {}

    public function store(Request $request) {}
    public function show($id)
    {
        $row = $this->object::where('id', '=', $id)->first();
        $trainingCourses=SpeakerCourse::where('speaker_id', '=', $id)->orderBy("created_at", "Desc")->get();
        $expertises=SpeakersExpertise::where('speaker_id', '=', $id)->orderBy("created_at", "Desc")->get();

        return view("{$this->view}.edit", compact('row','trainingCourses','expertises'));
    }
    public function edit($id) {}

    public function update(Request $request,  $id) {}

    public function destroy($id)
    {
        $row = $this->object::findOrFail($id);

        $file = $row->doc_path;
        $cv = $row->cv_path;

        $file_name ='uploads/courseBrochure/'.$file;
        $doc_name = 'uploads/courseBrochure/'.$cv;



            $row->delete();
                File::delete($file_name);
                File::delete($doc_name);

        return redirect()->route("{$this->route}.index")->with('success', ' deleted Success.');
    }
}
