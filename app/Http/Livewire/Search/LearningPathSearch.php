<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;
use App\Models\LearningPath;

class LearningPathSearch extends Component
{
    public $learningpaths_search;

    public function render()
    {
        return view('livewire.search.learning-path-search');
    }

    /**
     * Computed property, return all learning paths that match the search
     */
    public function getPathsResultsProperty()
    {
        // sleep(1);

        return LearningPath::search('title', $this->learningpaths_search)
        ->paginate(10);

        // return LearningPath::where('title', 'LIKE', '%' . $this->learningpaths_search . '%')
        //                     ->where('status', 3)
        //                     ->take(10)
        //                     ->get();
    }
}
