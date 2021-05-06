<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Course;

use Livewire\WithPagination;

class CoursesPublished extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {

        $published_courses = Course::where('status', 3)
                ->where('title', 'LIKE', '%' . $this->search . '%')
                ->paginate(10);

        return view('livewire.admin.courses-published', compact('published_courses'));
    }

    public function clear(){
        $this->reset('page');
    }
}
