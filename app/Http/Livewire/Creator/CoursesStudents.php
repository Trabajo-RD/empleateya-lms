<?php

namespace App\Http\Livewire\Creator;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesStudents extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $course, $search;

    public function mount( Course $course ){
        $this->course = $course;

        // Policy to check if an instructor is modifying a course created by another instructor
        $this->authorize('dictated', $course);
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
                    
        return view('livewire.creator.courses-students', compact('students'))->layout('layouts.creator', ['course' => $this->course]);
    }
}
