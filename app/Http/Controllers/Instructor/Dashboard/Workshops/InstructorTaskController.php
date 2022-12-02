<?php

namespace App\Http\Controllers\Instructor\Dashboard\Workshops;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Platform;
use App\Models\Language;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Type;

class InstructorTaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('instructor.dashboard.workshops.activities.tasks.index', compact('tasks'));
    }

    public function create() {
        $platforms = Platform::pluck('name', 'id');
        $languages = Language::pluck('name', 'id');

        $resources = [
            [
                'id' => 1,
                'title' => 'Text'
            ],
            [
                'id' => 2,
                'title' => 'Video'
            ],
            [
                'id' => 3,
                'title' => 'Audio'
            ],
            [
                'id' => 4,
                'title' => 'Image'
            ]
        ];

        return view('instructor.dashboard.workshops.activities.tasks.create', compact('platforms', 'languages', 'resources'));
    }

    public function store(Request $request) {

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return;
        }

        $request->validate([
            'name' => 'required',
            'activity_id' => 'required'
        ]);

        $type = Type::where('name', 'Task')->first();

        try {

            Task::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'order' => $request->order,
                'url' => $request->url,
                'iframe' => $request->iframe,
                'duration_in_minutes' => $request->duration_in_minutes,
                'activity_id' => $request->activity_id,
                'platform_id' => $request->platform_id,
                'type_id' => $type->id,
                'language_id' => $request->language_id
            ]);

        } catch (\Exception $e) {

            Log::debug($e->getMessage());

        }

        return redirect()->back()->with('success', 'Tarea registrada correctamente');
    }
}
