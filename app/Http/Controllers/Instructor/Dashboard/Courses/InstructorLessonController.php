<?php

namespace App\Http\Controllers\Instructor\Dashboard\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\User;
use App\Models\Type;
use App\Models\Platform;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class InstructorLessonController extends Controller
{
    public function index(Section $section) {
        $lessons = Section::find($section->id)->lessons();
        
        return view('instructor.dashboard.courses.sections.lessons.index', [
            'section' => $section,
            'lessons' => $lessons->paginate(25)
        ]);
    }

    public function create(Section $section) {

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return;
        }

        $platforms = Platform::pluck('name', 'id');

        return view('instructor.dashboard.courses.sections.lessons.create', [
            'section' => $section, 
            'platforms' => $platforms
        ]);
    }

    /**
     * Store a new lesson in the database
     *
     * @param Request $request
     * @param Section $section
     * @return void
     */
    public function store(Request $request) {

        // Validate the user
        $user = User::findOrFail($request->user_id); // 404
        $section = Section::find($request->section_id);

        // Validate the request
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:lessons'
        ]);

        // Retrieve the model type
        $type = Type::where('name', 'Lesson')->first();

        try {

            $lesson = new Lesson;

            $lesson->uid = Str::orderedUuid();
            $lesson->title = $request->title;
            $lesson->slug = Str::slug($request->title);
            $lesson->order = $request->order;
            $lesson->url = $request->url;
            $lesson->iframe = $request->iframe;
            $lesson->duration_in_minutes = $request->duration_in_minutes;
            $lesson->section_id = $section->id;
            $lesson->platform_id = $request->platform_id;
            $lesson->type_id = $type->id;
            $lesson->language_id = $request->language_id;

            // Lesson::create([
            //     'uid' => Str::orderedUuid(),
            //     'name' => $request->name,
            //     'slug' => Str::slug($request->name),
            //     'order' => $request->order,
            //     'url' => $request->url,
            //     'iframe' => $request->iframe,
            //     'duration_in_minutes' => $request->duration_in_minutes,
            //     'section_id' => $section->id,
            //     'platform_id' => $request->platform_id,
            //     'type_id' => $type->id,
            //     'language_id' => $request->language_id
            // ]);

            $lesson->save();

            return redirect()->route('instructor.dashboard.courses.sections.lessons.index', $section)->with('success', 'Se ha añadido una nueva Lección');

        } catch (\Exception $e) {

            Log::debug($e->getMessage());

            return redirect()->route('instructor.dashboard.courses.sections.lessons.index', $section)->with('error', 'Ha ocurrido un error al momento de guardar la información');

        }

    }

    /**
     * Return the edit lesson form
     *
     * @param Lesson $lesson
     * @return void
     */
    public function edit(Lesson $lesson) {

        $platforms = Platform::pluck('name', 'id');

        return view('instructor.dashboard.courses.sections.lessons.edit', compact('lesson', 'platforms'));
    }

    /**
     * Update a lesson
     *
     * @param Request $request
     * @param Lesson $lesson
     * @return void
     */
    public function update(Request $request, Lesson $lesson) {
        $user = User::find($request->user_id);

        if (!$user) {
            return;
        }

        // Validate the request
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:lessons,slug,' . $lesson->id
        ]);

        try {
            $lesson->update( $request->all() );
            
            // $section = $lesson->section;

            return redirect()->route('instructor.dashboard.courses.sections.lessons.edit', $lesson)->with('success', __('The lesson has been successfully updated'));

        } catch (\Exception $e) {

            Log::debug($e->getMessage());

            return redirect()->route('instructor.dashboard.courses.sections.lessons.edit', $lesson)->with('error', __('An error occurred while saving the data'));

        }
    }

    public function destroy(Lesson $lesson) {

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return;
        }

        $section = $lesson->section;

        $lesson->delete();

        return redirect()->route('instructor.dashboard.courses.sections.index', $section)->with('delete', 'success');

    }
}
