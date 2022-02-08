<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    //public const HOME = '/dashboard';
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {

            $api = ['api'];
            $web = ['web'];
            $auth = ['auth'];

            /**
             * Generate routes
             */
            Route::prefix('api')
                ->middleware($api)
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware($web)
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware($web, $auth)
                ->name('admin.')
                //->prefix('admin')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            Route::middleware($web, $auth)
                ->name('dashboard.')
                //->prefix('dashboard')
                ->namespace($this->namespace)
                ->group(base_path('routes/dashboard.php'));

            Route::middleware($web, $auth)
                ->name('designer.')
                //->prefix('designer')
                ->namespace($this->namespace)
                ->group(base_path('routes/designer.php'));

            Route::middleware($web, $auth)
                ->name('course-moderator.')
                //->prefix('moderator')
                ->namespace($this->namespace)
                ->group(base_path('routes/coursemoderator.php'));

            Route::middleware($web, $auth)
                ->name('content-moderator.')
                //->prefix('moderator')
                ->namespace($this->namespace)
                ->group(base_path('routes/contentmoderator.php'));

            Route::middleware($web, $auth)
                ->name('contributor.')
                //->prefix('contributor')
                ->namespace($this->namespace)
                ->group(base_path('routes/contributor.php'));

            Route::middleware($web, $auth)
                ->name('instructor.')
                // ->prefix('instructor')
                ->namespace($this->namespace)
                ->group(base_path('routes/instructor.php'));

            Route::middleware($web, $auth)
                ->name('creator.')
                // ->prefix('creator')
                ->namespace($this->namespace)
                ->group(base_path('routes/creator.php'));

            Route::middleware($web, $auth)
                ->name('course-creator.')
                // ->prefix('creator')
                ->namespace($this->namespace)
                ->group(base_path('routes/coursecreator.php'));

           Route::middleware($web, $auth)
                ->name('content-creator.')
                // ->prefix('creator')
                ->namespace($this->namespace)
                ->group(base_path('routes/contentcreator.php'));

            Route::middleware($web, $auth)
                ->name('student.')
                // ->prefix('creator')
                ->namespace($this->namespace)
                ->group(base_path('routes/student.php'));

            Route::middleware($web, $auth)
                ->name('payment.')
                ->prefix('payment')
                ->namespace($this->namespace)
                ->group(base_path('routes/payment.php'));

            Route::middleware($web, $auth)
                ->name('docs.')
                // ->prefix('docs')
                ->namespace($this->namespace)
                ->group(base_path('routes/docs.php'));

        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
