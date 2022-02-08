<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseCard extends Component
{
    public $courses;

    public function mount()
    {
        $this->courses = auth()->user()->courses_dictated->take(2);
    }

    public function render()
    {
        return view('livewire.course-card', ['courses' => $this->courses]);
    }
}
