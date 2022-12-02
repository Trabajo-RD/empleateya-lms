<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

use App\Models\Course;

class HomeController extends Controller
{
    public function index(){

        /**
         * Event AdminLTE BuildingMenu for Instructors
         */
        // Event::listen(BuildingMenu::class, function(BuildingMenu $event){

        //     /**
        //      * Recreate AdminLTE menu
        //      */
        //     // Dashboard Home
        //     $event->menu->add([
        //         'key'   => 'instructor_dashboard',
        //         'text'  => 'instructor_dashboard',
        //         'url' => route('instructor.dashboard.index'),
        //         'icon'  => 'fas fa-fw fa-tachometer-alt',
        //         'can'   => 'create-course',
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
        //     $event->menu->addAfter('instructor_dashboard', [
        //         'key'           => 'instructor_courses',
        //         'text'          => 'instructor_courses',
        //         // 'url'           => route('admin.courses.index' ), // url/route
        //         'icon'          => 'fas fa-laptop mr-1',
        //         'label'         => 4,
        //         'label_color'   => 'success',
        //         'can'           => 'create-course',
        //         'submenu'       => [
        //             [
        //                 'key'   => 'instructor_all_courses',
        //                 'text'  => 'instructor_all_courses',
        //                 'url'   => route('instructor.courses.index'),
        //                 'icon'  => 'fas fa-th mr-1',
        //                 'can'   => 'create-course'
        //             ],
        //             [
        //                 'key'   => 'instructor_published_courses',
        //                 'text'  => 'instructor_published_courses',
        //                 'url'   => route('admin.courses.published'),
        //                 'icon'  => 'fas fa-check-circle mr-1',
        //                 'can'   => 'update-course'
        //             ],
        //             [
        //                 'key'   => 'instructor_revision_courses',
        //                 'text'  => 'instructor_revision_courses',
        //                 'url'   => route('admin.courses.revision'),
        //                 'icon'  => 'fas fa-search mr-1',
        //                 'can'   => 'update-course'
        //             ],
        //             [
        //                 'key'   => 'instructor_draft_courses',
        //                 'text'  => 'instructor_draft_courses',
        //                 'url'   => route('admin.courses.revision'),
        //                 'icon'  => 'fas fa-edit mr-1',
        //                 'can'   => 'delete-course'
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
        //     $event->menu->addAfter('instructor_courses', [
        //         'key'         => 'instructor_quizzes',
        //         'text'        => 'instructor_quizzes',
        //         'url'         => route('admin.roles.index'),
        //         'icon'        => 'fas fa-tasks mr-1',
        //         'active'      => ['admin/roles/*'],
        //         'can'         => 'create-test',
        //     ]);

        //     // Manage users
        //     $event->menu->addAfter('instructor_quizzes', [
        //         'key'         => 'instructor_certificates',
        //         'text'        => 'instructor_certificates',
        //         'url'           => route('admin.users.index'), // url/route
        //         'icon'        => 'fas fa-certificate mr-1',
        //         'active'      => ['admin/users/*'],
        //         'can'         => 'list-certificate',
        //     ]);

        //     // List all contact messages
        //     $event->menu->addAfter('instructor_certificates', [
        //         'key'           => 'instructor_messages',
        //         'text'          => 'instructor_messages',
        //         // 'url'           => route('admin.courses.index' ), // url/route
        //         'icon'          => 'fas fa-envelope mr-1',
        //         'can'           => 'view-message',
        //         'submenu'       => [
        //             [
        //                 'key'   => 'instructor_inbox',
        //                 'text'  => 'instructor_inbox',
        //                 'url'   => route('admin.contacts'),
        //                 'icon'  => 'fas fa-inbox mr-1',
        //                 'can'   => 'list-message'
        //             ],
        //             [
        //                 'key'   => 'instructor_deleted_messages',
        //                 'text'  => 'instructor_deleted_messages',
        //                 'url'   => route('admin.contacts.deleted'),
        //                 'icon'  => 'far fa-trash-alt mr-1',
        //                 'can'   => 'delete-message'
        //             ],
        //         ],
        //     ]);

        //     // Manage users
        //     $event->menu->addAfter('admin_contacts', [
        //         'key'         => 'slides',
        //         'text'        => 'Slider',
        //         'url'           => route('admin.slides.index'), // url/route
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
        //         'url'           => route('admin.categories.index'), // url/route
        //         'icon'          => 'fas fa-tags mr-1',
        //         'active'        => ['admin/categories/*'],
        //     ]);

        //     // Manage Topics
        //     $event->menu->addAfter('categories', [
        //         'key'           => 'topics',
        //         'text'          => 'topics_trans_key',
        //         'url'           => route('admin.topics.index'), // url/route
        //         'icon'          => 'fas fa-tags mr-1',
        //         'active'        => ['admin/topics/*'],
        //     ]);

        //     // Manage Tags
        //     $event->menu->addAfter('topics', [
        //         'key'           => 'tags',
        //         'text'          => 'tags_trans_key',
        //         'url'           => route('admin.tags.index'), // url/route
        //         'icon'          => 'far fa-tag mr-1',
        //         'active'        => ['admin/tags', 'admin/tags/*/edit'],
        //     ]);

        //     // Manage Types
        //     $event->menu->addAfter('tags', [
        //         'key'           => 'types',
        //         'text'          => 'types',
        //         'url'           => route('admin.types.index'), // url/route
        //         'icon'          => 'fas fa-photo-video mr-1',
        //         'active'        => ['admin/types/*'],
        //     ]);

        //     // Manage Levels
        //     $event->menu->addAfter('types', [
        //         'key'           => 'levels',
        //         'text'          => 'levels',
        //         'url'           => route('admin.levels.index'), // url/route
        //         'icon'          => 'fas fa-layer-group mr-1',
        //         'active'        => ['admin/levels/*'],
        //     ]);

        //     // Manage Levels
        //     $event->menu->addAfter('levels', [
        //         'key'           => 'modalities',
        //         'text'          => 'modalities',
        //         'url'           => route('admin.modalities.index'), // url/route
        //         'icon'          => 'fas fa-laptop-house mr-1',
        //         'active'        => ['admin/modalities/*'],
        //     ]);

        //     // Manage Levels
        //     $event->menu->addAfter('modalities', [
        //         'key'           => 'platforms',
        //         'text'          => 'platforms',
        //         'url'           => route('admin.platforms.index'), // url/route
        //         'icon'          => 'fas fa-server mr-1',
        //         'active'        => ['admin/platforms/*'],
        //     ]);

        //     // Manage Prices
        //     $event->menu->addAfter('platforms', [
        //         'key'           => 'prices',
        //         'text'          => 'prices',
        //         'url'           => route('admin.prices.index'), // url/route
        //         'icon'          => 'fas fa-dollar-sign mr-1',
        //         'active'        => ['admin/prices/*'],
        //     ]);

        //     // Manage Partners
        //     $event->menu->addAfter('prices', [
        //         'key'           => 'partners',
        //         'text'          => 'companies_and_agreements',
        //         'url'           => route('admin.partners.index'), // url/route
        //         'icon'          => 'far fa-handshake mr-1',
        //         'active'        => ['admin/partners/*'],
        //     ]);

        // });

        $courses = Course::where('user_id', auth()->user()->id)->get();

        return view('instructor.index', compact('courses'));

    }
}
