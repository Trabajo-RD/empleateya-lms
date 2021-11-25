<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\User;
use App\Policies\CoursePolicy;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Course::class => CoursePolicy::class,
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        /**
         *  Register a custom policy discovery callback
         */
        // Gate::guessPolicyNamesUsing(function ($modelClass) {
        //     // Return the name of the policy class for the given model...
        // });

        /**
         * Determine if the given user can create course
         */
        // Gate::define('create-course', function (User $user, Course $course){
        //     return $user->id === $course->user_id;
        // });
    }
}
