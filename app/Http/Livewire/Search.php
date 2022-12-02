<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Section;
use App\Models\Module;
use App\Models\LearningPath;
use App\Models\Workshop;
use Illuminate\Support\Facades\DB;

class Search extends Component
{
    /* Wire models */
    public $search;
    public $url = '';
    public $showFilters = false;
    public $type = 1;

    public $filters = [
        ['id' => 1, 'name' => 'Learning Path'],
        ['id' => 2, 'name' => 'Module'],
        ['id' => 4, 'name' => 'Course'],
        ['id' => 7, 'name' => 'Workshop'],
    ];

    public function render()
    {
        // $course = Course::where('title', 'LIKE', '%' . $this->search . '%')
        //             ->where('status', 3 )
        //             // ->latest('id')
        //             ->take(10)
        //             ->get();

        return view('livewire.search');

        // return view('livewire.search', [
        //     'courses' => Course::whereLike('title', $this->search ?? ''),
        //     'modules' => Module::whereLike('title', $this->search ?? ''),
        //     'paths' => LearningPath::whereLike('title', $this->search ?? ''),
        //     'workshops' => Workshop::whereLike('title', $this->search ?? '')
        // ]);
    }

    public function getResultsProperty()
    {
        // sleep(1);

        switch ($this->type) {
            case 4:
                $results = Course::search('title', $this->search)->paginate(10);
                $this->url = 'courses.show';
                break;
            case 2:
                $results = Module::search('title', $this->search)->paginate(10);
                $this->url = 'modules.show';
                break;
            case 1:
                $results = LearningPath::search('title', $this->search)->paginate(10);
                $this->url = 'learning-paths.show';
                break;
            case 7:
                $results = Workshop::search('title', $this->search)->paginate(10);
                $this->url = 'workshops.show';
                break;
            default:
                $results = Course::search('title', $this->search)->paginate(10);
                $this->url = 'courses.show';
                break;
        }

        //     ->join('sections', 'sections.course_id', '=', 'courses.id')

        //     ->select(
        //         'courses.id',
        //         'courses.title',
        //         'courses.slug'
        //     )
        //     ->groupBy(
        //         'courses.id',
        //         'courses.title',
        //         'courses.slug'
        //     )
        //     ->orderBy('courses.title', 'asc')
        //     ->take(10)
        // ->get();

        return $results;

        // return Course::where('title', 'LIKE', '%' . $this->search . '%')
        // ->where('status', 3)
        // ->take(10)
        // ->get();


    }



}
