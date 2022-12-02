<?php

use App\Http\Controllers\Admin\AdminController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\LearningPathController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TermController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ResultController;

use App\Http\Controllers\Scorm\ScormController;

// livewire components

use App\Http\Livewire\Course\CourseStatus;
use App\Http\Livewire\Workshop\WorkshopStatus;
use App\Http\Livewire\LearningPath\LearningPathStatus;
use App\Http\Livewire\Module\ModuleStatus;

use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\User\UserController;

//use App\Http\Livewire\CourseStatus;

use App\Models\Scorm;


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

// Route::redirect('/', '/es');

Route::get('setlocale/{locale}', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->back();
})->name('set.locale');

// Route::middleware('auth:admin')->group(function () {
//     Route::get('admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
//     Route::post('admin/login', [AdminController::class, 'store']);
// });

// Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

/*****************************
 *      PUBLIC SCORM ROUTES
 *****************************/
// Route::get('/scorm', function(Scorm $scorm){
//     return view('scorm.index', ['d' => $scorm->data]);
// })->name('scorm.player');


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {

    /**
     * Route to display the home page
     */
    Route::get('/', HomeController::class)->name('home');

    // Auth::routes();

    /**
     * Route to display the home page
     */
    Route::get('home', HomeController::class)->name('home-locale');

    Route::get('/scorm', function(Scorm $scorm){
        return view('scorm.index', ['d' => $scorm->data]);
    })->name('scorm.player');



    /*****************
     *  CATEGORIES
     *****************/

     // show single category courses
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

    // show single category courses
    Route::get('categories/{category}/show', [CategoryController::class, 'show'])->name('categories.show');

    /****************
     *    TOPICS
     ****************/

    // Return all topics view
    Route::get('topics', [TopicController::class, 'index'])->name('topics');

    // Return single topic view
    Route::get('topics/topic/{topic}/show', [TopicController::class, 'show'])->name('topic.show');

    /********************
     *    MODALITIES
     ********************/

    // Return all topics view
    Route::get('modalities', [ModalityController::class, 'index'])->name('modalities');

    // Route to display single modality
    Route::get('modalities/modality/{modality}/show', [ModalityController::class, 'show'])->name('modality.show');

    /**********************
     * GLOSARY OF TERMS
     **********************/

    // Return all terms
    Route::get('glosary', [TermController::class, 'index'])->name('glosary.index');

    // Return single term
    Route::get('glosary/term/{term}/show', [TermController::class, 'show'])->name('glosary.show');


    /******************
     *      TAGS
     ******************/

    /**
     * Return all tags index view
     */
    Route::get('tags', [TagController::class, 'index'])->name('tags.index');

    /**
     * Route to display the courses tags
     */
    Route::get('tags/tag/{tag}/show', [TagController::class, 'show'])->name('tags.show');




    /**********************
     *      COURSES
     **********************/

    // Route to display the courses catalog section
    Route::get('courses/catalog', [CourseController::class, 'index'])->name('courses.index');
    // Route to display the single course information
    Route::get('course/{course}/show', [CourseController::class, 'show'])->name('courses.show');

    //------------- Courses Route Group with certain middleware ------------//

    Route::middleware(['auth', 'verified'])->group( function() {
        // Route to control the user enrolled courses
        Route::get('course/learn/{course}/status', CourseStatus::class)->name('courses.status');
        // Route to manage the enrollment
        Route::get('course/{course}/enrollment', [CourseController::class, 'enrollment'])->name('courses.enrollment');
        // Route to register the enroll action
        Route::post('course/{course}/enrolled', [CourseController::class, 'enrolled'])->name('courses.enrolled');
    });



    /*************************
     *      WORKSHOPS        *
    **************************/

    // Route to display the workshops catalog section
    Route::get('workshops', [WorkshopController::class, 'index'])->name('workshops.index');
    // Route to display the single workshop information
    Route::get('workshops/workshop/{workshop}/show', [WorkshopController::class, 'show'])->name('workshops.show');

    //------------- Workshops Route Group with certain middleware ------------//

    Route::middleware(['auth', 'verified'])->group( function() {
        // Route to control the user enrolled courses
        Route::get('workshop/learn/{workshop}/status', WorkshopStatus::class)->name('workshops.status');
        // Route to manage the enrollment
        Route::get('workshop/{workshop}/enrollment', [WorkshopController::class, 'enrollment'])->name('workshops.enrollment');
        // Route to enroll a given user to the workshop
        Route::post('workshop/{workshop}/enrolled', [WorkshopController::class, 'enrolled'])->name('workshops.enrolled');
    });



    /***********************
     *    LEARNING PATHS
     ***********************/

    // Return all Learning Paths catalog section
    Route::get('learning-paths', [LearningPathController::class, 'index'])->name('learning-paths.index');
    // Return single learning path section
    Route::get('learning-paths/path/{path}/show', [LearningPathController::class, 'show'])->name('learning-paths.show');

    //------------- Learning Paths Route Group with certain middleware ------------//

    Route::middleware(['auth', 'verified'])->group( function(){
        // Route to control the user enrolled paths
        Route::get('learning-paths/learn/{path}/status', LearningPathStatus::class)->name('learning-paths.status');
        // Route to manage the enrollment
        Route::get('learning-path/{path}/enrollment', [LearningPathController::class, 'enrollment'])->name('learning-paths.enrollment');
        // Route to enroll a given user to the path
        Route::post('learning-path/{path}/enrolled', [LearningPathController::class, 'enrolled'])->name('learning-paths.enrolled');
    });



    /****************************
     *          MODULES
     ****************************/

    // Route to list all modules
    Route::get('modules', [ModuleController::class, 'index'])->name('modules.index');
    // Route to show single module
    Route::get('modules/{module}/show', [ModuleController::class, 'show'])->name('modules.show');

    //------------- Modules Route Group with certain middleware ------------//

    Route::middleware(['auth', 'verified'])->group( function() {
        // Route to control the user enrolled module
        Route::get('modules/learn/{module}/status', ModuleStatus::class)->name('modules.status');
        // Route to manage the enrollment
        Route::get('modules/{module}/enrollment', [ModuleController::class, 'enrollment'])->name('modules.enrollment');
        // Route to enroll a given user to the module
        Route::post('modules/{module}/enrolled', [ModuleController::class, 'enrolled'])->name('modules.enrolled');
    });









    // Route::get('workshop/learn/{workshop}', WorkshopStatus::class)->name('workshops.status')->middleware(['auth', 'verified']);

    // Route::get('learning-path/learn/{path}', LearningPathStatus::class)->name('learning-paths.status')->middleware(['auth', 'verified']);

    /**
     *  PAGES
     */
    Route::get('contact-us', [ContactController::class, 'contact'])->name('contact-us');
    Route::post('contact/sent-email', [ContactController::class, 'sendEmail'])->name('contact.send');

    Route::get('about', [PageController::class, 'about'])->name('pages.about');

    // Route::get('glosary', [PageController::class, 'glosary'])->name('pages.glosary');

    /***
     * Documentation routes
     */
    Route::get('docs', [DocsController::class, 'overview'])->name('pages.docs.overview');
    Route::get('docs/roles', [DocsController::class, 'roles'])->name('pages.docs.roles');
    Route::get('docs/permissions', [DocsController::class, 'permissions'])->name('pages.docs.permissions');
    Route::get('docs/news/instructor', [DocsController::class, 'instructorNews'])->name('pages.docs.news.instructor');
    Route::get('docs/news/student', [DocsController::class, 'studentNews'])->name('pages.docs.news.student');


    // Auth::routes(['verify' => true]);

    /**
     * Route to show course by modality
     */
    // Route::get('courses/modality/{id}', function($id){
    //     return "Aqui va la modalidad";
    // })->name('courses.modality');

    Route::get('results/{result_id}', [ResultController::class, 'show'])->name('results.show');
    Route::get('send/{result_id}', [ResultController::class, 'send'])->name('results.send');

    /**
     * User Routes
     * Needed to add Jetstream::ignoreRoutes() function in JetstreamServiceProvider register()
     */
    // Route::get('profile/show', [UserController::class, 'show'])->name('profile.show');

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

// Route::get('chat/{chat}', [ChatController::class, 'show'])->name('chat.show');

// Route::get('chat/with/{user}', [ChatController::class, 'chat_with'])->name('chat.with');

// Route::get('chat/{chat}/get_users', [ChatController::class, 'get_users'])->name('chat.get_users');

// Route::get('chat/{chat}/get_messages', [ChatController::class, 'get_messages'])->name('chat.get_messages');

// Route::post('message/sent', [MessageController::class, 'sent'])->name('message.sent');




/**
 * Fortify Routes
 * Require add the function Fortify::ignoreRoutes() in the register method on FortifyServiceProvider
 */
// Route::group(['prefix' => '{locale}', 'middleware' => [config('fortify.middleware', ['web']), 'setLanguage']], function () {
//     $enableViews = config('fortify.views', true);

//     // Authentication...
//     if ($enableViews) {
//         Route::get('/login', [AuthenticatedSessionController::class, 'create'])
//             ->middleware(['guest'])
//             ->name('login');
//     }

//     $limiter = config('fortify.limiters.login');
//     $twoFactorLimiter = config('fortify.limiters.two-factor');

//     Route::post('/login', [AuthenticatedSessionController::class, 'store'])
//         ->middleware(array_filter([
//             'guest',
//             $limiter ? 'throttle:'.$limiter : null,
//         ]));

//     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
//         ->name('logout');

//     // Password Reset...
//     if (Features::enabled(Features::resetPasswords())) {
//         if ($enableViews) {
//             Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
//                 ->middleware(['guest'])
//                 ->name('password.request');

//             Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
//                 ->middleware(['guest'])
//                 ->name('password.reset');
//         }

//         Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
//             ->middleware(['guest'])
//             ->name('password.email');

//         Route::post('/reset-password', [NewPasswordController::class, 'store'])
//             ->middleware(['guest'])
//             ->name('password.update');
//     }

//     // Registration...
//     if (Features::enabled(Features::registration())) {
//         if ($enableViews) {
//             Route::get('/register', [RegisteredUserController::class, 'create'])
//                 ->middleware(['guest'])
//                 ->name('register');
//         }

//         Route::post('/register', [RegisteredUserController::class, 'store'])
//             ->middleware(['guest']);
//     }

//     // Email Verification...
//     if (Features::enabled(Features::emailVerification())) {
//         if ($enableViews) {
//             Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
//                 ->middleware(['auth'])
//                 ->name('verification.notice');
//         }

//         Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//             ->middleware(['auth', 'signed', 'throttle:6,1'])
//             ->name('verification.verify');

//         Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//             ->middleware(['auth', 'throttle:6,1'])
//             ->name('verification.send');
//     }

//     // Profile Information...
//     if (Features::enabled(Features::updateProfileInformation())) {
//         Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
//             ->middleware(['auth'])
//             ->name('user-profile-information.update');
//     }

//     // Passwords...
//     if (Features::enabled(Features::updatePasswords())) {
//         Route::put('/user/password', [PasswordController::class, 'update'])
//             ->middleware(['auth'])
//             ->name('user-password.update');
//     }

//     // Password Confirmation...
//     if ($enableViews) {
//         Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])
//             ->middleware(['auth'])
//             ->name('password.confirm');
//     }

//     Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
//         ->middleware(['auth'])
//         ->name('password.confirmation');

//     Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])
//         ->middleware(['auth']);

//     // Two Factor Authentication...
//     if (Features::enabled(Features::twoFactorAuthentication())) {
//         if ($enableViews) {
//             Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
//                 ->middleware(['guest'])
//                 ->name('two-factor.login');
//         }

//         Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
//             ->middleware(array_filter([
//                 'guest',
//                 $twoFactorLimiter ? 'throttle:'.$twoFactorLimiter : null,
//             ]));

//         $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
//             ? ['auth', 'password.confirm']
//             : ['auth'];

//         Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
//             ->middleware($twoFactorMiddleware);

//         Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
//             ->middleware($twoFactorMiddleware);

//         Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
//             ->middleware($twoFactorMiddleware);

//         Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
//             ->middleware($twoFactorMiddleware);

//         Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
//             ->middleware($twoFactorMiddleware);
//     }
// });






/**
 * Jetstream Routes
 * Require add the function Jetstream::ignoreRoutes() in the register method on JetstreamServiceProvider
 */
// Route::group(['prefix' => '{locale}', 'middleware' => [config('jetstream.middleware', ['web']), 'setLanguage']], function () {
//     if (Jetstream::hasTermsAndPrivacyPolicyFeature()) {
//         Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
//         Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
//     }

//     Route::group(['middleware' => ['auth', 'verified']], function () {
//         // User & Profile...
//         Route::get('/user/profile', [UserProfileController::class, 'show'])
//                     ->name('profile.show');

//         // API...
//         if (Jetstream::hasApiFeatures()) {
//             Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
//         }

//         // Teams...
//         if (Jetstream::hasTeamFeatures()) {
//             Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
//             Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
//             Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');

//             Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])
//                         ->middleware(['signed'])
//                         ->name('team-invitations.accept');
//         }
//     });
// });
