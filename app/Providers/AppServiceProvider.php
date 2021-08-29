<?php

namespace App\Providers;

use App\Services\Course\CourseService;
use App\Services\Course\CourseServiceInterface;
use App\Services\Lesson\LessonService;
use App\Services\Lesson\LessonServiceInterface;
use App\Services\Upload\UploadService;
use App\Services\Upload\UploadServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CourseServiceInterface::class, CourseService::class);
        $this->app->bind(UploadServiceInterface::class, UploadService::class);
        $this->app->bind(LessonServiceInterface::class, LessonService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
