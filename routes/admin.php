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
    'middleware' => ['setlocale', 'language']
], function(){

    Route::get('admin', [HomeController::class, 'index'])->middleware('can:LMS Ver Dashboard')->name('home');

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
     * Route to manage lesson video platforms
     */
    Route::resource('platforms', PlatformController::class)->names('platforms');

    /**
     * Route to manage partners informations
     */
    Route::resource('partners', PartnerController::class)->names('partners');

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

});
