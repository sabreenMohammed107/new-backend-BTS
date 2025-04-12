<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Testmonials;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Test;

class TestimonialsController extends Controller
{
    public function index()
    {
        $data = Testmonials::all();
        return view('front-design-pages.testimonials' , compact('data'));
    }
}
