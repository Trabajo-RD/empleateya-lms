<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\Lesson;
use App\Models\Section;
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
        // Observe changes in Lesson Model
        Lesson::observe(LessonObserver::class);

        // Observe changes in Section Model
        Section::observe(SectionObserver::class);

        Blade::directive('routeIs', function($expression){
            return "<?php if(Request::url() == route($expression)): ?>";
        });
    }
}
