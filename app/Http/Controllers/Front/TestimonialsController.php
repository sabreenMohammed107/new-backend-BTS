<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use App\Models\StaticPage;
use App\Models\Testmonials;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Test;

class TestimonialsController extends Controller
{
    public function index()
    {
        $data = Testmonials::all();
        $gallary = ImageGallery::all();
        $titles = StaticPage::where('id', 15)->first();
        return view('front-design-pages.testimonials' , compact('data', 'gallary','titles'));
    }
}
