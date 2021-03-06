<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\ModalityController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\SlideController;

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



Route::group(['prefix' => '{locale}',
    'as' => 'admin.',
    'where' => ['locale', '[a-zA-Z]{2}'],
    'middleware' => ['setlocale', 'language', 'default.language', 'verified']
], function(){

    Route::get('/admin', [HomeController::class, 'index'])->middleware('can:LMS Ver Dashboard')->name('cpanel');

    Route::resource('roles', RoleController::class)->names('roles');

    //Route::resource('users', UserController::class)->names('users'); // Create all (7) routes for CRUD

    Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');

    /**
     * Route to manage course categories
     */
    Route::resource('categories', CategoryController::class)->names('categories');

    /**
     * Route to manage course levels
     */
    Route::resource('levels', LevelController::class)->names('levels');

    /**
     * Route to manage course prices
     */
    Route::resource('prices', PriceController::class)->names('prices');

    /**
     * Route to manage types
     */
    Route::resource('types', TypeController::class)->names('types');

    /**
     * Route to manage modalities
     */
    Route::resource('modalities', ModalityController::class)->names('modalities');

    /**
     * Route to manage slides items (Hero carousel)
     */
    Route::resource('slides', SlideController::class)->names('slides');

    /**
     * Route to manage lesson video platforms
     */
    Route::resource('platforms', PlatformController::class)->names('platforms');

    /**
     * Route to manage partners informations
     */
    Route::resource('admin/partners', PartnerController::class)->names('partners');

    /**
     * Route for list all courses
     */
    Route::get('admin/courses', [CourseController::class, 'index'])->name('courses.index');

    /**
     * Route for list all courses
     */
    Route::get('admin/courses/published', [CourseController::class, 'published'])->name('courses.published');

    /**
     * Route for courses in revision
     */
    Route::get('admin/courses/revision', [CourseController::class, 'revision'])->name('courses.revision');

    /**
     * Route to review the courses in revision status
     */
    Route::get('courses/{course}/show', [CourseController::class, 'show'])->name('courses.show');

    // /**
    //  * Route to aprove courses to publish
    //  */
    // Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

    /**
     * Route to aprove courses to publish
     */
    Route::post('courses/{course}/status', [CourseController::class, 'changeStatus'])->name('courses.status');

    /**
     * Route to display the course observation form
     */
    Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

    /**
     * Route to process the sending observation
     */
    Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');

});


    /**
     * Route to aprove courses to publish
     */
    Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('admin.courses.approved');

    /**
     * Route to export a ModelExport list to excel
     */
    Route::get('/admin/courses/export/{format}', [CourseController::class, 'exportAllCourses'])->name('admin.all.courses.export');
    Route::get('/admin/published-courses/export/{format}', [CourseController::class, 'exportPublishedCourses'])->name('admin.published.courses.export');

    /**
     * Routes to export UserModel
     */
    Route::get('/admin/users/export/{format}', [UserController::class, 'exportAllUsers'])->name('admin.all.users.export');

