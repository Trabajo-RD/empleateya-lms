<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Level;
use App\Models\Type;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination;

class CourseCategory extends Component
{

    use WithPagination;

    public $category;
    public $user = '';

    public $type_id;
    public $topic_id;
    public $level_id;

    public $layout = 'course-card';

    public $sortBy = '';

    public function mount(){
        $this->category = request()->category;

        if(Auth::user() ){
            $this->user = request()->user()->id;
        }
    }

    public function render()
    {
        $topics = Topic::where('category_id', $this->category->id)->get();
        $levels = Level::all();
        $types = Type::all();

        $courses = Course::where('status', 3)
        ->category($this->category->id)
        ->topic( $this->topic_id )
        ->level( $this->level_id )
        ->type( $this->type_id )
        ->latest('id')
        ->paginate(12);

        $user_courses = DB::table('courses')
            ->join('course_user','courses.id', '=', 'course_user.course_id')
            ->join('users', 'courses.user_id', '=', 'users.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->leftjoin('images', 'images.imageable_id', '=', 'courses.id')
            ->select(
                'courses.id',
                'courses.title as title',
                'courses.slug AS slug',
                'users.name AS name',
                'users.lastname AS lastname',
                'categories.name AS category',
                'images.url AS image'
            )
            ->where('courses.category_id','=', $this->category->id)
            ->where('course_user.user_id', '=', $this->user)
            ->groupBy(
                'courses.id',
                'courses.title',
                'courses.slug',
                'users.name',
                'users.lastname',
                'categories.name',
                'images.url'
            )
            ->orderBy('courses.id', 'desc')
            ->limit(3)
        ->get();

        $featured_courses = DB::table('courses')
            ->join('reviews','courses.id', '=', 'reviews.course_id')
            ->join('types', 'courses.type_id', '=', 'types.id')
            ->join('users', 'courses.user_id', '=', 'users.id')
            ->join('prices', 'courses.price_id', '=', 'prices.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
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
                'categories.name AS category',
                'levels.name AS level',
                'modalities.name AS modality',
                'prices.name AS price',
                'prices.value AS value',
                'images.url AS image',
                DB::raw('AVG(reviews.rating) as rating')
            )
            ->where('courses.category_id','=', $this->category->id)
            // ->where('images.imageable_type', '=', 'App\Models\Course')
            ->groupBy(
                'courses.id',
                'courses.title',
                'courses.slug',
                'types.name',
                'users.name',
                'users.lastname',
                'categories.name',
                'levels.name',
                'modalities.name',
                'images.url',
                'prices.name',
                'prices.value'
            )
            ->orderBy('rating', 'desc')
            ->limit(3)
            ->get();

        return view('livewire.course-category', compact('courses', 'user_courses', 'featured_courses', 'topics', 'levels', 'types'));
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

}
