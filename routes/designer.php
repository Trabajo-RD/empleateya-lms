<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Designer\HomeController;

Route::group(['prefix' => '{locale}',
    'as' => 'designer.',
    'where' => ['locale', '[a-zA-Z]{2}'],
    'middleware' => ['setlocale', 'language', 'default.language', 'verified']
], function(){

    Route::get('designer/dashboard', [HomeController::class, 'index'])->name('cpanel');

    /**
     * Route for list all courses
     */
    Route::get('designer/courses', [CourseController::class, 'index'])->name('courses.index');

});
