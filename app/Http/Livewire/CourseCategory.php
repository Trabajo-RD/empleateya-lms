<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Topic;
use App\Models\Level;
use App\Models\Type;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use Livewire\WithPagination;

class CourseCategory extends Component
{

    use WithPagination;

    public $category;
    public $user;
    public $user_courses = null;

    public $type_id;
    public $topic_id;
    public $level_id;
    public $program_id;

    public $layout = 'course-card';

    public $sortBy = '';

    protected $listeners = ['setLayout'];


    public function mount(){
        $this->category = request()->category;

        if(Auth::user() ){
            $this->user = request()->user();
        }
    }

    public function render()
    {
        $topics     =   Topic::where('category_id', $this->category->id)->get();
        $levels     =   Level::all();
        $types      =   Type::all();
        $programs   =   Program::all();

        $courses = $this->category->courses()
        ->program( $this->program_id )
        ->topic( $this->topic_id )
        ->level( $this->level_id )
        ->type( $this->type_id )
        ->latest('id')
        ->paginate(12);

        if (Auth::check()) {
            $this->user_courses = $this->user->courses_enrolled()
            ->orderBy('courses.id', 'desc')
            ->limit(3)
        ->get();
        }

        // TODO: Courses in this category order by rating
        $featured_courses = DB::table('courses')
            ->join('reviews','courses.id', '=', 'reviews.reviewable_id')
            ->join('types', 'courses.type_id', '=', 'types.id')
            ->join('users', 'courses.user_id', '=', 'users.id')
            ->join('prices', 'courses.price_id', '=', 'prices.id')
            ->join('levels', 'courses.level_id', '=', 'levels.id')
            ->join('modalities', 'courses.modality_id', '=', 'modalities.id')
            ->leftjoin('images', 'images.imageable_id', '=', 'courses.id')
            // ->where('images.imageable_type', '=', Course::class)

            ->select(
                'courses.id',
                'courses.title as title',
                'courses.slug AS slug',
                'types.name as type',
                'users.name AS name',
                'users.lastname AS lastname',
                // 'categories.name AS category',
                'levels.name AS level',
                'modalities.name AS modality',
                'prices.name AS price',
                'prices.value AS value',
                'images.url AS image',
                DB::raw('AVG(reviews.rating) as rating')
            )
            // ->where('courses.category_id','=', $this->category->id)

            ->groupBy(
                'courses.id',
                'courses.title',
                'courses.slug',
                'types.name',
                'users.name',
                'users.lastname',
                // 'categories.name',
                'levels.name',
                'modalities.name',
                'images.url',
                'prices.name',
                'prices.value'
            )
            ->orderBy('rating', 'desc')
            ->limit(3)
            ->get();

        return view('livewire.course-category', compact('courses',  'featured_courses', 'programs', 'topics', 'levels', 'types'));
    }

    public function resetFilters(){
        $this->reset([
            'level_id',
            'type_id',
            'topic_id'
        ]);
    }

    public function sortBy($field){
        if( $this->sortDirection == 'asc'){
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function setLayout($layout){
        $this->layout = $layout;
    }

}
