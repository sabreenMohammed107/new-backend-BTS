<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use Illuminate\Http\Request;
class SubCategoryController extends Controller
{
    private $route;
    private $view;
    protected $object;
    function __construct(CourseSubCategory $object)
    {
        $this->object = $object;
        $this->route = 'sub-categories';
        $this->view = 'sub_category';
    }

    public function index()
    {
        $rows=$this->object::where('course_category_id', '!=',4)->where('course_category_id', '!=',6)->with('courseCategory')->orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create()
    {
        $categories=CourseCategory::where('id', '!=',4)->where('id', '!=',6)->orderBy("created_at", "Desc")->get();

        return view("{$this->view}.add",compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['subcategory_en_name' => 'required|string|max:255']);

        $input = $request->except(['_token','subcategory_image']);
        $input['active'] = 1;
        if ($request->hasFile('subcategory_image')) {
            $attach_image = $request->file('subcategory_image');

            $input['subcategory_image'] = $this->UplaodImage($attach_image);
        }
        $this->object::create($input);
        return redirect()->route("{$this->route}.index")->with('success', 'create new row.');
    }

    public function edit($id)
    {
        $row=$this->object::findOrFail($id);
        // dd($subCategory);
        $categories=CourseCategory::where('id', '!=',4)->where('id', '!=',6)->orderBy("created_at", "Desc")->get();

        return view("{$this->view}.edit", compact('row','categories'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate(['subcategory_en_name' => 'required|string|max:255']);
        $row=$this->object::findOrFail($id);
        $input = $request->except(['_token','subcategory_image']);
        $input['active'] = 1;
        if ($request->hasFile('subcategory_image')) {
            $attach_image = $request->file('subcategory_image');

            $input['subcategory_image'] = $this->UplaodImage($attach_image);
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
        $uploadPath = public_path('uploads/course_sub_categories');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}

