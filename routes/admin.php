<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;

/*
|--------------------------------------------------------------------------
| Web Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [HomeController::class, 'index'])->middleware('can:LMS Ver Dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

//Route::resource('users', UserController::class)->names('users'); // Create all (7) routes for CRUD

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');

/**
 * Route for courses in revision
 */
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');

/**
 * Route to review the courses in revision status
 */
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');

/**
 * Route to aprove courses to publish
 */
Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

/**
 * Route to display the course observation form
 */
Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

/**
 * Route to process the sending observation
 */
Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');
