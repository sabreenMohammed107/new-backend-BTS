<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseCategoryController extends Controller
{
    private $route;
    private $view;
    protected $object;

    public function __construct(CourseCategory $object)
    {
        $this->object = $object;
        $this->route  = 'course-categories';
        $this->view   = 'course-categories';
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
            'category_en_name'        => 'required|string|max:250',
            'category_en_description' => 'nullable|string|max:2000',
            'category_image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'category_en_name'        => $request->category_en_name,
            'category_en_description' => $request->category_en_description,
            'active'                  => isset($request->active) ? 1 : 0,
        ];

        if ($request->hasFile('category_image')) {
            $image     = $request->file('category_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/course_categories'), $imageName);
            $data['category_image'] = 'uploads/course_categories/' . $imageName;
        }

        $this->object::create($data);

        return redirect()->route("{$this->route}.index")->with('success', 'Course Category created successfully');
    }

    public function show($id)
    {
        $row = $this->object::findOrFail($id);
        return view("{$this->view}.show", compact('row'));
    }

    public function edit($id)
    {
        $row = $this->object::findOrFail($id);
        return view("{$this->view}.edit", compact('row'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_en_name'        => 'required|string|max:250',
            'category_en_description' => 'nullable|string|max:2000',
            'category_image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $row = $this->object::findOrFail($id);

        $data = [
            'category_en_name'        => $request->category_en_name,
            'category_en_description' => $request->category_en_description,
            'active'                  => isset($request->active) ? 1 : 0,
        ];

        if ($request->hasFile('category_image')) {
            // Delete old image if exists
            if ($row->category_image && file_exists(public_path($row->category_image))) {
                unlink(public_path($row->category_image));
            }

            $image     = $request->file('category_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/course_categories'), $imageName);
            $data['category_image'] = 'uploads/course_categories/' . $imageName;
        }

        $row->update($data);

        return redirect()->route("{$this->route}.index")->with('success', 'Course Category updated successfully');
    }


    public function destroy($id)
    {
        $row = $this->object::findOrFail($id);

        // Check sub categories
        $hasSub = DB::table('course_sub_categories')
            ->where('course_category_id', $id)
            ->exists();

        if ($hasSub) {
            return redirect()->route("{$this->route}.index")
                ->with('error', 'Cannot delete category. It has sub-categories associated with it.');
        }

        // Check courses through sub categories
        $hasCourses = DB::table('courses')
            ->whereIn('course_sub_category_id', function ($q) use ($id) {
                $q->select('id')
                    ->from('course_sub_categories')
                    ->where('course_category_id', $id);
            })
            ->exists();

        if ($hasCourses) {
            return redirect()->route("{$this->route}.index")
                ->with('error', 'Cannot delete category. It has courses associated with it.');
        }

        // Delete image
        if ($row->category_image && file_exists(public_path($row->category_image))) {
            unlink(public_path($row->category_image));
        }

        $row->delete();

        return redirect()->route("{$this->route}.index")
            ->with('success', 'Course Category deleted successfully.');
    }

    public function updateStatus($id)
    {
        $row = $this->object::findOrFail($id);
        $row->update([
            'active' => ! $row->active,
        ]);

        return redirect()->route("{$this->route}.index")->with('success', 'Course Category status updated successfully');
    }
}
