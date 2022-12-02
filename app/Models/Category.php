<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;

    // Guarded: do not allow massive income
    protected $guarded = ['id'];
    protected $withCount = ['courses', 'topics'];

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'cdg',
        'description'
    ];

    /*******************
     *   ATTRIBUTES
     *******************/

    /*******************
     *    HELPERS
     *******************/

    /**
     * Return top 10 reviewers courses
     */
    // public function topRatedCourses()
    // {
    //    return $this->reviews()
    //    ->selectRaw('avg(rating) as average, reviewable_id')
    //    ->groupBy('reviewable_id');
    // }

    /**
     * Return all categories in random order
     */
    public static function randomCategories()
    {
        return Category::inRandomOrder()->get();
    }

    // Return the slug, not id
    public function getRouteKeyName(){
        return "slug";
    }

    /**
     * Relation 1:N
     */
    public function courses() : HasManyThrough
    {
        return $this->hasManyThrough(Course::class, Topic::class);
    }

    // Category topics
    public function topics() : HasMany
    {
        return $this->hasMany(Topic::class)->with('courses');
    }

    /**
     * Eloquent relationship to return category topics order by name
     */
    public function topicsByName() : HasMany
    {
        return $this->hasMany(Topic::class)->orderBy('name');
    }

    /**
     * Relation 1:1 Polymorphic
     */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    /****************************
     * Relation 1:M polymorphic
     ****************************/

    /**
     * Get all category's interests
     */
    public function interests(){
        return $this->morphMany(Interest::class, 'interestable');
    }

}

