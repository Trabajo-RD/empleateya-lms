<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ResultController;

use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\User\UserController;

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

Route::redirect('/', '/es');

Route::get('setlocale/{locale}', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->back();
})->name('set.locale');


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



    /**
     * Route to display the courses catalog section
     */
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');



    /**
     * Route to display the categories section
     */

    // show single category courses
    Route::get('/categories/category/{category}', [CategoryController::class, 'show'])->name('courses.category');

    /**
     * Route to display the course topics
     */
    Route::get('/categories/category/{category}/topics/{topic}', [TopicController::class, 'show'])->name('courses.topic');

    /**
     * Route to display the courses tags
     */
    Route::get('/categories/category/topics/topic/tags/tag/{tag}', [TagController::class, 'show'])->name('courses.tag');

    /**
     * Route to display the courses categories
     */
    Route::get('/modality/{modality}', [ModalityController::class, 'show'])->name('courses.modality.show');

    /**
     * Route to display single course information
     */
    Route::get('/course/{course}', [CourseController::class, 'show'])->name('course.show');

    /**
     * Route to enroll users
     */
    Route::post('/course/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware(['auth', 'verified'])->name('courses.enrolled');

    /**
     * Route to control the user enrolled courses
     */
    Route::get('/course/learn/{course}', CourseStatus::class)->name('courses.status')->middleware(['auth', 'verified']);

    /**
     *  PAGES
     */
    Route::get('contact-us', [ContactController::class, 'contact'])->name('contact-us');
    Route::post('contact/sent-email', [ContactController::class, 'sendEmail'])->name('contact.send');

    Route::get('about', [PageController::class, 'about'])->name('pages.about');

    Route::get('glosary', [PageController::class, 'glosary'])->name('pages.glosary');

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

Route::get('chat/{chat}', [ChatController::class, 'show'])->name('chat.show');

Route::get('chat/with/{user}', [ChatController::class, 'chat_with'])->name('chat.with');

Route::get('chat/{chat}/get_users', [ChatController::class, 'get_users'])->name('chat.get_users');

Route::get('chat/{chat}/get_messages', [ChatController::class, 'get_messages'])->name('chat.get_messages');

Route::post('message/sent', [MessageController::class, 'sent'])->name('message.sent');




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
