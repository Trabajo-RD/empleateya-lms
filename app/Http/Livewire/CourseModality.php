<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Modality;
use App\Models\Category;
use App\Models\Type;
use App\Models\Level;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination;

class CourseModality extends Component
{
    use WithPagination;

    public $modality;
    public $user = '';

    public $category_id;
    public $type_id;
    public $topic_id;
    public $level_id;

    public $layout = 'course-card';

    public function mount(){
        $this->modality = request()->modality;

        if(Auth::user() ){
            $this->user = request()->user()->id;
        }
    }

    public function render()
    {
        $categories = Category::all();
        $topics = Topic::all();
        $levels = Level::all();
        $types = Type::all();

        $courses = Course::where('status', 3)
            ->modality( $this->modality->id )
            ->category( $this->category_id )
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
            ->where('courses.modality_id','=', $this->modality->id)
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
            ->join('reviews','courses.id', '=', 'reviews.reviewable_id')
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
            ->where('courses.modality_id','=', $this->modality->id)
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

        return view('livewire.course-modality', compact('courses', 'user_courses', 'featured_courses', 'categories', 'topics', 'levels', 'types'));
    }

    public function resetFilters(){
        $this->reset([
            'category_id',
            'level_id',
            'type_id',
            'topic_id'
        ]);
    }
}
