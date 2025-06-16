<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\CourseSubCategory;
use App\Models\HomeSlider;
use App\Models\Partner;
use App\Models\Round;
use App\Models\StaticPage;
use App\Models\Testmonials;
use App\Models\Venue;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch any data you need for the home page
        $banners = HomeSlider::orderBy('created_at', 'desc')->get();
        $venues = Venue::orderBy('venue_en_name', 'asc')->get();
        $subCategories = CourseSubCategory::where('active', 1)->orderBy('subcategory_en_name', 'asc')->get();
        $public_training = StaticPage::where('id', 7)->first();
        $in_house_training = StaticPage::where('id', 8)->first();
        $consultancy = StaticPage::where('id', 9)->first();
        $online_courses = StaticPage::where('id', 10)->first();
        $methodologies = StaticPage::where('id', 1)->first();
        $rounds = Round::with('course', 'country', 'venue')
            ->where('active', 1)
            ->whereNotNull('show_home_order')
            ->orderBy('show_home_order', 'asc')
            ->take(8)
            ->get();
        $homeTestimonials = StaticPage::where('id', 4)->first();
        $homeAccreditation = StaticPage::where('id', 2)->first();
        $testimonials = Testmonials::get();
        $clients = Client::where('active', 1)->get();
        $partners = Partner::where('active', 1)->get();
        return view('front-design-pages.index', compact(
            'banners',
            'venues',
            'subCategories',
            'public_training',
            'in_house_training',
            'consultancy',
            'online_courses',
            'methodologies',
            'rounds',
            'homeTestimonials',
            'homeAccreditation',
            'testimonials',
            'clients',
            'partners',
        ));

        // return view('front-design-pages.index');
    }
}
