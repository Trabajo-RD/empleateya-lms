<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCount = ['courses'];

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'category_id'
    ];

    // Return the slug, not id
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function learning_paths()
    {
        return $this->hasMany(LearningPath::class);
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }

    /**
     * Relation 1:N reverse
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /****************************
     * Relation 1:M polymorphic
     ****************************/

    /**
     * Get all topic's interests
     */
    public function interests(){
        return $this->morphMany(Interest::class, 'interestable');
    }

    // N:M polymorphic

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
