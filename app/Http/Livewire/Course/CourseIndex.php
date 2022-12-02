<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Course;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Level;
use App\Models\Price;
use App\Models\Program;
use App\Models\Modality;
use App\Models\Language;

class CourseIndex extends Component
{
    use WithPagination;

    // public $category_id = 1;
    public $modality_id;
    public $level_id;
    public $program_id;
    public $price_id;
    public $language_id;
    public $rating_id = 1;
    public $topic_id = 1;

    public function render()
    {
        $courses = Course::where('status', 3)
                    ->level($this->level_id) // query scope
                    ->program($this->program_id)
                    ->price($this->price_id)
                    // ->category($this->category_id)
                    ->modality($this->modality_id)
                    ->language($this->language_id)
                    ->latest('id')
                    ->paginate(12);


        // $totalCourses = Course::where('status',3)->get();
        // $categories = Category::all();
        $levels = Level::all();
        $topics = Topic::all();
        $prices = Price::all();
        $programs = Program::all();
        $modalities = Modality::all();
        $languages = Language::all();
        // $ratings = [5,4,3,2,1];
        return view('livewire.course.course-index', compact('courses', 'levels', 'prices', 'programs', 'modalities', 'topics', 'languages'));
    }

    public function resetFilters()
    {
        $this->reset([
            'modality_id',
            'level_id',
            'program_id',
            'price_id',
            'rating_id',
            'topic_id',
            'language_id'
        ]);
    }

}
