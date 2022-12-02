<?php

namespace App\Http\Livewire\LearningPath;

use Livewire\Component;
use App\Models\LearningPath;
use App\Models\Level;
use App\Models\Modality;
use App\Models\Program;
use App\Models\Profession;
use App\Models\Price;
use App\Models\Language;

use Livewire\WithPagination;

class LearningPathIndex extends Component
{
    use WithPagination;

    public $modality_id;
    public $program_id;
    public $level_id;
    public $price_id;
    public $language_id;

    // Order properties
    public $orderSelect;
    public $orderBy = [
        'key' => 'created_at',
        'direction' => 'desc'
    ];

    public function render()
    {
        $learningPaths = LearningPath::where('status', 3)
                        ->modality($this->modality_id)
                        ->program($this->program_id)
                        ->level($this->level_id)
                        ->price($this->price_id)
                        ->language($this->language_id)
                        ->latest('id')
                        ->orderBy($this->orderBy['key'], $this->orderBy['direction'])
                        ->paginate(8);
        //$totalLearningPaths = $learningPaths->count();

        $learningPathParents = [
            [
                'id' => 1,
                'name' => 'Rutas de Aprendizaje Generales',
            ],
            [
                'id' => 2,
                'name' => 'Rutas de Aprendizaje Específicas'
            ]
        ];

        $modalities = Modality::all();
        $programs = Program::all();
        $levels = Level::all();
        // $professions = Profession::all();
        $prices = Price::all();
        $languages = Language::all();
        $reviews = [5,4,3,2,1];

        return view('livewire.learning-path.learning-path-index', compact('learningPaths',  'learningPathParents', 'modalities', 'programs', 'levels', 'reviews', 'prices', 'languages'));
    }

    public function updatedOrderSelect($value)
    {
        $this->orderBy = json_decode($this->orderSelect, true);
    }

    public function resetFilters()
    {
        $this->reset([
            'modality_id', 'program_id', 'level_id', 'price_id', 'language_id'
        ]);
    }
}
