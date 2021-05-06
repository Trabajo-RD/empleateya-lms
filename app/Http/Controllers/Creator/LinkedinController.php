<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Course;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Type;
use App\Models\Level;
use App\Models\Price;
use App\Models\Modality;
use App\Models\Observation;
use Illuminate\Support\Facades\Storage;

class LinkedinController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        $categories = Category::pluck('name', 'id');
        $topics = Topic::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');
        $modalities = Modality::pluck('name', 'id');

        return view('creator.courses.linkedin.create', compact('categories', 'topics', 'types', 'levels', 'prices', 'modalities' ));
    }

    public function requestCourseData( Request $request )
    {        

        if( $request->ajax() ){
            
            $url = $request->input('url');

            $data = Http::get( $url );

            // Spicified the data format to use
            $microsoft_course = $data->json();

            return $microsoft_course;   
            
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
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
}
