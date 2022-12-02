<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCount = ['programs', 'platforms'];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'link',
        'status',
    ];

    /**
     * Return the slug in the route
     */
    public function getRouteKeyName()
    {
        return "slug";
    }


    /**
     * Relation 1:1 Polymorphic
     */
     public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    /**
     * Relation 1:N
     */
    public function programs(){
        return $this->hasMany(Program::class);
    }

    public function platforms()
    {
        return $this->hasManyThrough(Platform::class, Program::class);
    }
}
