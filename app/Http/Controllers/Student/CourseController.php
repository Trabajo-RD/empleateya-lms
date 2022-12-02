<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function __invoke()
    {
        // get all user courses
        // if(Auth::check()) {
        //     $courses = Course::find(Auth::id())->get();            
        // }

        // $courses = DB::table('courses')
        //     ->join('course_user','courses.id', '=', 'course_user.course_id')
        //     // ->join('users', 'courses.user_id', '=', 'users.id')
        //     ->leftjoin('images', 'images.imageable_id', '=', 'courses.id')
        //     ->select(
        //         'courses.id as id',
        //         'courses.title as title',
        //         'courses.slug AS slug',
        //         'courses.created_at AS created_at',
        //         // 'users.name AS name',
        //         // 'users.lastname AS lastname',
        //         'images.url AS image'
        //     )
        //     ->where('course_user.user_id', '=', auth()->user()->id)
            
        //     ->orderBy('courses.id', 'desc')
        //     ->limit(3)
        // ->get();

        return view('student.courses.index');
    }
}
