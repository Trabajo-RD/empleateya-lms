<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

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

        $results = Course::search($this->search)
            ->join('sections', 'sections.course_id', '=', 'courses.id')
            //->join('lessons', 'lessons.section_id', '=', 'sections.id')
            ->select(
                'courses.id',
                'courses.title',
                'courses.slug'
            )
            ->groupBy(
                'courses.id',
                'courses.title',
                'courses.slug'
            )
            ->orderBy('courses.title', 'asc')
            ->take(10)
        ->get();

        return $results;

        // return Course::where('title', 'LIKE', '%' . $this->search . '%')
        // ->where('status', 3)
        // ->take(10)
        // ->get();


    }



}
