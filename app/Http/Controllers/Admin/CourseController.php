<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Http;

// To send email
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;

class CourseController extends Controller
{
    public function index(){

        // // TODO: Connect to Microsoft Learning API
        //  $response = Http::get('https://docs.microsoft.com/api/contentbrowser/search?environment=prod&locale=es-es&facet=roles&facet=levels&facet=products&facet=resource_type&%24filter=((resource_type%20eq%20%27learning%20path%27))&%24orderBy=popularity%20desc%2Clast_modified%20desc%2Ctitle&%24top=30&showHidden=false');

        // Spicified the data format to use
        // $microsoft_courses = $response->json();

        $courses = Course::where('status', 2)->paginate();


       return view('admin.courses.index', compact('courses'));

        // TODO: uncomment to return Microsoft Learning API data
        // return view('admin.courses.index', compact('courses', 'microsoft_courses'));
    }

    /**
     * Return the course in revision status
     */
    public function show( $locale, Course $course ){

        $this->authorize('revision', $course );

        return view('admin.courses.show', compact('course'));

    }

    /**
     *
     */
    public function approved( $locale, Course $course ){

        $this->authorize('revision', $course );

        // Type Itinerario de aprendizaje
        // if( $course->type_id == 1 ){
        //     if( !$course->sections || !$course->goals || !$course->requirements ){
        //         return redirect()->route('admin.courses.approved', $course )->with('approved_error', 'No se puede publicar un itinerario de aprendizaje que no esté debidamente completado');
        //     }
        // }

        // // Type Modulo
        // if( $course->type_id == 2 ){
        //     if( !$course->lessons || !$course->goals || !$course->requirements ){
        //         return redirect()->route('admin.courses.approved', $course )->with('approved_error', 'No se puede publicar un módulo que no esté debidamente completado');
        //     }
        // }

        if( !$course->sections || !$course->goals || !$course->requirements || !$course->image ){
            return back()->with('info', __('You cannot publish a course that is not properly completed'));
        }

        $course->status = 3;

        $course->save();

        // Send approved course confirmation email to user
        $mail = new ApprovedCourse($course);

        // Send confirmation email inmediately
        Mail::to($course->editor->email)->send($mail);

        // Put the email in queue in jobs database table
        // Mail::to($course->editor->email)->queue($mail);


        return redirect()->route('admin.courses.index')->with('success', __('The course has been successfully approved'));

    }

    /**
     * Return observation course form
     */
    public function observation( $locale, Course $course ){
        return view('admin.courses.observation', compact('course'));
    }

    /**
     * Process the course feedback form
     */
    public function reject( Request $request, $locale, Course $course ){

        $request->validate([
            'body' => 'required'
        ]);

        // return $request->all();
        $course->observation()->create( $request->all() );

        $course->status = 1;
        $course->save();

        // Send reject email with observation to course dictated user
        $mail = new RejectCourse($course);

        // Send reject email inmediately
        Mail::to( $course->editor->email )->send( $mail );

        // Put the email in queue in jobs database table
        // Mail::to( $course->editor->email )->queue( $mail );

        return redirect()->route('admin.courses.index')->with('success', 'The course has been rejected  El curso ha sido rechazado');
    }
}
