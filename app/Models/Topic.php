<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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

    /**
     * Relation 1:N
     */
    public function tags()
    {
        return $this->hasMany('App\Models\Tag');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
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
}
