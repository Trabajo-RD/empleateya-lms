<?php

namespace App\Http\Livewire\Workshop;

use Livewire\Component;
use App\Models\Workshop;
use App\Models\Program;
use App\Models\Price;
use App\Models\Modality;
use App\Models\Language;

use Livewire\WithPagination;

class WorkshopIndex extends Component
{
    use WithPagination;

    public $modality_id;
    public $program_id;
    public $price_id;
    public $language_id;

    public function render()
    {

        $workshops = Workshop::where('status', 3)
                ->modality($this->modality_id) // query scope
                ->program($this->program_id)
                ->price($this->price_id)
                ->language($this->language_id)
                ->latest('id')
                ->paginate(12);

        $programs = Program::all();
        $prices = Price::all();
        $modalities = Modality::all();
        $languages = Language::all();
        $reviews = [5,4,3,2,1];

        return view('livewire.workshop.workshop-index', compact('workshops', 'programs', 'prices', 'modalities', 'reviews', 'languages'));
    }

    public function resetFilters()
    {
        $this->reset([
            'modality_id', 'program_id', 'price_id', 'language_id'
        ]);
    }
}
