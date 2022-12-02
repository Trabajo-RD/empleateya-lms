<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Review;
//use Illuminate\Bus\Dispatcher;

use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class HomeController extends Controller
{
    public function index(){

        // // Create dynamic url/route to adminLTE menu
        // Event::listen(BuildingMenu::class, function (BuildingMenu $event) {

        //     // Dashboard Home
        //     $event->menu->add([
        //         'key'   => 'dashboard',
        //         'text'  => 'Dashboard',
        //         'url' => route('admin.cpanel'),
        //         'icon'  => 'fas fa-fw fa-tachometer-alt',
        //         'can'   => 'view-dashboard',
        //     ]);

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
        //                 'url'   => route('admin.courses.index'),
        //                 'icon'  => 'fas fa-laptop mr-1',
        //             ],
        //             [
        //                 'key'   => 'admin_published_courses',
        //                 'text'  => 'Publicados',
        //                 'url'   => route('admin.courses.published'),
        //                 'icon'  => 'fas fa-check-circle mr-1',
        //             ],
        //             [
        //                 'key'   => 'admin_course_revision',
        //                 'text'  => 'Cursos en revisión',
        //                 'url'   => route('admin.courses.revision'),
        //                 'icon'  => 'fas fa-search mr-1',
        //             ],
        //         ],
        //     ]);

        //     // Manage roles
        //     $event->menu->addAfter('admin_courses', [
        //         'key'         => 'roles',
        //         'text'        => 'roles',
        //         'url'         => route('admin.roles.index'),
        //         'icon'        => 'fas fa-fw fa-users-cog',
        //         'active'      => ['admin/roles/*'],
        //         'can'         => 'update-role',
        //     ]);

        //     // Manage users
        //     $event->menu->addAfter('roles', [
        //         'key'         => 'users',
        //         'text'        => 'users',
        //         'url'           => route('admin.users.index'), // url/route
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
        //                 'url'   => route('admin.contacts'),
        //                 'icon'  => 'fas fa-inbox mr-1',
        //             ],
        //             [
        //                 'key'   => 'admin_contacts_deleted',
        //                 'text'  => 'Mensajes eliminados',
        //                 'url'   => route('admin.contacts.deleted'),
        //                 'icon'  => 'far fa-trash-alt mr-1',
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

        $users = User::all();
        $reviews = Review::all();
        $latest_users = User::orderBy('created_at', 'desc')->take(8)->get();
        $published_courses = Course::where('status', 3)->get();
        $new_courses = Course::orderBy('created_at', 'desc')->take(5)->get();
        $revision_courses = Course::where('status', 2)->take(5)->get();
        $males = User::where('gender', 'M')->get();
        $females = User::where('gender', 'F')->get();

        //return $request;
        return view('admin.index', compact('users', 'reviews', 'males', 'females', 'published_courses', 'new_courses', 'latest_users', 'revision_courses'));
    }
}
