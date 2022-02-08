<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\ModalityController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\SlideController;
// use App\Http\Livewire\Admin\ContactsMessages;
use App\Http\Controllers\Admin\ContactController;

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



Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {

    Route::get('/admin', [HomeController::class, 'index'])->middleware('can:view-dashboard')->name('cpanel');

    Route::get('/admin/contact-us', [ContactController::class, 'index'])->name('contacts');
    Route::get('/admin/contacts-us/deleted', [ContactController::class, 'deleted_messages'])->name('contacts.deleted');

    Route::resource('admin/roles', RoleController::class)->names('roles');

    //Route::resource('users', UserController::class)->names('users'); // Create all (7) routes for CRUD

    Route::resource('admin/users', UserController::class)->only(['index', 'edit', 'update'])->names('users');

    /**
     * Route to manage course categories
     */
    Route::resource('admin/categories', CategoryController::class)->names('categories');

    /**
     * Route to manage course category -> topics
     */
    Route::resource('admin/topics', TopicController::class)->names('topics');

    /**
     * Route to manage course category -> topics
     */
    Route::resource('admin/tags', TagController::class)->names('tags');

    /**
     * Route to manage course levels
     */
    Route::resource('admin/levels', LevelController::class)->names('levels');

    /**
     * Route to manage course prices
     */
    Route::resource('admin/prices', PriceController::class)->names('prices');

    /**
     * Route to manage types
     */
    Route::resource('admin/types', TypeController::class)->names('types');

    /**
     * Route to manage modalities
     */
    Route::resource('admin/modalities', ModalityController::class)->names('modalities');

    /**
     * Route to manage slides items (Hero carousel)
     */
    Route::resource('admin/slides', SlideController::class)->names('slides');

    /**
     * Route to manage lesson video platforms
     */
    Route::resource('admin/platforms', PlatformController::class)->names('platforms');

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
    Route::get('admin/courses/{course}/show', [CourseController::class, 'show'])->name('courses.show');

    // /**
    //  * Route to aprove courses to publish
    //  */
    // Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

    /**
     * Route to aprove courses to publish
     */
    Route::post('admin/courses/{course}/status', [CourseController::class, 'changeStatus'])->name('courses.status');

    /**
     * Route to display the course observation form
     */
    Route::get('admin/courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

    /**
     * Route to process the sending observation
     */
    Route::post('admin/courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');
});


/**
 * Route to aprove courses to publish
 */
Route::post('admin/courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

/**
 * Route to export a ModelExport list to excel
 */
Route::get('/admin/courses/export/{format}', [CourseController::class, 'exportAllCourses'])->name('all.courses.export');
Route::get('/admin/published-courses/export/{format}', [CourseController::class, 'exportPublishedCourses'])->name('published.courses.export');

/**
 * Routes to export UserModel
 */
Route::get('/admin/users/export/{format}', [UserController::class, 'exportAllUsers'])->name('all.users.export');
