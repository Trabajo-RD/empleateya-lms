<?php

namespace App\Http\Controllers\Instructor\Dashboard\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Section;
use App\Models\Language;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class InstructorSectionController extends Controller
{
    public function index(Course $course) {
        $sections = Course::find($course->id)->sections();
        return view('instructor.dashboard.courses.sections.index', [
            'course' => $course,
            'sections' => $sections->paginate(25)
        ]);
    }

    public function create(Course $course) {
        $course = Course::find($course->id);
        return view('instructor.dashboard.courses.sections.create', [
            'course' => $course
        ]);
    }

    public function store(Request $request) {

        $user = User::find( $request->user_id );
        $course = Course::find( $request->course_id );

        if (!$user) {
            return;
        }

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:sections'
        ]);

        $type = Type::where('name', 'Section')->first();

        try {

            Section::create([
                'uid' => Str::orderedUuid(),
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'summary' => $request->summary,
                'order' => $request->order,
                'url' => $request->url,
                'course_id' => $course->id,
                'type_id' => $type->id
            ]);

            return redirect()->route('instructor.dashboard.courses.sections.index', ['course' => $course])->with('success', 'Se ha añadido una nueva Sección');

        } catch (\Exception $e) {

            Log::debug($e->getMessage());

            return redirect()->route('instructor.dashboard.courses.sections.index', ['course' => $course])->with('error', 'Ha ocurrido un error al momento de guardar la información');

        }

    }

    /**
     * Return the edit section form
     *
     * @param Section $section
     * @return void
     */
    public function edit(Section $section) {
        return view('instructor.dashboard.courses.sections.edit', compact('section'));
    }

    /**
     * Update a course section
     *
     * @param Request $request
     * @param Section $section
     * @return void
     */
    public function update(Request $request, Section $section) {
        $user = User::find($request->user_id);

        if (!$user) {
            return;
        }

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:sections,slug,' . $section->id
        ]);

        $section->update( $request->all() );

        // $course = $section->course;
        // $sections = Course::find($course->id)->sections();

        return redirect()->route('instructor.dashboard.courses.sections.edit', $section)->with('success', __('The section has been successfully updated'));

    }

    public function destroy(Section $section) {

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return;
        }

        $course = $section->course;

        $section->delete();

        return redirect()->route('instructor.dashboard.courses.index', $course)->with('delete', 'success');

    }
}
