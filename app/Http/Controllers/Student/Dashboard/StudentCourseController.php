<?php

namespace App\Http\Controllers\Student\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class StudentCourseController extends Controller
{
    public function index() {
        $courses = auth()->user()->courses_enrolled;
        return view('student.dashboard.courses.index', compact('courses'));
    }

    /**
     * Remove a course from your list
     *
     * @return void
     */
    public function destroy(Course $course) {

    }
}
