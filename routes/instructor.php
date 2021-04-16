<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;
use App\Http\Controllers\HomeController;

//use App\Http\Livewire\InstructorCourses;

/*
|--------------------------------------------------------------------------
| Instructor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect: if prefix instructor. exists and user access with domain.com/instructor
// Route::redirect('', 'instructor/courses');


Route::group(['prefix' => '{locale}',
    'as' => 'instructor.',
    'where' => ['locale', '[a-zA-Z]{2}'],
    'middleware' => ['setlocale', 'language']
], function(){

    // Route::get('courses', CourseController::class);

    // Route::get('courses', CourseController::class)->name('instructor.courses.index');

    // Route::get('courses', CourseController::class)->middleware('can:LMS Leer cursos')->name('instructor.courses.index');

    Route::resource('instructor/courses', CourseController::class)->names('courses');


    /**
     * Route for manage the course sections, lessons and lesson resources
     */
    Route::get('instructor/courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:LMS Actualizar cursos')->name('courses.curriculum');

    Route::get('instructor/courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

    /**
     * Route for manage the course students
     */
    Route::get('instructor/courses/{course}/students', CoursesStudents::class)->middleware('can:LMS Actualizar cursos')->name('courses.students');

    /**
     * Route to request change course status
     */
    Route::post('instructor/courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');

    /**
     * Route to display the observations in course info view
     */
    Route::get('instructor/courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

});
