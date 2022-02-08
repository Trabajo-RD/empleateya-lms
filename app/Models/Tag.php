<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'topic_id'
    ];

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

    /**
     * Relation N:M : Users enrolled in courses
     */
    public function courses()
    {
        // return $this->belongsToMany('App\Models\Course');
        return $this->belongsToMany(Course::class);
    }

    public function faqs()
    {
        return $this->belongsToMany('App\Models\Faq');
    }

    public function terms()
    {
        return $this->belongsToMany('App\Models\Term');
    }

    /**
     * Relation 1:N reverse
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
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
