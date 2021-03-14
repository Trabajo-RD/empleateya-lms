<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Creator\CourseController;
use App\Http\Livewire\Creator\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;

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

Route::redirect('', 'creator/courses');

Route::resource('courses', CourseController::class)->names('courses');

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




