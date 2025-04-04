<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
class HomeSliderController extends Controller
{
    private $route;
    private $view;
    protected $object;
    function __construct(HomeSlider $object)
    {
        $this->object = $object;
        $this->route = 'slider';
        $this->view = 'slider';
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
        // $request->validate(['en_title' => 'required|string|max:255']);

        $input = $request->except(['_token','image','avatar_remove']);
        $input['active'] = 1;
        if ($request->hasFile('image')) {
            $attach_image = $request->file('image');

            $input['image'] = $this->UplaodImage($attach_image);
        }
        // dd($input);
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
        // $request->validate(['en_title' => 'required|string|max:255']);
        $row=$this->object::findOrFail($id);
        $input = $request->except(['_token','image']);
        $input['active'] = 1;
        if ($request->hasFile('image')) {
            $attach_image = $request->file('image');

            $input['image'] = $this->UplaodImage($attach_image);
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
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/sliders');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}

