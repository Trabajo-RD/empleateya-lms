<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /***************************
     * Relation 1:N polymorphic
     ***************************/

    /**
     * Get the parent commentable model (post or video).
     */
    public function interestable()
    {
        return $this->morphTo();
    }

    /***************************
     * Relation N:M polymorphic
     ***************************/

    /**
     * Get all of the tags that are assigned this interest.
     */
    // public function tags()
    // {
    //     return $this->morphedByMany(Tag::class, 'interestable');
    // }



    /**
     * Get all of the topics that are assigned this interest.
     */
    // public function topics()
    // {
    //     return $this->morphedByMany(Topic::class, 'interestable');
    // }

    /**
     * Get all of the videos that are assigned this tag.
     */
    // public function categories()
    // {
    //     return $this->morphedByMany(Category::class, 'interestable');
    // }
}
