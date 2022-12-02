<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{

    /**
     * Controller to manage the courses home page
     */
    public function index()
    {
        return view('courses.index');
    }

    /**
     * Controller to manage the courses single page
     */
    public function show(Course $course) {
        // show only published courses
        $this->authorize('published', $course);

        // Increment view count
        Course::find($course->id)->increment('views');

        // return $course;
        // Show only published courses to autenticated users
        // $this->authorize('published', $course );

        /**
         * Retur related courses
         */
        $related_courses =
            Course::where('topic_id', $course->topic_id)
            ->where('id', '!=', $course->id)
            ->where('status', 3)
            ->latest('id')
            ->take(5)
            ->get();

        $roles = Role::all();

        //dd($start_date);

        return view('courses.show', compact( 'course', 'related_courses', 'roles'));
    }

    // public function courseStatus(Course $course)
    // {
    //     return view('courses.status', compact('course'));
    // }

    /**
     * Return to the view where the user performs the registration process
     *
     * @param \App\Models\Course    $course
     */
    public function enrollment(Course $course)
    {
        return view('courses.enrollment', compact('course'));
    }

    /**
     * Controller to enrolled users
     */
    public function enrolled(Course $course)
    {
        // get auth user data
        $user = User::find(auth()->user()->id);

        if ($user->id == $course->user_id) {
            return redirect()->back()->with('info', __('You cannot enroll in a course you have created'));
        }

        $student_role = Role::findByName('student');

        try {

            if (!$user->hasRole($student_role)) {
                $student_role->users()->attach($user); // set the student role
                $course->users()->attach($user); // enroll user
    
                // redirect user to enrolled course;
                return redirect()->route('courses.status', $course)->with('success', 'Tu inscripción se ha realizado satisfactoriamente! Aquí podrás llevar el avance de este curso, y podrás ver este y otros más en la sección Mi Aprendizaje');
            } else {
                $course->users()->attach($user); // enroll user
    
                // redirect user to enrolled course;
                return redirect()->route('courses.status', $course)->with('success', 'Tu inscripción se ha realizado satisfactoriamente! Aquí podrás llevar el avance de este curso, y podrás ver este y otros más en la sección Mi Aprendizaje');
            }

        } catch (\Exception $e) {

            Log::debug($e->getMessage());

            // redirect user to enrolled course;
            return redirect()->back()->with('error', 'Ha ocurrido un error al momento de guardar la información');
        }
    }
      
        

    /**
     * (OPTIONAL)
     * Controller to enrolled users and redirect to external URL
     */
    // public function enrolled( Course $course ){

    //     // insert user auth id in course_user table
    //     $course->users()->attach( auth()->user()->id );

    //     if( $course->url != '' ){

    //         // return Redirect to external URL
    //         return redirect()->away($course->url);

    //     } else {
    //         // redirect user to enrolled course;
    //         return redirect()->route('courses.status', $course);
    //     }

    // }

}
