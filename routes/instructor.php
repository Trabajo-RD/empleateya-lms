<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;

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
Route::redirect('', 'instructor/courses');

//Route::get('courses', InstructorCourses::class)->middleware('can:LMS Leer cursos')->name('courses.index');

Route::resource('courses', CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->name('courses.curriculum');
