<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\MenuItem;
use App\Models\Category;
use App\Models\Type;
use App\Models\User;

use App\Observers\LessonObserver;
use App\Observers\SectionObserver;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
    public function boot(Dispatcher $events)
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

        $categories = Category::all();
        view()->share('categories', $categories);


        // Create dynamic url/route to adminLTE menu
        $events->listen(BuildingMenu::class, function(BuildingMenu $event){



            // Dashboard Home
            $event->menu->add([
                'key'   => 'dashboard',
                'text'  => 'Dashboard',
                'url' => route( 'admin.cpanel' ),
                'icon'  => 'fas fa-fw fa-tachometer-alt',
                'can'   => 'LMS Ver Dashboard',
            ]);



            // Manage menu items
            // $event->menu->addAfter('dashboard', [
            //     'key'         => 'menu_items',
            //     'text'        => 'Menú',
            //     'url'         => route( 'admin.items.index', app()->getLocale() ),
            //     'icon'        => 'fas fa-fw fa-sitemap',
            //     'active'      => ['admin/items*'],
            // ]);

            // Manage roles
            $event->menu->addAfter('dashboard', [
                'key'         => 'roles',
                'text'        => 'Roles',
                'url'         => route( 'admin.roles.index' ),
                'icon'        => 'fas fa-fw fa-users-cog',
                'active'      => ['admin/roles*'],
                'can'         => 'LMS Editar roles',
            ]);

            // Manage users
            $event->menu->addAfter('roles', [
                'key'         => 'users',
                'text'        => 'Usuarios',
                'url'           => route('admin.users.index' ), // url/route
                'icon'        => 'fas fa-fw fa-users',
                'active'      => ['admin/users*'],
                'can'         => 'LMS Leer usuarios',
            ]);

            // ADD HEADER
            $event->menu->addAfter('users', [
                'key'         => 'course_options',
                'header'        => 'OPCIONES DE CURSOS',
            ]);

            // Courses with status "REVISION"
            $event->menu->addAfter('course_options', [
                'key'           => 'course_revision',
                'text'          => 'Cursos en revisión',
                'url'           => route('admin.courses.index' ), // url/route
                'icon'          => 'fas fa-laptop mr-1',
            ]);



            // Manage Categories
            $event->menu->addAfter('course_revision', [
                'key'           => 'categories',
                'text'          => 'categories_trans_key',
                'url'           => route('admin.categories.index' ), // url/route
                'icon'          => 'fas fa-tags mr-1',
            ]);


            // Manage Types
            $event->menu->addAfter('categories', [
                'key'           => 'types',
                'text'          => 'Tipos',
                'url'           => route('admin.types.index'), // url/route
                'icon'          => 'fas fa-photo-video mr-1',
            ]);

            // Manage Levels
            $event->menu->addAfter('types', [
                'key'           => 'levels',
                'text'          => 'Niveles',
                'url'           => route('admin.levels.index'), // url/route
                'icon'          => 'fas fa-layer-group mr-1',
            ]);

            // Manage Levels
            $event->menu->addAfter('levels', [
                'key'           => 'modalities',
                'text'          => 'Modalidades',
                'url'           => route('admin.modalities.index'), // url/route
                'icon'          => 'fas fa-laptop-house mr-1',
            ]);

            // Manage Levels
            $event->menu->addAfter('modalities', [
                'key'           => 'platforms',
                'text'          => 'Plataformas',
                'url'           => route('admin.platforms.index'), // url/route
                'icon'          => 'fas fa-server mr-1',
            ]);

            // Manage Prices
            $event->menu->addAfter('platforms', [
                'key'           => 'prices',
                'text'          => 'Precios',
                'url'           => route('admin.prices.index'), // url/route
                'icon'          => 'fas fa-dollar-sign mr-1',
            ]);

            // Manage Partners
            $event->menu->addAfter('prices', [
                'key'           => 'partners',
                'text'          => 'Sociedades y Convenios',
                'url'           => route('admin.partners.index'), // url/route
                'icon'          => 'far fa-handshake mr-1',
            ]);







        });
    }
}
