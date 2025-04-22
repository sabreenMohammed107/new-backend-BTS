<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\TeachController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\RoundsController;
use App\Http\Controllers\Admin\BranchsController;
use App\Http\Controllers\Admin\CareersController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\PartenerController;
use App\Http\Controllers\Admin\TrainersController;
use App\Http\Controllers\DownloadCenterController;
use App\Http\Controllers\Front\AboutBtsController;
use App\Http\Controllers\Admin\ExpertiseController;
use App\Http\Controllers\Admin\BTSNumbersController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\StaticPageController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\JobApplicantController;
use App\Http\Controllers\Admin\YearCalenderController;
use App\Http\Controllers\Front\TestimonialsController;
use App\Http\Controllers\Admin\DownloadCenterAdminController;
use App\Http\Controllers\Admin\RoundsApplicantController;
use App\Http\Controllers\Admin\ApplicantSpeakerController;
use App\Http\Controllers\Admin\CoursesApplicantController;
use App\Http\Controllers\Front\CourseSearchController;
use App\Http\Controllers\Front\JobApplicationController;
use App\Http\Controllers\Admin\CareerLevelController;

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

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('main-home');
});

    Route::get('about-bts' , [AboutBtsController::class , 'index'])->name('about-bts');
    Route::get('service' , [ServiceController::class , 'index'])->name('service');
    Route::get('download-center' , [DownloadCenterController::class , 'index'])->name('download-center');
    Route::get('testimonials' , [TestimonialsController::class , 'index'])->name('testimonials');


    Route::get('accreditations' , function(){
        return view('front-design-pages.Accreditations');
    })->name('accreditations');

    Route::get('contact-us' , function(){
        return view('front-design-pages.contact-us');
    })->name('contact-us');

    Route::get('course-registration' , function(){
        return view('front-design-pages.course-registration');
    })->name('course-registration');

    Route::get('/search-course', [CourseSearchController::class, 'index'])->name('searchCourse.index');

    Route::get('/courseDetails/{id}', [CourseSearchController::class, 'courseDetails']);

    Route::get('course-search' , function(){
        return view('front-design-pages.course-search');
    })->name('course-search');
//captch
Route::get('/refresh-captcha', function () {
    return response()->json(['captcha' => captcha_img('flat')]);
});
Route::post('/registerApplicants', [CourseSearchController::class, 'registerApplicants'])->name('registerApplicants');
Route::post('/registerApplicantsDawnload', [CourseSearchController::class, 'registerApplicantsDawnload'])->name('registerApplicantsDawnload');
Route::post('registerApplicantRounds',[CourseSearchController::class, 'registerApplicantRounds']);
Route::get('/downloadBrochure/{course_id}', [CourseSearchController::class, 'downloadBrochure']);

    Route::get('join-us' , [JobApplicationController::class, 'showForm'])->name('join-us');

    Route::get('join-us-speaker-page' , function(){
        return view('front-design-pages.join-us-speaker');
    })->name('join-us-speaker-page');

    Route::get('single-course' , function(){
        return view('front-design-pages.single-course');
    })->name('single-course');


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
    Route::resource('careerLevel', CareerLevelController::class);
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
//publicTraining
Route::get("publicTraining/view", [StaticPageController::class, "publicTrainingView"])->name("publicTrainingView");
Route::post("publicTraining/update", [StaticPageController::class, "publicTrainingUpdate"])->name("publicTrainingUpdate");
//inHouseTraining
Route::get("inHouseTraining/view", [StaticPageController::class, "inHouseTrainingView"])->name("inHouseTrainingView");
Route::post("inHouseTraining/update", [StaticPageController::class, "inHouseTrainingUpdate"])->name("inHouseTrainingUpdate");
//consultancy
Route::get("consultancy/view", [StaticPageController::class, "consultancyView"])->name("consultancyView");
Route::post("consultancy/update", [StaticPageController::class, "consultancyUpdate"])->name("consultancyUpdate");
//onlineCourses
Route::get("onlineCourses/view", [StaticPageController::class, "onlineCoursesView"])->name("onlineCoursesView");
Route::post("onlineCourses/update", [StaticPageController::class, "onlineCoursesUpdate"])->name("onlineCoursesUpdate");

//whoWeAre
Route::get("whoWeAre/view", [StaticPageController::class, "whoWeAreView"])->name("whoWeAreView");
Route::post("whoWeAre/update", [StaticPageController::class, "whoWeAreUpdate"])->name("whoWeAreUpdate");
//btsTarget
Route::get("btsTarget/view", [StaticPageController::class, "btsTargetView"])->name("btsTargetView");
Route::post("btsTarget/update", [StaticPageController::class, "btsTargetUpdate"])->name("btsTargetUpdate");

Route::resource('offer', OffersController::class);

Route::resource('dawnload-center', DownloadCenterAdminController::class);

// Career application routes
Route::get('/join-our-team', [JobApplicationController::class, 'showForm'])->name('join.team');
Route::post('/job-application', [JobApplicationController::class, 'store'])->name('job.application.store');

});

require __DIR__ . '/auth.php';
