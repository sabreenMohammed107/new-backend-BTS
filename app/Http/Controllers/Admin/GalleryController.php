<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
class GalleryController extends Controller
{
    private $route;
    private $view;
    protected $object;
    function __construct(ImageGallery $object)
    {
        $this->object = $object;
        $this->route = 'gallery';
        $this->view = 'gallery';
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

        $input = $request->except(['_token','image_path']);
        if ($request->active) {
            $input['active'] = 1;
        }else{
            $input['active'] = 0;
        }
        if ($request->hasFile('image_path')) {
            $attach_image = $request->file('image_path');

            $input['image_path'] = $this->UplaodImage($attach_image);
        }
        $this->object::create($input);
        return redirect()->route("{$this->route}.index")->with('success', 'create new row.');
    }

    public function edit($id)
    {
        $row=$this->object::findOrFail($id);
        // dd($subCategory);

        return view("{$this->view}.edit", compact('row'));
    }

    public function update(Request $request,  $id)
    {
        $row=$this->object::findOrFail($id);
        if ($request->active) {
            $input['active'] = 1;
        }else{
            $input['active'] = 0;
        }
        $input = $request->except(['_token','image_path']);
        $input['active'] = 1;
        if ($request->hasFile('image_path')) {
            $attach_image = $request->file('image_path');

            $input['image_path'] = $this->UplaodImage($attach_image);
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
        $uploadPath = public_path('uploads/gallery');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}

