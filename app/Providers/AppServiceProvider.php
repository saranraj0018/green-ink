<?php

namespace App\Providers;
use App\Models\Course;
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
         View::composer('*', function ($view) {
        $latestCourses = Course::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        $view->with('latestCourses', $latestCourses);
    });
    }
}
