<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use App\Models\Type;
use App\Models\Modality;

use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public $category_id;
    public $level_id;
    public $type_id;
    public $modality_id;

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();
        $types = Type::all();
        $modalities = Modality::all();

        $courses = Course::where('status', 3)
                ->category( $this->category_id )
                ->type( $this->type_id )
                ->level( $this->level_id )
                ->modality( $this->modality_id )
                ->latest('id')
                ->paginate(8);

        return view('livewire.courses-index', compact('courses', 'categories', 'levels', 'types', 'modalities'));
    }

    public function resetFilters(){
        $this->reset([
            'category_id',
            'level_id',
            'type_id',
            'modality_id'
        ]);
    }
}
