<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;

use App\Actions\Fortify\AttemptToAuthenticate; // locate in this route for admin guard
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable; // locate in this route for admin guard
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Http\Controllers\Admin\AdminController;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;
use App\Events\LoginHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Fortify::ignoreRoutes();

        $this->app->when([AdminController::class, AttemptToAuthenticate::class, RedirectIfTwoFactorAuthenticatable::class])
            ->needs(StatefulGuard::class)
            ->give(function () {
                return Auth::guard('admin');
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        /**
         * Route to request email verification
         */
        Fortify::verifyEmailView( function(){
            return view('auth.verify-email');
        });

        // Fortify::confirmPasswordView( function(){
        //     return view('auth.confirm-password');
        // });

        // Fortify::twoFactorChallengeView(function(){
        //     return view('auth.two-factor-challenge');
        // });

        // Fortify::resetPasswordView( function($request){
        //     return view('auth.reset-password', ['request' => $request]);
        // });

        Fortify::authenticateUsing(function(LoginRequest $request){
            $user = User::where('email', $request->identity)
                ->orWhere('document_id', $request->identity)->first();

            if( $user && Hash::check($request->password, $user->password)){

                $user->last_login = Carbon::now();
                $user->save();

                // Event to save the user last login
                event(new LoginHistory($user));

                return $user;
            }

        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
