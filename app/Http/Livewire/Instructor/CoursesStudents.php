<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class CoursesStudents extends Component
{
    use WithPagination;

    public $course, $search;

    public function mount( Course $course ){
        $this->course = $course;
    }

    // Livewire live cicle
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $students = $this->course->students()
                    ->where('name', 'LIKE', '%' . $this->search . '%')
                    //->orWhere('document_id', 'LIKE', '%' . $this->search . '%')
                    //->orWhere('email', 'LIKE', '%' . $this->search . '%')
                    ->paginate(10);



        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor');
    }
}
