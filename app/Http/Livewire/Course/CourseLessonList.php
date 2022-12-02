<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;
use App\Models\Course;

class CourseLessonList extends Component
{
    public Course $course;
    public $current;

    public function render()
    {
        return view('livewire.course.course-lesson-list');
    }
}
