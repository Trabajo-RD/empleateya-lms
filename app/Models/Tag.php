<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['name', 'slug', 'icon'];

    // protected $withCount = ['courses'];

    /**
     * Relation 1:N reverse
     */
    // public function tag(){
    //     return $this->belongsTo('App\Models\Topic');
    // }

    // Return the slug, not id
    public function getRouteKeyName()
    {
        return "slug";
    }

    // Relation N:M polymorph

    /**
     * Get all of the courses that are assigned this tag.
     */
    public function courses()
    {
        return $this->morphedByMany(Course::class, 'taggable');
    }

    /**
     * Get all of the courses that are assigned this tag.
     */
    public function learning_paths()
    {
        return $this->morphedByMany(LearningPath::class, 'taggable');
    }

    public function workshops()
    {
        return $this->morphedByMany(Workshop::class, 'taggable');
    }

    // public function faqs()
    // {
    //     return $this->belongsToMany(Faq::class);
    // }

    public function terms()
    {
        return $this->morphedByMany(Term::class, 'taggable');
    }

    /**
     * Relation 1:N reverse
     */
    public function topics()
    {
        return $this->morphedByMany(Topic::class, 'taggable');
    }

    /****************************
     * Relation 1:M polymorphic
     ****************************/

    /**
     * Get all tag's interests
     */
    public function interests(){
        return $this->morphMany(Interest::class, 'interestable');
    }

    /****************************
     * Relation N:M polymorphic
     ****************************/

    /**
     * Get all of the interests for the tag
     */
    // public function interests(){
    //     return $this->morphToMany(Interest::class, 'interestable');
    // }

}
