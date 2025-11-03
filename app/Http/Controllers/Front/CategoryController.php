<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = CourseCategory::with('courseSubCategories')->findOrFail($id);

        return view('front-design-pages.category', compact('category'));

    }
    public function course($id)
    {
        $subcategory_id = $id;
        $now_date       = now();
        $now_date       = now();

        $courses = Course::with(['rounds' => function ($q) use ($now_date) {
            $q->where(function ($query) use ($now_date) {
                $query->where('round_start_date', '>', $now_date)
                    ->orWhereNull('round_start_date');
            })->where('active', 1);
        }])
            ->whereHas('rounds', function ($q) use ($now_date) {
                $q->where('round_start_date', '>', $now_date)
                    ->orWhereNull('round_start_date')
                    ->where('active', 1);
            });

        if (! empty($subcategory_id)) {
            $courses->where('course_sub_category_id', $subcategory_id);
        }

        $courses = $courses->orderBy('course_en_name')->paginate(15);

        $total = $courses->total();

        $subCategory = CourseSubCategory::find($id);
        $category    = $subCategory ? CourseCategory::find($subCategory->course_category_id) : null;
// dd($filtered);
        return view('front-design-pages.courseCategory', compact(
            'courses', 'category', 'subCategory', 'total'
        ));
    }

}
