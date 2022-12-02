<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;

use App\Models\Course;
use App\Models\Module;
use App\Models\Workshop;
use App\Models\LearningPath;

use App\Models\Topic;
use App\Models\Level;
use App\Models\Price;
use App\Models\Program;
use App\Models\Modality;
use App\Models\Language;

class StudentIndex extends Component
{
    use WithPagination;

    public $user;

    public $courses;
    public $modules;
    public $learningPaths;
    public $workshops;

    public $modality_id;
    public $level_id;
    public $program_id;
    public $price_id;
    public $language_id;
    public $rating_id = 1;
    public $topic_id = 1;

    public $search;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        // courses
        $this->courses = Course::whereHas('users', function($q) {
            $q->where( 'user_id', $this->user->id );
        })
        ->modality($this->modality_id)
        ->program($this->program_id)
        ->level($this->level_id)
        ->language($this->language_id)
        ->price($this->price_id)
        ->get();

        // modules
        $this->modules = Module::whereHas('users', function($q) {
            $q->where( 'user_id', $this->user->id );
        })
        ->get();

        // workshops
        $this->workshops = Workshop::whereHas('users', function($q) {
            $q->where('user_id', $this->user->id );
        })
        ->modality($this->modality_id)
        ->program($this->program_id)
        ->get();

        // courses
        $this->learningPaths = LearningPath::whereHas('users', function($q) {
            $q->where( 'user_id', $this->user->id );
        })
        ->modality($this->modality_id)
        ->program($this->program_id)
        ->level($this->level_id)
        ->language($this->language_id)
        ->price($this->price_id)
        ->get();


        $levels = Level::all();
        $topics = Topic::all();
        $prices = Price::all();
        $programs = Program::all();
        $modalities = Modality::all();
        $languages = Language::all();

        return view('livewire.student.student-index', compact(
            'levels', 'topics', 'prices', 'programs', 'modalities', 'languages'
        ));
    }

    public function resetFilters()
    {
        $this->reset([
            'modality_id',
            'level_id',
            'program_id',
            'price_id',
            'language_id',
            'rating_id',
            'topic_id'
        ]);
    }
}
