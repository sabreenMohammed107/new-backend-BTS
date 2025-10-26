<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use App\Models\ImageGallery;
use App\Models\Round;
use App\Models\StaticPage;
use App\Models\Testmonials;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Test;

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
        $now_date = now();

        $filters = Round::with(['course', 'venue', 'country'])
            ->join('courses', 'courses.id', '=', 'rounds.course_id')
            ->where(function ($query) use ($now_date) {
                $query->where('rounds.round_start_date', '>', $now_date)
                    ->orWhereNull('rounds.round_start_date');
            })
            ->where('rounds.active', '=', 1);

        if (!empty($subcategory_id)) {
            $filters->where('courses.course_sub_category_id', '=', $subcategory_id);
        }
                $filters->orderBy('courses.course_en_name');
        $filtered = $filters->paginate(15);
        $total = $filtered->total();
         $subCategory = CourseSubCategory::find($id);
          $category =null;
         if( $subCategory){
          $category = CourseCategory::where("id",'=',$subCategory->course_category_id)->first();

         }
        //  dd($filtered);
        return view('front-design-pages.courseCategory', compact(
            'filtered','category','subCategory',
            'total',
        ));
    }
}
