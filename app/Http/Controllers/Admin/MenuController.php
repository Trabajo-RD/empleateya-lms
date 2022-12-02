<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\Menu;
use App\Models\Module;
use App\Models\LearningPath;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Log;
use App\Models\Topic;
use App\Models\User;
use App\Models\Workshop;

class MenuController extends Controller
{
    public function index(Request $request) {

        $selectedMenu = '';
        $menuItems = '';

        if (isset($request->id)) {
            $id = $request->id;

            if ($id == 'new') {
                $selectedMenu = '';
            } else {
                $selectedMenu = Menu::where('id', $id)->first();
                if ( $selectedMenu->content == '') {
                    $menuItems = MenuItem::where('menu_id', $selectedMenu->id)->get();
                }
            }
        } else {

        }


        return view('admin.dashboard.menus.index', [
            'menus' => Menu::all(),
            'courses' => Course::all(),
            'workshops' => Workshop::all(),
            'modules' => Module::all(),
            'paths' => LearningPath::all(),
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'topics' => Topic::all(),
            'selectedMenu' => $selectedMenu,
            'menuItems' => $menuItems
        ]);
    }

    public function store(Request $request) {

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return;
        }

        if (!$user->hasRole('administrator')) {
            return redirect()->route('admin.dashboard.menus.index')->with('info', __('Only admins can create menus'));
        }

        $data = $request->all();

        try {

            Menu::create($data);

            $menu = Menu::orderby('id', 'DESC')->first();

            if ($menu) {
                return redirect("admin/dashboard/menus/index?id=$menu->id")->with('success', __('Menu saved successfully'));
            }

        } catch (\Exception $e) {

            Log::debug($e->getMessage());

            return redirect()->route('admin.dashboard.menus.index')->with('error', __('Error creating the menu, please contact an administrator'));

        }
    }

    public function addCategoryToMenu(Request $request) {
        $data = $request->all();

        // var_dump($data);

        $menuid = $request->menuid;
        $ids = $request->ids;

        $menu = Menu::findOrFail($menuid);

        if ($menu->content == '') {

            foreach($ids as $id) {
                $data['title'] = Category::where('id', $id)->value('name');
                $data['slug'] = Category::where('id', $id)->value('slug');
                $data['type'] = 'category';
                $data['menu_id'] = $menuid;

                MenuItem::create($data);
            }

        } else {

        }
    }
}
