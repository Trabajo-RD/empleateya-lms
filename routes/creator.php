<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Creator\CourseController;
use App\Http\Livewire\Creator\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;
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

Route::group(['prefix' => '{locale}',
    'where' => ['locale', '[a-zA-Z]{2}']
], function(){

    /**
     * Route to redirect user to correct creator courses route
     */
    Route::redirect('', 'creator/courses');

    /**
     * Route to manage creator courses using a Livewire component
     */
    Route::resource('courses', CourseController::class)->names('creator.courses');

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


    Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:LMS Actualizar cursos')->name('courses.curriculum');

    Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

    /**
     * Route for manage the course students
     */
    Route::get('courses/{course}/students', CoursesStudents::class)->middleware('can:LMS Actualizar cursos')->name('courses.students');

    /**
     * Route to request change course status
    */
    Route::post('courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');

    /**
     * Route to display the observations in course info view
     */
    Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

    // require __DIR__.'/auth.php';

});

