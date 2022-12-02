<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\Dashboard\StudentCourseController;

// use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Student\CourseController;

use App\Http\Livewire\Student\StudentIndex;

/*
|--------------------------------------------------------------------------
| Students Routes
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
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    // Route::get('dashboard', [HomeController::class, 'index']);
    Route::get('student/dashboard', [DashboardController::class, 'index'])->name('student.dashboard');
    Route::get('student/dashboard/courses', [StudentCourseController::class, 'index'])->name('student.dashboard.courses.index');
    Route::get('student/dashboard/courses/{course}/destroy', [StudentCourseController::class, 'destroy'])->name('student.dashboard.courses.destroy');

    // Listado de cursos del estudiante
    // Route::get('student/courses', CourseController::class)->name('courses.index');

    Route::get('student/learning', StudentIndex::class)->name('student.courses.index');

});
























