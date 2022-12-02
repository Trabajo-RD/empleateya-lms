<?php

namespace App\Http\Controllers\Instructor\Dashboard\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;

class CourseContentController extends Controller
{
    public function index(Lesson $lesson) {
        return view('instructor.dashboard.courses.sections.lessons.content.index', compact('lesson'));
    }
}
