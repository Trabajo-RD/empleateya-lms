<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;

// use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminDashboard;


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
use App\Http\Controllers\Admin\MenuController;

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

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

// Route::middleware(['auth:admin,admin', 'verified'])->get('/admin/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::prefix(LaravelLocalization::setLocale())->middleware([ 'auth:sanctum,admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'verified' ])->group(function () {

    Route::get('admin/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');

    Route::get('admin/contact-us', [ContactController::class, 'index'])->name('admin.contacts');
    Route::get('admin/contacts-us/deleted', [ContactController::class, 'deleted_messages'])->name('admin.contacts.deleted');

    Route::resource('admin/roles', RoleController::class)->names('admin.roles');

    //Route::resource('users', UserController::class)->names('users'); // Create all (7) routes for CRUD

    // Resource user routes
    Route::resource('admin/users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

    Route::get('admin/dashboard/menus/index', [MenuController::class, 'index'])->name('admin.dashboard.menus.index');
    Route::post('admin/dashboard/menus/store', [MenuController::class, 'store'])->name('admin.dashboard.menus.store');
    // Ajax route
    Route::get('admin/add-categories-to-menu', [MenuController::class, 'addCategoryToMenu'])->name('admin.dashboard.menus.add.categories');


    // Return the view of password reset form
    Route::get('admin/users/{user}/reset-password', [UserController::class, 'requestPasswordReset'])->name('admin.users.reset.password');

    // Update user's password
    Route::post('admin/users/password-updated', [UserController::class, 'userPasswordReset'])->middleware(['auth', 'verified'])->name('admin.users.password.updated');

    /**
     * Route to manage course categories
     */
    Route::resource('admin/categories', CategoryController::class)->names('admin.categories');

    /**
     * Route to manage course category -> topics
     */
    Route::resource('admin/topics', TopicController::class)->names('admin.topics');

    /**
     * Route to manage course category -> topics
     */
    Route::resource('admin/tags', TagController::class)->names('admin.tags');

    /**
     * Route to manage course levels
     */
    Route::resource('admin/levels', LevelController::class)->names('admin.levels');

    /**
     * Route to manage course prices
     */
    Route::resource('admin/prices', PriceController::class)->names('admin.prices');

    /**
     * Route to manage types
     */
    Route::resource('admin/types', TypeController::class)->names('admin.types');

    /**
     * Route to manage modalities
     */
    Route::resource('admin/modalities', ModalityController::class)->names('admin.modalities');

    /**
     * Route to manage slides items (Hero carousel)
     */
    Route::resource('admin/slides', SlideController::class)->names('admin.slides');

    /**
     * Route to manage lesson video platforms
     */
    Route::resource('admin/platforms', PlatformController::class)->names('admin.platforms');

    /**
     * Route to manage partners informations
     */
    Route::resource('admin/partners', PartnerController::class)->names('admin.partners');

    /**
     * Route for list all courses
     */
    Route::get('admin/courses', [CourseController::class, 'index'])->name('admin.courses.index');

    /**
     * Route for list all courses
     */
    Route::get('admin/courses/published', [CourseController::class, 'published'])->name('admin.courses.published');

    /**
     * Route for courses in revision
     */
    Route::get('admin/courses/revision', [CourseController::class, 'revision'])->name('admin.courses.revision');

    /**
     * Route to review the courses in revision status
     */
    Route::get('admin/courses/{course}/show', [CourseController::class, 'show'])->name('admin.courses.show');

    // /**
    //  * Route to aprove courses to publish
    //  */
    // Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

    /**
     * Route to aprove courses to publish
     */
    Route::post('admin/courses/{course}/status', [CourseController::class, 'changeStatus'])->name('admin.courses.status');

    /**
     * Route to display the course observation form
     */
    Route::get('admin/courses/{course}/observation', [CourseController::class, 'observation'])->name('admin.courses.observation');

    /**
     * Route to process the sending observation
     */
    Route::post('admin/courses/{course}/reject', [CourseController::class, 'reject'])->name('admin.courses.reject');



});


/**
 * Route to aprove courses to publish
 */
Route::post('admin/courses/{course}/approved', [CourseController::class, 'approved'])->name('admin.courses.approved');

/**
 * Route to export a ModelExport list to excel
 */
Route::get('/admin/courses/export/{format}', [CourseController::class, 'exportAllCourses'])->name('admin.all.courses.export');
Route::get('/admin/published-courses/export/{format}', [CourseController::class, 'exportPublishedCourses'])->name('admin.published.courses.export');

/************************
 *     REPORTS
 ************************/

/**
 * Routes to export UserModel
 */
Route::get('/admin/users/export/{format}', [UserController::class, 'exportAllUsers'])->name('admin.all.users.export');
