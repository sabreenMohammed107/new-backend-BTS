<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\ImageGallery;
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
}
