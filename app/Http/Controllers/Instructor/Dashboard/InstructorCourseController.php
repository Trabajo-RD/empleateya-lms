<?php

namespace App\Http\Controllers\Instructor\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Program;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Language;
use App\Models\Modality;
use App\Models\Price;
use App\Models\Level;
use App\Models\Type;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Section;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Storage;

class InstructorCourseController extends Controller
{
    public function index() {
        $courses = User::find(auth()->user()->id)->courses_dictated();
        // $courses_count = count($courses);
        return view('instructor.dashboard.courses.index', [
            'courses' => $courses->paginate(25)
        ]);
    }

    public function show(Course $course) {

        $participants = $course->users();

        return view('instructor.dashboard.courses.show', [
            'course' => $course,
            'participants' => $participants->paginate(25)
        ]);
    }

    /**
     * Return the form to create a new course
     *
     * @return void
     */
    public function create() {

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return;
        }

        $sections = Section::all();

        if (!$user->hasRole('instructor')) {
            return redirect()->route('instructor.dashboard.courses.index')->with('info', __('You must have the instructor role to be able to add a course. To assign a role, please contact an administrator'));
        }

        $categories = Category::pluck('name', 'id');
        $programs = Program::pluck('name', 'id');
        $languages = Language::pluck('name', 'id');
        $modalities = Modality::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');

        // $max_img_size = 10;

        return view('instructor.dashboard.courses.create', compact('sections', 'programs', 'languages', 'modalities', 'prices', 'levels', 'categories'));
    }

    /**
     * Store the course data
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) {

        // var_dump($request);

        $user = User::find($request->user_id);

        if (!$user) {
            return;
        }

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'summary' => 'required',
            'duration_in_minutes' => 'required',
            'level_id' => 'required',
            'file' => 'image'
        ]);

        $program = (!is_null($request->program_id)) ? Program::find($request->program_id) : '';
        $defaultProgram = Program::where('slug', '=', 'rd-trabaja')->first();
        $type = Type::where('name', 'Course')->first();
        $freeCourse = Price::where('name', '=', 'Gratis')->orWhere('name', '=', 'Free')->orWhere('value', '<=', 0.00)->first();
        $priceId = (is_null($request->price_id)) ? $freeCourse->id : $request->price_id;

        try {

            $course = Course::create([
                'uid'           => Str::orderedUuid(),
                'title'         => $request->title,
                'subtitle'      => $request->subtitle,
                'summary'       => $request->summary,
                'url'           => $request->url,
                'duration_in_minutes' => $request->duration_in_minutes,
                'status'        => 3,
                'slug'          => $request->slug,
                'user_id'       => $user->id,
                'level_id'      => $request->level_id,
                'price_id'      => $priceId,
                'type_id'       => $type->id,
                'modality_id'   => $request->modality_id,
                'topic_id'      => $request->topic_id,
                'audience'      => $request->audience,
                'start_date'    => $request->start_data,
                'end_date'      => $request->end_date,
                'language_id'   => $request->language_id,
                'program_id'    => ($program != '') ? $program->id : $defaultProgram->id
            ]);

            // store the course image
            if($request->file('file') ){

                // Put the course image in the storage folder
                $image_path = Storage::put('courses', $request->file('file'));

                // Store the course image path
                $course->image()->create([
                    'url' => $image_path
                ]);
                
            }

            return redirect()->route('instructor.dashboard.courses.index')->with('success', 'El curso se ha creado satisfactoriamente.');

        } catch (\Exception $e) {

            Log::debug($e->getMessage());

            return redirect()->route('instructor.dashboard.courses.index')->with('error', 'Ha ocurrido un error al momento de guardar la información.');

        }

        
    }

    /**
     * Return the form to edit a course
     *
     * @param Course $course
     * @return void
     */
    public function edit(Course $course) {

         // Determine if the given user own this course and can update course
        // $this->authorize('dictated', $course);
        $response = Gate::inspect('update', $course);

        if($response->allowed()){
            $programs = Program::pluck('name', 'id');
            $categories = Category::pluck('name', 'id');
            $topics = Topic::pluck('name', 'id');
            $types = Type::pluck('name', 'id');
            $levels = Level::pluck('name', 'id');
            $prices = Price::pluck('name', 'id');
            $modalities = Modality::pluck('name', 'id');
            $languages = Language::pluck('name', 'id');

            return view('instructor.dashboard.courses.edit', compact('course', 'categories', 'topics', 'programs', 'types', 'levels', 'prices', 'modalities', 'languages'));
        } else {
            echo $response->message();
        }

    }

    /**
     * Update the course data
     *
     * @param Request $request
     * @param Course $course
     * @return void
     */
    public function update(Request $request, Course $course) {

        $user = User::find($request->user_id);

        if (!$user) {
            return;
        }

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'summary' => 'required',
            'duration_in_minutes' => 'required',
            'level_id' => 'required',
            'file' => 'image'
        ]);

        $course->update( $request->all() );

        // Update image
        if ($request->file('file')) {

            // Put the new image in the storage folder
            $new_image_path = Storage::put('courses', $request->file('file'));
            
            if ($course->image) {

                // Delete previous image path
                Storage::delete($course->image->url);

                // Replace course image
                $course->image->update([
                    'url' => $new_image_path
                ]);

            } else {

                // Usign the same image path
                $course->image->create([
                    'url' => $new_image_path
                ]);
            }

        }

        return redirect()->route('instructor.dashboard.courses.edit', $course)->with('success', __('The course has been successfully updated'));

    }

    public function destroy(Course $course) {

        $user = User::find(auth()->user()->id);

        if (!$user) {
            return;
        }

        $course->users()->delete();

        $course->delete();

        return redirect()->back()->with('delete', 'success');

    }

    public function settings(Course $course) {

    }
}
