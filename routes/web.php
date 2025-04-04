<?php

use App\Http\Controllers\Admin\ApplicantSpeakerController;
use App\Http\Controllers\Admin\BranchsController;
use App\Http\Controllers\Admin\BTSNumbersController;
use App\Http\Controllers\Admin\CareersController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CoursesApplicantController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\ExpertiseController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\JobApplicantController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\PartenerController;
use App\Http\Controllers\Admin\RoundsApplicantController;
use App\Http\Controllers\Admin\RoundsController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TeachController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TrainersController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\Admin\YearCalenderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->group(function(){
    Route::get('/' , function(){
        return view('front-design-pages.index');
    })->name('main-home');

    Route::get('join-us' , function(){
        return view('front-design-pages.join-team');
    })->name('join-us');

    Route::get('about-bts' , function(){
        return view('front-design-pages.about-bts');
    })->name('about-bts');

    Route::get('accreditations' , function(){
        return view('front-design-pages.Accreditations');
    })->name('accreditations');

    Route::get('contact-us' , function(){
        return view('front-design-pages.contact-us');
    })->name('contact-us');

    Route::get('course-registration' , function(){
        return view('front-design-pages.course-registration');
    })->name('course-registration');

    Route::get('course-search' , function(){
        return view('front-design-pages.course-search');
    })->name('course-search');

    Route::get('download-center' , function(){
        return view('front-design-pages.download-center');
    })->name('download-center');

    Route::get('join-team' , function(){
        return view('front-design-pages.join-team');
    })->name('join-team');

    Route::get('join-us-speaker-page' , function(){
        return view('front-design-pages.join-us-speaker-page');
    })->name('join-us-speaker-page');

    Route::get('join-us' , function(){
        return view('front-design-pages.join-us');
    })->name('join-us');

    Route::get('service' , function(){
        return view('front-design-pages.service');
    })->name('service');

    Route::get('single-course' , function(){
        return view('front-design-pages.single-course');
    })->name('single-course');

    Route::get('testimonials' , function(){
        return view('front-design-pages.testimonials');
    })->name('testimonials');

    Route::get('soft-skills-page' , function(){
        return view('front-design-pages.soft-skills-page');
    })->name('soft-skills-page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('slider', HomeSliderController::class);

    Route::resource('sub-categories', SubCategoryController::class);
    Route::resource('courses', CoursesController::class);
    Route::get('dynamicdependentCat/fetch', [CoursesController::class, 'fetchCat'])->name('dynamicdependentCat.fetch');
    Route::post('saveRelated', [CoursesController::class, 'saveRelated'])->name('saveRelated');
    Route::DELETE('deleteRelated/{id}', [CoursesController::class, 'deleteRelated'])->name('deleteRelated');

    Route::resource('rounds', RoundsController::class);
    Route::post('dynamic_dependentCountry/fetch', [RoundsController::class, 'fetchCountry'])->name('dynamic_dependentCountry.fetch');
    Route::get('dynamic_round/fetch', [RoundsController::class, 'fetchRound'])->name('dynamic_round.fetch');
    Route::get('fetch_dataPage', [RoundsController::class, 'fetchRoundPage'])->name('fetch_dataPage');

    Route::resource('bts-numbers', BTSNumbersController::class);
    Route::resource('branches', BranchsController::class);
    Route::get('dynamic_dependent/fetch', [BranchsController::class, 'fetch'])->name('dynamicdependent.fetch');
    Route::resource('trainers', TrainersController::class);
    Route::resource('yearCalender', YearCalenderController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('expertise', ExpertiseController::class);
    Route::resource('teach', TeachController::class);
    Route::resource('applCourse', CoursesApplicantController::class);
    Route::resource('applRound', RoundsApplicantController::class);
    Route::resource('newsletter', NewsLetterController::class);
    Route::resource('message', MessagesController::class);
    Route::resource('partner', PartenerController::class);
    Route::resource('client', ClientController::class);
    Route::resource('country', CountryController::class);
    Route::resource('venue', VenueController::class);
    Route::resource('career', CareersController::class);
    Route::resource('jobApplicant', JobApplicantController::class);
    Route::resource('appl', ApplicantSpeakerController::class);
//new staticdata
Route::get("homeMethodology/view", [StaticPageController::class, "homeMethodologyView"])->name("homeMethodologyView");
Route::post("homeMethodology/update", [StaticPageController::class, "homeMethodologyUpdate"])->name("homeMethodologyUpdate");
//accreditation
Route::get("homeAccreditation/view", [StaticPageController::class, "homeAccreditationView"])->name("homeAccreditationView");
Route::post("homeAccreditation/update", [StaticPageController::class, "homeAccreditationUpdate"])->name("homeAccreditationUpdate");
//homeTestimonialView
Route::get("homeTestimonial/view", [StaticPageController::class, "homeTestimonialView"])->name("homeTestimonialView");
Route::post("homeTestimonial/update", [StaticPageController::class, "homeTestimonialUpdate"])->name("homeTestimonialUpdate");
//homeContactView
Route::get("homeContact/view", [StaticPageController::class, "homeContactView"])->name("homeContactView");
Route::post("homeContact/update", [StaticPageController::class, "homeContactUpdate"])->name("homeContactUpdate");

});

require __DIR__ . '/auth.php';
