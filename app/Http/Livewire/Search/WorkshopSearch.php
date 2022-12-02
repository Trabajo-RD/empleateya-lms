<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;
use App\Models\Workshop;

class WorkshopSearch extends Component
{
    public $workshops_search;

    public function render()
    {
        return view('livewire.search.workshop-search');
    }

    /**
     * Computed property, return all workshops that match the search
     */
    public function getWorkshopsResultsProperty()
    {
        // sleep(1);

        return Workshop::search('title', $this->workshops_search)
        ->paginate(10);

        // return Workshop::where('title', 'LIKE', '%' . $this->workshops_search . '%')
        //                 ->where('status', 3)
        //                 ->take(10)
        //                 ->get();
    }
}
