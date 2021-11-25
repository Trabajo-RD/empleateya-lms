<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Type;
use App\Models\Level;
use App\Models\Price;
use App\Models\Modality;
use App\Models\Observation;
use App\Models\Language;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    public function __construct()
    {
        // Add middleware to Resource Routes
        $this->middleware('can:list-course')->only('index');
        $this->middleware('can:create-course')->only('create', 'store', 'new');
        $this->middleware('can:update-course')->only('edit', 'update', 'goals');
        $this->middleware('can:delete-course')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');       
        
        $categories = Category::pluck('name', 'id');
        $topics = Topic::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        $modalities = Modality::pluck('name', 'id');
        $languages = Language::pluck('name', 'id');

        return view('instructor.courses.create', compact('categories', 'topics', 'types', 'levels', 'prices', 'modalities', 'languages' ));              
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        //return $request;

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'duration_in_minutes' => 'required',
            'summary' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            //'file' => 'image',
        ]);

        // $course = Course::create([
        //     'title' => $request->title,
        //     'slug' => $request->slug,
        //     'duration_in_minutes' => $request->duration_in_minutes,
        //     'summary' => $request->summary,
        //     'category_id' => $request->category_id,
        //     'type_id' => $request->type_id,
        //     'level_id' => $request->level_id,
        //     'price_id' => $request->price_id,
        // ]);

        $course = Course::create( $request->all() );

        if($request->file('file') ){
            $url = Storage::put('courses', $request->file('file'));

            $course->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('instructor.courses.edit', [$locale, $course]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Course $course)
    {
        // Determine if the given user own this course and can update course   
        // $this->authorize('dictated', $course);
        $response = Gate::inspect('update', $course);

        if($response->allowed()){
            $categories = Category::pluck('name', 'id');
            $topics = Topic::pluck('name', 'id');
            $types = Type::pluck('name', 'id');
            $levels = Level::pluck('name', 'id');
            $prices = Price::pluck('name', 'id');
            $modalities = Modality::pluck('name', 'id');    
            $languages = Language::pluck('name', 'id');    
    
            return view('instructor.courses.edit', compact('course', 'categories', 'topics', 'types', 'levels', 'prices', 'modalities', 'languages'));
        } else {
            echo $response->message();
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request     $request
     * @param  \App\Models\Course           $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, Course $course)
    {
        // Determine if a given user can update course
        // $this->authorize('dictated', $course);
        $response = Gate::inspect('update', $course);

        if($response->allowed()){
            $request->validate([
                'title' => 'required',
                'slug' => 'required|unique:courses,slug,' . $course->id,
                'duration_in_minutes' => 'required',
                'summary' => 'required',
                'category_id' => 'required',
                'type_id' => 'required',
                'level_id' => 'required',
                'price_id' => 'required',
                'file' => 'image',
            ]);
    
            // $course->update([
            //     'title' => $request->title,
            //     'slug' => $request->slug,
            //     'duration_in_minutes' => $request->duration_in_minutes,
            //     'summary' => $request->summary,
            //     'category_id' => $request->category_id,
            //     'type_id' => $request->type_id,
            //     'level_id' => $request->level_id,
            //     'price_id' => $request->price_id,
            // ]);
    
            $course->update($request->all());
    
            if( $request->file('file') ){
                $url = Storage::put('courses', $request->file('file') );
    
                if( $course->image ){
                    Storage::delete($course->image->url);
    
                    $course->image->update([
                        'url' => $url
                    ]);
                } else {
                    $course->image()->create([
                        'url' => $url
                    ]);
                }
            }
    
            return redirect()->route('instructor.courses.edit', [$locale, $course]);
        } else {
            echo $response->message();
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified instructor goals
     *
     * @param       App\Models\Course   $course
     * @return      view
     */
    public function goals( $locale, Course $course ){
        // Policy to check if an instructor is modifying a course created by another instructor
        // $this->authorize('dictated', $course);
        $response = Gate::inspect('update', $course);

        if($response->allowed()){
            return view('instructor.courses.goals', compact('course'));
        } else {
            echo $response->message();
        }       
    }

    /**
     * Change the course status when click on Request Revision button
     */
    public function status( $locale, Course $course ){
        $course->status = 2;
        $course->save();

        if($course->observation){
            $course->observation->delete();
        }

        return redirect()->route('instructor.courses.edit', [$locale, $course] );
    }

    /**
     * Return course observation view
     */
    public function observation( $locale, Course $course ){
        return view('instructor.courses.observation', compact('course') );
    }

    /**
     * Return the view course preview
     */
    public function preview( $locale, Course $course ){

        // $this->authorize('revision', $course );

        return view('instructor.courses.preview', compact('course'));

    }

    /**
     * Show create new course options
     */
    public function new( Request $request, $locale ){
        return view('instructor.courses.new');
    }
}
