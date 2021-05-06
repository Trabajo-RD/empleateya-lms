<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Contributor\HomeController;

Route::group(['prefix' => '{locale}',
    'as' => 'contributor.',
    'where' => ['locale', '[a-zA-Z]{2}'],
    'middleware' => ['setlocale', 'language', 'default.language', 'verified']
], function(){

    Route::get('contributor/dashboard', [HomeController::class, 'index'])->name('cpanel');

    /**
     * Route for list all courses
     */
    Route::get('contributor/courses', [CourseController::class, 'index'])->name('courses.index');

});
