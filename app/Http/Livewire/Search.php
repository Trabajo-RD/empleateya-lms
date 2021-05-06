<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class Search extends Component
{
    public $search;

    public function render()
    {
        // $course = Course::where('title', 'LIKE', '%' . $this->search . '%')
        //             ->where('status', 3 )
        //             // ->latest('id')
        //             ->take(10)
        //             ->get();

        return view('livewire.search');
    }

    public function getResultsProperty(){
        return Course::where('title', 'LIKE', '%' . $this->search . '%')
        ->where('status', 3)
        ->take(10)
        ->get();
    }
}
