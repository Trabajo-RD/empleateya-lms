<?php

namespace App\Http\Controllers\Instructor\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LearningPath;
use App\Models\Module;
use App\Models\Level;
use App\Models\Program;
use App\Models\Modality;
use App\Models\Price;
use App\Models\Language;
use App\Models\Topic;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class InstructorPathController extends Controller
{
    public function index() {

        $paths = User::find(auth()->user()->id)->learning_paths_dictated();

        return view('instructor.dashboard.paths.index', [
            'paths' => $paths->paginate(25)
        ]);
    }

    public function create() {

        $modules = Module::all();
        $programs = Program::pluck('name', 'id');
        $topics = Topic::pluck('name', 'id');

        $levels = Level::pluck('name', 'id');
        $modalities = Modality::pluck('name', 'id');
        $languages = Language::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('instructor.dashboard.paths.create', compact('modules', 'levels', 'programs', 'modalities', 'prices', 'languages', 'topics'));

    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required',
            'modules' => 'required'
        ]);

        $program = (!is_null($request->program_id)) ? Program::find($request->program_id) : '';
        $user = User::find(auth()->user()->id);
        $type = Type::where('name', 'Learning Path')->first();

        try {

            $path = LearningPath::create([
                'uid' => ($program != '') ? strtolower($program->name) : 'capacitate' . '.' .  Str::slug($request->title),
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'slug' => Str::slug($request->title),
                'summary' => $request->summary,
                'url' => $request->url,
                'duration_in_minutes' => $request->duration_in_minutes,
                'status' => $request->status,
                'user_id' => $user->id,
                'level_id' => $request->level_id,
                'type_id' => $type->id,
                'modality_id' => $request->modality_id,
                'program_id' => $request->program_id,
                'price_id' => $request->price_id,
                'language_id' => $request->language_id,
                'topic_id' => $request->topic_id,
            ]);

            // attach all learning path modules
            $path->modules()->attach($request->modules);

        } catch (\Exception $e) {
            Log::debug($e->getMessage());
        }

        return redirect()->route('instructor.dashboard.paths.index')->with('success', 'La Ruta de Aprendizaje ha sido sido creada satisfactoriamente');
    }

    public function edit(LearningPath $path) {

    }

    public function destroy(LearningPath $path) {

    }

    public function getModules(LearningPath $path) {
        $modules = LearningPath::find($path->id)->modules();

        return view('instructor.dashboard.paths.modules.index', [
            'path' => $path,
            'modules' => $modules->paginate(25)
        ]);
    }
}
