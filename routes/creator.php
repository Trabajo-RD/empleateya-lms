<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Creator\CourseController;
use App\Http\Controllers\Creator\MicrosoftController;
use App\Http\Controllers\Creator\LinkedinController;
use App\Http\Livewire\Creator\CoursesCurriculum;
use App\Http\Livewire\Creator\CoursesStudents;
use App\Http\Controllers\Creator\TestController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Creator Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Route to redirect user to correct creator courses route
 */
// Route::redirect('', 'creator/courses');

Route::group([
    'prefix' => '{locale}',
    'as' => 'creator.',
    'where' => ['locale', '[a-zA-Z]{2}'],
    'middleware' => ['setlocale', 'language', 'verified']
], function () {



    /**
     * Route to manage creator courses using a Livewire component
     */
    Route::resource('creator/courses', CourseController::class)->names('courses');

    /**
     * Route to display the diferent platform options to create a course
     */
    Route::get('creator/new/courses', [CourseController::class, 'new'])->name('courses.new');

    /**
     * Route to manage Microsoft Learn Courses
     */
    // Route::get('creator/courses/microsoft/create', [CourseController::class, 'createMicrosoftLearnCourse'])->name('courses.microsoft.create');
    Route::resource('creator/microsoft/courses', MicrosoftController::class)->names('courses.microsoft');

    Route::resource('creator/linkedin/courses', LinkedinController::class)->names('courses.linkedin');

    /**
     * Route to get course information using an external URL with AJAX
     */
    Route::post('creator/courses/get', [CourseController::class, 'get'])->name('courses.get.info');

    /**
     * Route to manage the LMS Frontend content
     */
    // Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function(){
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [HomeController::class, 'dashboard'])
        ->name('dashboard');


    // Route::get('{lang}/dashboard', [HomeController::class, 'dashboard'])
    // ->middleware(['auth'])
    // ->name('dashboard')
    // ->where('lang', '[a-zA-Z]{2}');


    // Route::group(['prefix' => '{lang}',
    //     'where' => ['lang', '[a-zA-Z]{2}']
    // ], function(){
    //     Route::get('dashboard', [HomeController::class, 'dashboard'])
    //     ->middleware(['auth'])
    //     ->name('dashboard');
    // });


    Route::get('creator/courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:LMS Actualizar cursos')->name('courses.curriculum');

    Route::get('creator/courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

    /**
     * Route for manage the course students
     */
    Route::get('creator/courses/{course}/students', CoursesStudents::class)->middleware('can:LMS Actualizar cursos')->name('courses.students');

    /**
     * Route to request change course status
     */
    Route::post('creator/courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');

    /**
     * Route to display the observations in course info view
     */
    Route::get('creator/courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

    // require __DIR__.'/auth.php';

    /**
     * Route to review the courses in revision status
     */
    Route::get('creator/courses/{course}/preview', [CourseController::class, 'preview'])->name('courses.preview');

    Route::get('creator/courses/{course}/{section}/test', [TestController::class, 'index'])->name('test');
    Route::post('creator/courses/{course}/{section}/test', [TestController::class, 'store'])->name('test.store');
});


/**
 * Route to request Microsoft Learn and LinkedIn Learning API
 */
Route::post('creator/courses/microsoft/request', [MicrosoftController::class, 'requestCourseData'])->name('creator.courses.microsoft.request');

Route::post('creator/courses/linkedin/request', [LinkedinController::class, 'requestCourseData'])->name('creator.courses.linkedin.request');

Route::get('creator/getTopics/{id}', [CourseController::class, 'getTopicData'])->name('creator.courses.topics.request');
