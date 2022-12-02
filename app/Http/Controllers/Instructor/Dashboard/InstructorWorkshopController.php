<?php

namespace App\Http\Controllers\Instructor\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Program;
use App\Models\Price;
use App\Models\Modality;
use App\Models\Language;
use App\Models\Topic;
use App\Models\User;
use App\Models\Type;
use App\Models\Activity;
use Illuminate\Support\Str;

class InstructorWorkshopController extends Controller
{
    public function index() {

        $workshops = User::find(auth()->user()->id)->workshops_dictated();

        return view('instructor.dashboard.workshops.index', [
            'workshops' => $workshops->paginate(25)
        ]);
    }

    public function create() {

        $activities = Activity::all();

        $programs = Program::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        $modalities = Modality::pluck('name', 'id');
        $languages = Language::pluck('name', 'id');
        $topics = Topic::pluck('name', 'id');

        return view('instructor.dashboard.workshops.create', compact('activities', 'programs', 'prices', 'modalities', 'languages', 'topics'));

    }

    public function store(Request $request) {

        $user = User::find(auth()->user()->id);

        $request->validate([
            'title' => 'required',
            'summary' => 'required'
        ]);

        $program = (!is_null($request->program_id)) ? Program::find($request->program_id) : '';
        $type = Type::where('name', 'Workshop')->first();

        $workshop = Workshop::create([
            'uid' => strtolower($program->name) . '.' . Str::slug($request->title),
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'summary' => $request->summary,
            'url' => $request->url,
            'duration_in_minutes' => $request->duration_in_minutes,
            'status' => 1,
            'slug' => Str::slug($request->title),
            'required_min_age' => $request->required_min_age,
            'required_max_age' => $request->required_max_age,
            'audience' => $request->audience,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'include_certificate' => $request->include_certificate,
            'user_id' => $user->id,
            'program_id' => $request->program_id,
            'price_id' => $request->price_id,
            'modality_id' => $request->modality_id,
            'type_id' => $type->id,
            'language_id' => $request->language_id,
            'topic_id' => $request->topic_id
        ]);

        $workshop->activities()->attach($request->activities);

        return redirect()->route('instructor.dashboard.workshops.index')->with('success', 'El taller se ha creado correctamente');

    }

    public function edit(Workshop $course) {

    }

    public function destroy(Workshop $course) {

    }
}
