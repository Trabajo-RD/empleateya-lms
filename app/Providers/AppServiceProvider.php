<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\MenuItem;
use App\Observers\LessonObserver;
use App\Observers\SectionObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultstringLength(191);

        // Observe changes in Lesson Model
        Lesson::observe(LessonObserver::class);

        // Observe changes in Section Model
        Section::observe(SectionObserver::class);

        // Validate route
        Blade::directive('routeIs', function($expression){
            return "<?php if(Request::url() == route($expression)): ?>";
        });

        // Create directive to display font awesome icons
        Blade::directive('icon', function($expression){
            return "<i class=\"fas fa-fw fa-{{ $expression }}\"></i>";
        });

        $menuItems = MenuItem::where('status', 2)->get();
        view()->share('menuItems', $menuItems);
    }
}
