<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseModerator\HomeController;
//use App\Http\Livewire\InstructorCourses;

/*
|--------------------------------------------------------------------------
| Moderators Routes
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
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {

    Route::get('/moderator', [HomeController::class, 'index'])->name('dashboard.index');

});
