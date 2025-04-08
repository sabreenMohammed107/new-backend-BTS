<?php

namespace App\Http\Controllers\Front;

use App\Models\StaticPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $public_training = StaticPage::where('id', 7)->first();
        $in_house_training = StaticPage::where('id', 8)->first();
        $consultancy = StaticPage::where('id', 9)->first();
        $online_courses = StaticPage::where('id', 10)->first();

        return view('front-design-pages.service' , compact('public_training' , 'in_house_training' , 'consultancy' , 'online_courses'));
    }
}
