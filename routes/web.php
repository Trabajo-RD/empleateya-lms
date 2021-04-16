<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Session;

use App\Http\Livewire\CourseStatus;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function(){
    return redirect(app()->getLocale());
});

Route::get('setlocale/{locale}',function($lang){
    Session::put('locale',$lang);
    return redirect()->back();
})->name('set.locale');


Route::group(['prefix' => '{locale}',
    'where' => ['locale', '[a-zA-Z]{2}'],
    'middleware' => ['setlocale', 'language']
], function(){

    /**
     * Route to display the home page
     */
    Route::get('/', HomeController::class)->name('home');

    // Auth::routes();

    /**
     * TODO: Make it work
     * Route to set locale
     */
    // Route::get('/set-locale/{locale}', function ($locale) {
    //     App::setLocale($locale);
    //     session()->put('locale', $locale);
    //     return redirect()->back();
    // })->middleware('auth')->name('locale.setting');

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * Route to display the courses home page
     */
    Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

    /**
     * Route to display single course information
     */
    Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

    /**
     * Route to enroll users
     */
    Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

    /**
     * Route to control the user enrolled courses
     */
    Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');

    // Auth::routes(['verify' => true]);

});
