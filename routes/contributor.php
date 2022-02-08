<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Contributor\HomeController;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    Route::get('contributor/dashboard', [HomeController::class, 'index'])->name('cpanel');

    /**
     * Route for list all courses
     */
    // TODO: Create Contributor Course Controller
    // Route::get('contributor/courses', [CourseController::class, 'index'])->name('courses.index');

});
