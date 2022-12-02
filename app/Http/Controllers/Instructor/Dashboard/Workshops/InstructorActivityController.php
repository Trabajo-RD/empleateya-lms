<?php

namespace App\Http\Controllers\Instructor\Dashboard\Workshops;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Language;
use App\Models\Activity;
use App\Models\Type;
use App\Models\Task;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\User;

class InstructorActivityController extends Controller
{
    public function create() {

        $tasks = Task::all();

        $languages = Language::pluck('name', 'id');

        return view('instructor.dashboard.workshops.activities.create', compact('tasks', 'languages'));
    }

    public function store(Request $request) {

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return;
        }

        $request->validate([
            'name' => 'required'
        ]);

        $type = Type::where('name', 'Activity')->first();

        try {

            $activity = Activity::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'summary' => $request->summary,
                'duration_in_minutes' => $request->duration_in_minutes,
                'url' => $request->url,
                'type_id' => $type->id,
                'language_id' => $request->language_id,
            ]);

        } catch (\Exception $e) {

            Log::debug($e->getMessage());

        }

        return redirect()->back()->with('success', 'Actividad creada correctamente');

    }
}
