<?php

namespace App\Http\Controllers\Instructor\Dashboard\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\LessonContent;
use App\Models\Scorm;

class LessonContentController extends Controller
{
    public function index(Lesson $lesson) {
        return view('instructor.dashboard.courses.sections.lessons.content.index', compact('lesson'));
    }

    public function storeScorm() {

    }
}
