<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Course;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\LearningPath;
use App\Models\Module;
use App\Models\Unit;
use App\Models\Workshop;
use App\Models\Activity;
use App\Models\Task;
use App\Models\MenuItem;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Tag;
use App\Models\Modality;
use App\Models\Type;
use App\Models\User;
use App\Models\Skill;
use App\Models\Competency;
use App\Models\Scorm;

use App\Observers\LessonObserver;
use App\Observers\SectionObserver;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Capacitate custom helper functions
        require_once __DIR__ . '/../Helpers/helpers.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        Builder::macro('search', function ($field, $string) {
            return $string
            ? $this->where($field, 'like', '%'. $string.'%' )
                ->where('status', 3)
            : $this;
        });

        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function ( Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);

                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });

        // Carbon::setLocale(config('app.locale'));

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

        // Load all categories in navigation menu
        if (Schema::hasTable('categories')) {
            $categories = Category::orderBy('name')->limit(30)->get();
            view()->share('categories_list', $categories);
        }



        // Decouple your application logic from your stored data using an alias
        Relation::morphMap([
            'activity' => Activity::class,
            'category' => Category::class,
            'competency' => Competency::class,
            'course' => Course::class,
            'lesson' => Lesson::class,
            'learningPath' => LearningPath::class,
            'module' => Module::class,
            'scorm' => Scorm::class,
            'section' => Section::class,
            'skill' => Skill::class,
            'task' => Task::class,
            'topic' => Topic::class,
            'unit' => Unit::class,
            'user' => User::class,
            'workshop' => Workshop::class,
        ]);

        // // Create dynamic url/route to adminLTE menu
        // $events->listen(BuildingMenu::class, function (BuildingMenu $event) {



        //     // Dashboard Home
        //     $event->menu->add([
        //         'key'   => 'dashboard',
        //         'text'  => 'Dashboard',
        //         'url' => route('admin.cpanel', app()->getLocale()),
        //         'icon'  => 'fas fa-fw fa-tachometer-alt',
        //         'can'   => 'view-dashboard',
        //     ]);



        //     // Manage menu items
        //     // $event->menu->addAfter('dashboard', [
        //     //     'key'         => 'menu_items',
        //     //     'text'        => 'Menú',
        //     //     'url'         => route( 'admin.items.index', app()->getLocale() ),
        //     //     'icon'        => 'fas fa-fw fa-sitemap',
        //     //     'active'      => ['admin/items*'],
        //     // ]);

        //     // List all courses for Admin users"
        //     $event->menu->addAfter('dashboard', [
        //         'key'           => 'admin_courses',
        //         'text'          => 'courses',
        //         // 'url'           => route('admin.courses.index' ), // url/route
        //         'icon'          => 'fas fa-laptop mr-1',
        //         'can'           => 'view-dashboard',
        //         'submenu'       => [
        //             [
        //                 'key'   => 'admin_all_courses',
        //                 'text'  => 'Todos los cursos',
        //                 'url'   => route('admin.courses.index', app()->getLocale()),
        //                 'icon'  => 'fas fa-laptop mr-1',
        //             ],
        //             [
        //                 'key'   => 'admin_published_courses',
        //                 'text'  => 'Publicados',
        //                 'url'   => route('admin.courses.published', app()->getLocale()),
        //                 'icon'  => 'fas fa-check-circle mr-1',
        //             ],
        //             [
        //                 'key'   => 'admin_course_revision',
        //                 'text'  => 'Cursos en revisión',
        //                 'url'   => route('admin.courses.revision', app()->getLocale()),
        //                 'icon'  => 'fas fa-search mr-1',
        //             ],
        //         ],
        //     ]);

        //     // $event->menu->addAfter('course_options', [
        //     //     'key'           => 'admin_course_revision',
        //     //     'text'          => 'Cursos en revisión',
        //     //     'url'           => route('admin.courses.revision' ), // url/route
        //     //     'icon'          => 'fas fa-search mr-1',
        //     // ]);



        //     // Dashboard for Designer users
        //     // $event->menu->add([
        //     //     'key'   => 'designer_dashboard',
        //     //     'text'  => 'Dashboard',
        //     //     'url' => route( 'designer.cpanel' ),
        //     //     'icon'  => 'fas fa-fw fa-tachometer-alt',
        //     //     'can'   => 'view-dashboard',
        //     // ]);

        //     // List all courses for Designer users
        //     // $event->menu->addAfter('dashboard', [
        //     //     'key'           => 'published_courses',
        //     //     'text'          => 'Cursos',
        //     //     'url'           => route('contributor.courses.index' ), // url/route
        //     //     'icon'          => 'fas fa-laptop mr-1',
        //     //     'active'        => ['contributor/courses*'],
        //     //     'can'           => 'view-dashboard',
        //     // ]);

        //     // Manage roles
        //     $event->menu->addAfter('admin_courses', [
        //         'key'         => 'roles',
        //         'text'        => 'roles',
        //         'url'         => route('admin.roles.index', app()->getLocale()),
        //         'icon'        => 'fas fa-fw fa-users-cog',
        //         'active'      => ['admin/roles/*'],
        //         'can'         => 'update-role',
        //     ]);

        //     // Manage users
        //     $event->menu->addAfter('roles', [
        //         'key'         => 'users',
        //         'text'        => 'users',
        //         'url'           => route('admin.users.index', app()->getLocale()), // url/route
        //         'icon'        => 'fas fa-fw fa-users',
        //         'active'      => ['admin/users/*'],
        //         'can'         => 'list-user',
        //     ]);

        //     // List all contact messages
        //     $event->menu->addAfter('users', [
        //         'key'           => 'admin_contacts',
        //         'text'          => 'messages',
        //         // 'url'           => route('admin.courses.index' ), // url/route
        //         'icon'          => 'fas fa-envelope mr-1',
        //         'can'           => 'view-dashboard',
        //         'submenu'       => [
        //             [
        //                 'key'   => 'admin_contacts_inbox',
        //                 'text'  => 'Bandeja de entrada',
        //                 'url'   => route('admin.contacts', app()->getLocale()),
        //                 'icon'  => 'fas fa-inbox mr-1',
        //             ],
        //             [
        //                 'key'   => 'admin_contacts_deleted',
        //                 'text'  => 'Mensajes eliminados',
        //                 'url'   => route('admin.contacts.deleted', app()->getLocale()),
        //                 'icon'  => 'far fa-trash-alt mr-1',
        //             ],
        //         ],
        //     ]);

        //     // Manage users
        //     $event->menu->addAfter('admin_contacts', [
        //         'key'         => 'slides',
        //         'text'        => 'Slider',
        //         'url'           => route('admin.slides.index', app()->getLocale()), // url/route
        //         'icon'        => 'far fa-fw fa-images',
        //         'active'      => ['admin/slides/*'],
        //         'can'         => 'view-dashboard',
        //     ]);

        //     // ADD HEADER
        //     $event->menu->addAfter('slides', [
        //         'key'         => 'course_options',
        //         'header'        => 'OPCIONES DE CURSOS',
        //     ]);

        //     // Courses with status "REVISION"
        //     // $event->menu->addAfter('course_options', [
        //     //     'key'           => 'admin_course_revision',
        //     //     'text'          => 'Cursos en revisión',
        //     //     'url'           => route('admin.courses.revision' ), // url/route
        //     //     'icon'          => 'fas fa-search mr-1',
        //     // ]);



        //     // Manage Categories
        //     $event->menu->addAfter('course_options', [
        //         'key'           => 'categories',
        //         'text'          => 'categories_trans_key',
        //         'url'           => route('admin.categories.index', app()->getLocale()), // url/route
        //         'icon'          => 'fas fa-tags mr-1',
        //         'active'        => ['admin/categories/*'],
        //     ]);

        //     // Manage Topics
        //     $event->menu->addAfter('categories', [
        //         'key'           => 'topics',
        //         'text'          => 'topics_trans_key',
        //         'url'           => route('admin.topics.index', app()->getLocale()), // url/route
        //         'icon'          => 'fas fa-tags mr-1',
        //         'active'        => ['admin/topics/*'],
        //     ]);

        //     // Manage Tags
        //     $event->menu->addAfter('topics', [
        //         'key'           => 'tags',
        //         'text'          => 'tags_trans_key',
        //         'url'           => route('admin.tags.index', app()->getLocale()), // url/route
        //         'icon'          => 'far fa-tag mr-1',
        //         'active'        => ['admin/tags', 'admin/tags/*/edit'],
        //     ]);

        //     // Manage Types
        //     $event->menu->addAfter('tags', [
        //         'key'           => 'types',
        //         'text'          => 'types',
        //         'url'           => route('admin.types.index', app()->getLocale()), // url/route
        //         'icon'          => 'fas fa-photo-video mr-1',
        //         'active'        => ['admin/types/*'],
        //     ]);

        //     // Manage Levels
        //     $event->menu->addAfter('types', [
        //         'key'           => 'levels',
        //         'text'          => 'levels',
        //         'url'           => route('admin.levels.index', app()->getLocale()), // url/route
        //         'icon'          => 'fas fa-layer-group mr-1',
        //         'active'        => ['admin/levels/*'],
        //     ]);

        //     // Manage Levels
        //     $event->menu->addAfter('levels', [
        //         'key'           => 'modalities',
        //         'text'          => 'modalities',
        //         'url'           => route('admin.modalities.index', app()->getLocale()), // url/route
        //         'icon'          => 'fas fa-laptop-house mr-1',
        //         'active'        => ['admin/modalities/*'],
        //     ]);

        //     // Manage Levels
        //     $event->menu->addAfter('modalities', [
        //         'key'           => 'platforms',
        //         'text'          => 'platforms',
        //         'url'           => route('admin.platforms.index', app()->getLocale()), // url/route
        //         'icon'          => 'fas fa-server mr-1',
        //         'active'        => ['admin/platforms/*'],
        //     ]);

        //     // Manage Prices
        //     $event->menu->addAfter('platforms', [
        //         'key'           => 'prices',
        //         'text'          => 'prices',
        //         'url'           => route('admin.prices.index', app()->getLocale()), // url/route
        //         'icon'          => 'fas fa-dollar-sign mr-1',
        //         'active'        => ['admin/prices/*'],
        //     ]);

        //     // Manage Partners
        //     $event->menu->addAfter('prices', [
        //         'key'           => 'partners',
        //         'text'          => 'companies_and_agreements',
        //         'url'           => route('admin.partners.index', app()->getLocale()), // url/route
        //         'icon'          => 'far fa-handshake mr-1',
        //         'active'        => ['admin/partners/*'],
        //     ]);
        // });
    }
}
