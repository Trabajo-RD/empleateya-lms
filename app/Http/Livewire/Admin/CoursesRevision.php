<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Course;

use Livewire\WithPagination;

class CoursesRevision extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $revision_courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                ->where('status', 2)
                ->paginate(10);

        return view('livewire.admin.courses-revision', compact('revision_courses'));
    }

    public function clear(){
        $this->reset('page');
    }
}
