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
        'icon'
    ];

    // Return the slug, not id
    public function getRouteKeyName(){
        return "slug";
    }

    /**
     * Relation 1:N
     */
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    // Category topics
    public function topics(){
        return $this->hasMany('App\Models\Topic');
    }

    // Relation Category : Tags
    public function tags(){
        return $this->hasManyThrough('App\Models\Tag', 'App\Models\Topic');
    }

}

