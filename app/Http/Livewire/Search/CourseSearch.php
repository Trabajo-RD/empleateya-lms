<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;
use App\Models\Course;

class CourseSearch extends Component
{
    public $courses_search;

    public function render()
    {
        return view('livewire.search.course-search');
    }

    public function getCoursesResultsProperty()
    {
        // sleep(1);

        return Course::search('title', $this->courses_search)
            ->paginate(10);

        // return Course::where('title', 'LIKE', '%' . $this->courses_search . '%')
        // ->where('status', 3)
        // ->take(10)
        // ->get();
    }
}
