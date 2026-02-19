<?php

namespace App\Providers;

use App\Models\Branch;
use App\Models\CourseCategory;
use App\Models\StaticPage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Use Bootstrap 5 pagination styling
        Paginator::useBootstrapFive();

        // Example shared data
        $staticContact =  StaticPage::where('id', 3)->first();
        $branch = Branch::where('hq', 1)->first();
        $egyptBranch = Branch::where('id', 8)->first();
        $categories = CourseCategory::where('active', 1)->get();

        View::share('staticContact', $staticContact);
        View::share('branch', $branch);
        View::share('egyptBranch', $egyptBranch);
        View::share('categories', $categories);
    }
}
