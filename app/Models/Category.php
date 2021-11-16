<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description'
    ];

    // Return the slug, not id
    public function getRouteKeyName(){
        return "slug";
    }

    /**
     * Relation 1:N
     */
    public function courses(){
        // return $this->hasMany('App\Models\Course');
        return $this->hasMany(Course::class);
    }

    // Category topics
    public function topics(){
        // return $this->hasMany('App\Models\Topic');
        return $this->hasMany(Topic::class);
    }

    // Relation Category : Tags
    public function tags(){
        return $this->hasManyThrough('App\Models\Tag', 'App\Models\Topic');
    }

    /**
     * Relation 1:1 Polymorphic
     */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

}

