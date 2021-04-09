<?php

namespace App\Http\Livewire\Creator;

use Livewire\Component;
use App\Models\Course;

use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                    ->where('user_id', auth()->user()->id )
                    //->latest('id')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);

        return view('livewire.creator.courses-index', compact('courses'));
    }

    public function clear(){
        $this->reset('page');
    }
}
