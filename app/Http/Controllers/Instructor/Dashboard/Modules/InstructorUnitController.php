<?php

namespace App\Http\Controllers\Instructor\Dashboard\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Type;
use App\Models\Language;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class InstructorUnitController extends Controller
{
    public function index() {

        $units = Unit::all();
        return view('instructor.dashboard.modules.units.index', compact('units'));
    }

    public function create() {
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

        return view('instructor.dashboard.modules.units.create', compact('languages', 'resources'));
    }

    public function store(Request $request) {

        // var_dump($request);

        $request->validate([
            'title' => 'required',
            'uid' => 'unique'
        ]);

        $user = User::find(auth()->user()->id);
        $type = Type::where('name', 'Unit' )->first();

        try {
            Unit::create([
                'uid' => 'unit' . $user->id . Str::slug($request->title),
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'summary' => $request->summary,
                'url' => $request->url,
                'iframe' => $request->iframe,
                'duration_in_minutes' => $request->duration_in_minutes,
                'type_id' => $type->id,
                'language_id' => $request->language_id
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::debug($e->getMessage());
        }

        return redirect()->route('instructor.dashboard.modules.units.index')->with('success', 'La unidad se ha añadido correctamente.');

    }

    public function edit(Unit $unit) {

    }

    public function destroy(Unit $unit) {

    }
}
