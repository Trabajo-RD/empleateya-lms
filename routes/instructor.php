<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\MicrosoftController;
use App\Http\Controllers\Instructor\LinkedinController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;
use App\Http\Controllers\Instructor\TestController;
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


Route::group([
    'prefix' => '{locale}',
    'as' => 'instructor.',
    'where' => ['locale', '[a-zA-Z]{2}'],
    'middleware' => ['setlocale', 'language', 'verified']
], function () {

    // Route::get('courses', CourseController::class);

    // Route::get('courses', CourseController::class)->name('instructor.courses.index');

    // Route::get('courses', CourseController::class)->middleware('can:create-course')->name('instructor.courses.index');

    Route::resource('instructor/courses', CourseController::class)->names('courses');

    /**
     * Route to display the diferent platform options to create a course
     */
    Route::get('instructor/new/courses', [CourseController::class, 'new'])->name('courses.new');

    /**
     * Route to manage another platform courses [Microsoft, Linkedin]
     */
    // Route::get('creator/courses/microsoft/create', [CourseController::class, 'createMicrosoftLearnCourse'])->name('courses.microsoft.create');
    Route::resource('instructor/microsoft/courses', MicrosoftController::class)->names('courses.microsoft');
    Route::resource('instructor/linkedin/courses', LinkedinController::class)->names('courses.linkedin');

    /**
     * Route for manage the course sections, lessons and lesson resources
     */
    Route::get('instructor/courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:update-course')->name('courses.curriculum');

    Route::get('instructor/courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

    /**
     * Route for manage the course students
     */
    Route::get('instructor/courses/{course}/students', CoursesStudents::class)->middleware('can:update-course')->name('courses.students');

    /**
     * Route to request change course status
     */
    Route::post('instructor/courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');

    /**
     * Route to display the observations in course info view
     */
    Route::get('instructor/courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

    /**
     * Route to review the courses in revision status
     */
    Route::get('instructor/courses/{course}/preview', [CourseController::class, 'preview'])->name('courses.preview');

    Route::get('test', [TestController::class, 'index'])->name('test');
    Route::post('test', [TestController::class, 'store'])->name('test.store');
    // Route::get('instructor/courses/{course}/{section}/test', [TestController::class, 'index'])->name('test');
    // Route::post('instructor/courses/{course}/{section}/test', [TestController::class, 'store'])->name('test.store');
});


/**
 * Route to request Microsoft Learn and LinkedIn Learning API
 */
Route::post('instructor/courses/microsoft/request', [MicrosoftController::class, 'requestCourseData'])->name('instructor.courses.microsoft.request');

Route::post('instructor/courses/linkedin/request', [LinkedinController::class, 'requestCourseData'])->name('instructor.courses.linkedin.request');
