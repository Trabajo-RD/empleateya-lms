<?php

namespace App\Http\Controllers\Instructor\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Unit;
use App\Models\Program;
use App\Models\Topic;
use App\Models\Level;
use App\Models\Modality;
use App\Models\Language;
use App\Models\Price;
use App\Models\Type;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class InstructorModuleController extends Controller
{
    public function index() {
        $modules = Module::all();
        return view('instructor.dashboard.modules.index', compact('modules'));
    }

    public function create() {

        $units = Unit::all();

        $programs = Program::pluck('name', 'id');
        $topics = Topic::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $modalities = Modality::pluck('name', 'id');
        $languages = Language::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.dashboard.modules.create', compact('units', 'programs', 'topics', 'levels', 'modalities', 'languages', 'prices'));
    }

    public function store(Request $request) {

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return;
        }

        $request->validate([
            'title' => 'required',
            'units' => 'required'
        ]);

        $program = (!is_null($request->program_id)) ? Program::find($request->program_id) : '';
        $defaultProgram = Program::where('slug', '=', 'rd-trabaja')->first();
        $type = Type::where('name', 'Module')->first();

        try {

            $module = Module::create([
                'uid' => ($program != '') ? strtolower($program->name) : 'capacitate' . '.' . Str::slug($request->title),
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'summary' => $request->summary,
                'url' => $request->url,
                'duration_in_minutes' => $request->duration_in_minutes,
                'status' => 1,
                'slug' => Str::slug($request->title),
                'user_id' => $user->id,
                'level_id' => $request->level_id,
                'topic_id' => $request->topic_id,
                'price_id' => $request->price_id,
                'type_id' => $type->id,
                'modality_id' => $request->modality_id,
                'language_id' => $request->language_id,
                'program_id' => ($program != '') ? $program->id : $defaultProgram->id
            ]);

            $module->units()->attach($request->units);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return redirect()->route('instructor.dashboard.modules.index')->with('success', 'El módulo ha sido creado correctamente.');

    }

    public function edit(Module $module) {

    }

    public function destroy(Module $module) {

    }
}
