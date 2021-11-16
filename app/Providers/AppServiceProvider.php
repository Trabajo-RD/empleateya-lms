<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\MenuItem;
use App\Models\Category;
use App\Models\Modality;
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
        // Blade::setEchoFormat('e(utf8_encode(%s))');

        Schema::defaultstringLength(191);

        // Observe changes in Lesson Model
        Lesson::observe(LessonObserver::class);

        // Observe changes in Section Model
        Section::observe(SectionObserver::class);

        // Validate route
        Blade::directive('routeIs', function ($expression) {
            return "<?php if(Request::url() == route($expression)): ?>";
        });

        // Create directive to display font awesome icons
        Blade::directive('icon', function ($expression) {
            return "<i class=\"fas fa-fw fa-{{ $expression }}\"></i>";
        });

        // $menuItems = MenuItem::where('status', 2)->get();
        // view()->share('menuItems', $menuItems);

        if (Schema::hasTable('categories')) {
            $categories = Category::all();
            view()->share('categories', $categories);
        }

        if (Schema::hasTable('modalities')) {
            $modalities = Modality::all();
            view()->share('modalities', $modalities);
        }


        // Create dynamic url/route to adminLTE menu
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {



            // Dashboard Home
            $event->menu->add([
                'key'   => 'dashboard',
                'text'  => 'Dashboard',
                'url' => route('admin.cpanel'),
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

            // List all courses for Admin users"
            $event->menu->addAfter('dashboard', [
                'key'           => 'admin_courses',
                'text'          => 'Cursos',
                // 'url'           => route('admin.courses.index' ), // url/route
                'icon'          => 'fas fa-laptop mr-1',
                'can'           => 'LMS Ver Dashboard',
                'submenu'       => [
                    [
                        'key'   => 'admin_all_courses',
                        'text'  => 'Todos los cursos',
                        'url'   => route('admin.courses.index'),
                        'icon'  => 'fas fa-laptop mr-1',
                    ],
                    [
                        'key'   => 'admin_published_courses',
                        'text'  => 'Publicados',
                        'url'   => route('admin.courses.published'),
                        'icon'  => 'fas fa-check-circle mr-1',
                    ],
                    [
                        'key'   => 'admin_course_revision',
                        'text'  => 'Cursos en revisión',
                        'url'   => route('admin.courses.revision'),
                        'icon'  => 'fas fa-search mr-1',
                    ],
                ],
            ]);

            // $event->menu->addAfter('course_options', [
            //     'key'           => 'admin_course_revision',
            //     'text'          => 'Cursos en revisión',
            //     'url'           => route('admin.courses.revision' ), // url/route
            //     'icon'          => 'fas fa-search mr-1',
            // ]);



            // Dashboard for Designer users
            // $event->menu->add([
            //     'key'   => 'designer_dashboard',
            //     'text'  => 'Dashboard',
            //     'url' => route( 'designer.cpanel' ),
            //     'icon'  => 'fas fa-fw fa-tachometer-alt',
            //     'can'   => 'LMS Administrar diseno',
            // ]);

            // List all courses for Designer users
            // $event->menu->addAfter('dashboard', [
            //     'key'           => 'published_courses',
            //     'text'          => 'Cursos',
            //     'url'           => route('contributor.courses.index' ), // url/route
            //     'icon'          => 'fas fa-laptop mr-1',
            //     'active'        => ['contributor/courses*'],
            //     'can'           => 'LMS Monitorear cursos',
            // ]);

            // Manage roles
            $event->menu->addAfter('admin_courses', [
                'key'         => 'roles',
                'text'        => 'Roles',
                'url'         => route('admin.roles.index'),
                'icon'        => 'fas fa-fw fa-users-cog',
                'active'      => ['admin/roles/*'],
                'can'         => 'LMS Editar roles',
            ]);

            // Manage users
            $event->menu->addAfter('roles', [
                'key'         => 'users',
                'text'        => 'Usuarios',
                'url'           => route('admin.users.index'), // url/route
                'icon'        => 'fas fa-fw fa-users',
                'active'      => ['admin/users/*'],
                'can'         => 'LMS Leer usuarios',
            ]);

            // List all contact messages
            $event->menu->addAfter('users', [
                'key'           => 'admin_contacts',
                'text'          => 'Mensajes',
                // 'url'           => route('admin.courses.index' ), // url/route
                'icon'          => 'fas fa-envelope mr-1',
                'can'           => 'LMS Ver Dashboard',
                'submenu'       => [
                    [
                        'key'   => 'admin_contacts_inbox',
                        'text'  => 'Bandeja de entrada',
                        'url'   => route('admin.contacts'),
                        'icon'  => 'fas fa-inbox mr-1',
                    ],
                    [
                        'key'   => 'admin_contacts_deleted',
                        'text'  => 'Mensajes eliminados',
                        'url'   => route('admin.contacts.deleted'),
                        'icon'  => 'far fa-trash-alt mr-1',
                    ],
                ],
            ]);

            // Manage users
            $event->menu->addAfter('admin_contacts', [
                'key'         => 'slides',
                'text'        => 'Slider',
                'url'           => route('admin.slides.index'), // url/route
                'icon'        => 'far fa-fw fa-images',
                'active'      => ['admin/slides/*'],
                'can'         => 'LMS Ver Dashboard',
            ]);

            // ADD HEADER
            $event->menu->addAfter('slides', [
                'key'         => 'course_options',
                'header'        => 'OPCIONES DE CURSOS',
            ]);

            // Courses with status "REVISION"
            // $event->menu->addAfter('course_options', [
            //     'key'           => 'admin_course_revision',
            //     'text'          => 'Cursos en revisión',
            //     'url'           => route('admin.courses.revision' ), // url/route
            //     'icon'          => 'fas fa-search mr-1',
            // ]);



            // Manage Categories
            $event->menu->addAfter('course_options', [
                'key'           => 'categories',
                'text'          => 'categories_trans_key',
                'url'           => route('admin.categories.index'), // url/route
                'icon'          => 'fas fa-tags mr-1',
                'active'        => ['admin/categories/*'],
            ]);

            // Manage Topics
            $event->menu->addAfter('categories', [
                'key'           => 'topics',
                'text'          => 'topics_trans_key',
                'url'           => route('admin.topics.index'), // url/route
                'icon'          => 'fas fa-tags mr-1',
                'active'        => ['admin/topics/*'],
            ]);

            // Manage Tags
            $event->menu->addAfter('topics', [
                'key'           => 'tags',
                'text'          => 'tags_trans_key',
                'url'           => route('admin.tags.index'), // url/route
                'icon'          => 'far fa-bookmark mr-1',
                'active'        => ['admin/tags', 'admin/tags/*/edit'],
            ]);

            // Manage Types
            $event->menu->addAfter('tags', [
                'key'           => 'types',
                'text'          => 'Tipos',
                'url'           => route('admin.types.index'), // url/route
                'icon'          => 'fas fa-photo-video mr-1',
                'active'        => ['admin/types/*'],
            ]);

            // Manage Levels
            $event->menu->addAfter('types', [
                'key'           => 'levels',
                'text'          => 'Niveles',
                'url'           => route('admin.levels.index'), // url/route
                'icon'          => 'fas fa-layer-group mr-1',
                'active'        => ['admin/levels/*'],
            ]);

            // Manage Levels
            $event->menu->addAfter('levels', [
                'key'           => 'modalities',
                'text'          => 'Modalidades',
                'url'           => route('admin.modalities.index'), // url/route
                'icon'          => 'fas fa-laptop-house mr-1',
                'active'        => ['admin/modalities/*'],
            ]);

            // Manage Levels
            $event->menu->addAfter('modalities', [
                'key'           => 'platforms',
                'text'          => 'Plataformas',
                'url'           => route('admin.platforms.index'), // url/route
                'icon'          => 'fas fa-server mr-1',
                'active'        => ['admin/platforms/*'],
            ]);

            // Manage Prices
            $event->menu->addAfter('platforms', [
                'key'           => 'prices',
                'text'          => 'Precios',
                'url'           => route('admin.prices.index'), // url/route
                'icon'          => 'fas fa-dollar-sign mr-1',
                'active'        => ['admin/prices/*'],
            ]);

            // Manage Partners
            $event->menu->addAfter('prices', [
                'key'           => 'partners',
                'text'          => 'Sociedades y Convenios',
                'url'           => route('admin.partners.index'), // url/route
                'icon'          => 'far fa-handshake mr-1',
                'active'        => ['admin/partners/*'],
            ]);
        });
    }
}
