<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Type;
use App\Models\Level;
use App\Models\Price;
use App\Models\Modality;
use App\Models\Observation;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{


    public function __construct()
    {
        // Add middleware to Resource Routes
        $this->middleware('can:LMS Leer cursos')->only('index');
        $this->middleware('can:LMS Crear cursos')->only('create', 'store');
        $this->middleware('can:LMS Actualizar cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:LMS Eliminar cursos')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('creator.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $topics = Topic::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        $modalities = Modality::pluck('name', 'id');

        return view('creator.courses.create', compact('categories', 'topics', 'types', 'levels', 'prices', 'modalities' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
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

        return redirect()->route('creator.courses.edit', [$locale, $course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('creator.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Course $course)
    {
        // Policy to check if an instructor is modifying a course created by another instructor
        $this->authorize('dictated', $course);

        $categories = Category::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        $modalities = Modality::pluck('name', 'id');

        return view('creator.courses.edit', compact('course', 'categories', 'types', 'levels', 'prices', 'modalities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, Course $course)
    {

        // Policy to check if an instructor is modifying a course created by another instructor
        $this->authorize('dictated', $course);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'duration_in_minutes' => 'required',
            'summary' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            //'file' => 'image',
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

            $url = Storage::put('courses', $request->file('file'));

            //return $url;

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

        return redirect()->route('creator.courses.edit', [$locale, $course]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
     public function goals($locale, Course $course ){

        // Policy to check if an instructor is modifying a course created by another instructor
        $this->authorize('dictated', $course);

        return view('creator.courses.goals', compact('course'));

    }

    /**
     * Change the course status when click on Request Revision button
     */
    public function status($locale, Course $course ){
        $course->status = 2;
        $course->save();

        // Delete old observation when course status change to revision
        if($course->observation){
            $course->observation->delete();
        }

        return redirect()->route( 'creator.courses.edit', [$locale, $course] );
    }

    /**
     * Return course observation view
     */
    public function observation( $locale, Course $course ){

        return view('creator.courses.observation', compact( 'course' ) );

    }


}
