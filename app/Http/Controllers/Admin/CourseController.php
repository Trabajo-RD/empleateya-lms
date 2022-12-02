<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CoursesExport;
use App\Exports\PublishedCoursesExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Http;

// To send email
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class CourseController extends Controller
{

    public function index(){

        // Courses index are managed by a livewire controller
        // $courses = Course::orderBy('status', 'DESC')
        //     ->paginate(20);


       return view('admin.courses.index');

        // TODO: uncomment to return Microsoft Learning API data
        // return view('admin.courses.index', compact('courses', 'microsoft_courses'));
    }

    /**
     * Return view to display published courses
     */
    public function published(){
        return view('admin.courses.published');
    }

    public function revision(){

        // // TODO: Connect to Microsoft Learning API
        //  $response = Http::get('https://docs.microsoft.com/api/contentbrowser/search?environment=prod&locale=es-es&facet=roles&facet=levels&facet=products&facet=resource_type&%24filter=((resource_type%20eq%20%27learning%20path%27))&%24orderBy=popularity%20desc%2Clast_modified%20desc%2Ctitle&%24top=30&showHidden=false');

        // Spicified the data format to use
        // $microsoft_courses = $response->json();

        $courses = Course::where('status', 2)->paginate();


      //  return view('admin.courses.revision');

        // TODO: uncomment to return Microsoft Learning API data
        return view('admin.courses.revision', compact('courses'));
    }

    /**
     * Return the course in revision status
     */
    public function show(Course $course ){

        // return $course;

        $this->authorize('revision', $course );

        // TODO: Corregir error no encuentra el parametro 'course'
        return view('admin.courses.show', compact('course'));

    }

    /**
     *
     */
    public function approved( Course $course ){


        $this->authorize('revision', $course );

        /**
         * (OPCIONAL)
         *
         * Si desea que al momento de un Administrador aprobar un curso el sistema valide
         * si el curso tiene secciones añadidas, metas, requerimientos y una imagen distinta a la que trae por defecto
         * para poder ser aprobado.
         */
        // if( !$course->sections || !$course->goals || !$course->requirements || !$course->image ){
        //     return back()->with('info', __('You cannot publish a course that is not properly completed'));
        // }

        // $locale = app()->getLocale();

        $course->status = 3;

        $course->save();

        // Send approved course confirmation email to user
        $mail = new ApprovedCourse($course);

        // Send confirmation email inmediately
        Mail::to($course->editor->email)->send($mail);

        // Put the email in queue in jobs database table
        // Mail::to($course->editor->email)->queue($mail);



        return redirect()->route('admin.courses.revision')->with('success', __('The course has been successfully approved'));

    }

    /**
     * Return observation course form
     */
    public function observation( Course $course ){
        return view('admin.courses.observation', compact('course'));
    }

    /**
     * Process the course feedback form
     */
    public function reject( Request $request, Course $course ){

        $request->validate([
            'body' => 'required'
        ]);

        // return $request->all();
        $course->observation()->create( $request->all() );

        $course->status = 1;
        $course->save();

        // Send reject email with observation to course dictated user
        $mail = new RejectCourse($course, $course->observation->body);

        // Send reject email inmediately
        Mail::to( $course->editor->email )->send( $mail );

        // Put the email in queue in jobs database table
        // Mail::to( $course->editor->email )->queue( $mail );

        return redirect()->route('admin.courses.revision')->with('success', 'The course has been rejected  El curso ha sido rechazado');
    }

    public function changeStatus(Request $request){
        return $request;
    }

    /**
     * Export to excel the ModelExport class
     */

    public function exportAllCourses( $format ){

        // $contents = Excel::raw(new CoursesExport, \Maatwebsite\Excel\Excel::XLSX);


        $date = Carbon::now()->format('Ymd');
        $unix_timestamp = now()->timestamp;

        if ($format == 'xlsx' ){
            return Excel::download(new CoursesExport, $date . '_' . $unix_timestamp . '_capacitate.courses.all.xlsx');
        }

        if ($format == 'csv' ){
            return Excel::download(new CoursesExport, $date . '_' . $unix_timestamp . '_capacitate.courses.all.csv');
        }

        if ($format == 'ods' ){
            return Excel::download(new CoursesExport, $date . '_' . $unix_timestamp . '_capacitate.courses.all.ods');
        }

    }

    public function exportPublishedCourses( $format ){

        $date = Carbon::now()->format('Ymd');
        $unix_timestamp = now()->timestamp;

        if ($format == 'xlsx' ){
            return Excel::download(new PublishedCoursesExport, $date . '_' . $unix_timestamp .  '_capacitate.published.courses.xlsx');
        }

        if ($format == 'csv' ){
            return Excel::download(new PublishedCoursesExport, $date . '_' . $unix_timestamp .  '_capacitate.published.courses.csv');
        }

        if ($format == 'ods' ){
            return Excel::download(new PublishedCoursesExport, $date . '_' . $unix_timestamp .  '_capacitate.published.courses.ods');
        }

    }

}
