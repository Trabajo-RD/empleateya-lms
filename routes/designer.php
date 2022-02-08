<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Designer\HomeController;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    Route::get('designer/dashboard', [HomeController::class, 'index'])->name('cpanel');

    /**
     * Route for list all courses
     */
    // TODO: create designer course controller
    // Route::get('designer/courses', [CourseController::class, 'index'])->name('courses.index');

});
