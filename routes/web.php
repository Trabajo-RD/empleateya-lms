<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ResultController;

use App\Http\Controllers\Pages\ContactController;

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

/**
 * Route to display the home page
 */
Route::get('/', HomeController::class)->name('home');

Route::get('/', function () {
    return redirect()->route('home-locale', app()->getLocale());
})->name('home');

// Redirect: if prefix instructor. exists and user access with domain.com/instructor
// Route::redirect('', 'home');

Route::get('setlocale/{locale}', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->back();
})->name('set.locale');


Route::group([
    'prefix' => '{locale}',
    'where' => ['locale', '[a-zA-Z]{2}'],
    'middleware' => ['setlocale', 'language']
], function () {

    // Auth::routes();

    /**
     * Route to display the home page
     */
    Route::get('/', HomeController::class)->name('home-locale'); // TODO: repair home route

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * Route to display the courses home page
     */
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');

    /**
     * Route to display the courses categories
     */
    Route::get('courses/category/{category}', [CourseController::class, 'category'])->name('courses.category');

    /**
     * Route to display the course topics
     */
    Route::get('courses/{category}/{topic}', [CourseController::class, 'topic'])->name('courses.topic');

    /**
     * Route to display the courses tags
     */
    Route::get('tag/{tag}', [CourseController::class, 'tag'])->name('courses.tag');

    /**
     * Route to display the courses categories
     */
    Route::get('modalities/{modality}', [CourseController::class, 'modality'])->name('courses.modality');

    /**
     * Route to display single course information
     */
    Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');

    /**
     * Route to enroll users
     */
    Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware(['auth', 'verified'])->name('courses.enrolled');

    /**
     * Route to control the user enrolled courses
     */
    Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware(['auth', 'verified']);

    /**
     *  PAGES
     */
    Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact-us');
    Route::post('/contact/sent-email', [ContactController::class, 'sendEmail'])->name('contact.send');

    Route::get('/about', [PageController::class, 'about'])->name('pages.about');

    Route::get('/glosary', [PageController::class, 'glosary'])->name('pages.glosary');

    // Auth::routes(['verify' => true]);

    /**
     * Route to show course by modality
     */
    // Route::get('courses/modality/{id}', function($id){
    //     return "Aqui va la modalidad";
    // })->name('courses.modality');

    Route::get('results/{result_id}', [ResultController::class, 'show'])->name('results.show');
    Route::get('send/{result_id}', [ResultController::class, 'send'])->name('results.send');
});

Route::redirect('/home', '/');

Route::get('auth/user', function () {

    if (auth()->check()) {

        return response()->json([
            'authUser' => auth()->user()
        ]);

        return null;
    }
});

Route::get('chat/{chat}', [ChatController::class, 'show'])->name('chat.show');

Route::get('chat/with/{user}', [ChatController::class, 'chat_with'])->name('chat.with');

Route::get('chat/{chat}/get_users', [ChatController::class, 'get_users'])->name('chat.get_users');

Route::get('chat/{chat}/get_messages', [ChatController::class, 'get_messages'])->name('chat.get_messages');

Route::post('message/sent', [MessageController::class, 'sent'])->name('message.sent');



// Route::group(['middleware' => ['setlocale']], function(){

// })
