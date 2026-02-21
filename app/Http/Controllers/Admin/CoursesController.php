<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use App\Models\RelatedCourses;
use Exception;
use File;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    private $route;
    private $view;
    protected $object;
    function __construct(Course $object)
    {
        $this->object = $object;
        $this->route = 'courses';
        $this->view = 'courses';
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $query = $this->object::select([
                'id',
                'course_code',
                'course_en_name',
                'course_duration',
                'course_sub_category_id',
            ])
            ->with([
                'subCategory:id,subcategory_en_name',
            ]);

        // Server-side search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('course_code', 'like', "%{$search}%")
                  ->orWhere('course_en_name', 'like', "%{$search}%")
                  ->orWhereHas('subCategory', function ($q) use ($search) {
                      $q->where('subcategory_en_name', 'like', "%{$search}%");
                  });
            });
        }

        $rows = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        return view("{$this->view}.index", compact('rows', 'search'));
    }


    public function create()
    {
        $categories = CourseCategory::all();
        return view("{$this->view}.add", compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token', 'course_image', 'course_image_thumbnail', 'course_brochure']);
        $maxValue = 100;
        if ($request->input('course_sub_category_id')) {
            $maxValue = Course::where('course_sub_category_id', '=', $request->input('course_sub_category_id'))->orderBy('id', 'desc')->value('course_code');
            $cat = CourseSubCategory::where('id', '=', $request->input('course_sub_category_id'))->first();
            $max = substr($maxValue, strlen($cat->subcategory_code));
            if ($max >= 100) {
                $max = $max + 1;
                $courseCode = $cat->subcategory_code . $max;
            } else {
                $max = 100;
                $courseCode = $cat->subcategory_code . $max;
            }
            $input['course_code'] = $courseCode;
        }
        if ($request->hasFile('course_image')) {
            $attach_image = $request->file('course_image');
            $input['course_image'] = $this->UplaodImage($attach_image);
        }
        if ($request->hasFile('course_image_thumbnail')) {
            $attach_image = $request->file('course_image_thumbnail');
            $input['course_image_thumbnail'] = $this->UplaodImage($attach_image);
        }
        if ($request->hasFile('course_brochure')) {
            $attach_file = $request->file('course_brochure');
            $input['course_brochure'] = $this->UplaodFile($attach_file);
        }
        $input['active'] = 1;
        $this->object::create($input);
        return redirect()->route("{$this->route}.index")->with('success', 'create new row.');
    }

    public function edit($id)
    {
        $row = $this->object::findOrFail($id);
        // dd($subCategory);
        $categories=CourseCategory::where('id', '!=',4)->get();
        $relateds=Course::where('id', '!=', $id)->orderBy("course_en_name", "asc")->get();
        $relatedCourses=RelatedCourses::where('course_id', '=', $id)->orderBy("created_at", "Desc")->get();

        return view("{$this->view}.edit", compact('relatedCourses','relateds','categories','row'));
    }

    public function update(Request $request,  $id)
    {
        $row = $this->object::findOrFail($id);
        $input = $request->except(['_token', 'course_image','course_image_thumbnail','course_brochure','course_sub_category_id']);
        $input['active'] = 1;
        if ($request->hasFile('course_image')) {
            $attach_image = $request->file('course_image');

            $input['course_image'] = $this->UplaodImage($attach_image);
        }

        if ($request->hasFile('course_image_thumbnail')) {
            $attach_image = $request->file('course_image_thumbnail');
            $input['course_image_thumbnail'] = $this->UplaodImage($attach_image);
        }
        if ($request->hasFile('course_brochure')) {
            $attach_file = $request->file('course_brochure');
            $input['course_brochure'] = $this->UplaodFile($attach_file);
        }
        if($request->input('course_sub_category_id')&& $request->input('course_sub_category_id')!= null){

            $input['course_sub_category_id']=$request->input('course_sub_category_id');
         }
        $row->update($input);

        return redirect()->route("{$this->route}.index")->with('success', ' update Sucees.');
    }

    public function destroy($id)
    {
        $row = $this->object::findOrFail($id);
        $row->delete();
        return redirect()->route("{$this->route}.index")->with('success', ' delete Sucess.');
    }


    /**
     * uplaud image
     */
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();


        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/courses');
        //$uploadPath ='C:\inetpub\vhosts\btsconsultant.com\httpdocs\BTSConsultant_Resources\public\uploads/courses';
        try {
            if (!file_exists(filename: $uploadPath)) {
    mkdir($uploadPath, 0755, true);
}
            $file->move($uploadPath, $imageName);
        } catch (Exception $e) {
            error_log('Exception: ' . $e->getMessage());
            return $e->getMessage();
        }
        // Move The image..

        // dd($uploadPath);

        return $imageName;
    }
    /**
     * uplaud file
     */
    public function UplaodFile($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();
 // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/courseBrochure');
        //$uploadPath ='C:\inetpub\vhosts\btsconsultant.com\httpdocs\BTSConsultant_Resources\public\uploads/courses';
        try {
            $file->move($uploadPath, $imageName);
        } catch (Exception $e) {
            error_log('Exception: ' . $e->getMessage());
            return $e->getMessage();
        }
        // Move The image..

        // dd($uploadPath);

        return $imageName;
    }

    /**
     * dependace sub category
     */
    function fetchCat(Request $request)
    {

        $select = $request->get('select');
        $value = $request->get('value');

        $data = CourseSubCategory::where('course_category_id', $value)->get();
        $output = '<option value="">Select Sub Category</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->subcategory_en_name . '</option>';
        }
        echo $output;
    }


    /**
     * save Related Course
     */
    public function saveRelated(Request $request)
    {
        $data['course_id'] = $request->get('course_id');
        $data['related_course_id'] = $request->get('related_course_id');
        RelatedCourses::create($data);
        return back();
    }


    public function deleteRelated($id)
    {
        $relatedcourse = RelatedCourses::where('id', '=', $id)->first();
        $relatedcourse->delete();
        return redirect()->back();
    }
}
