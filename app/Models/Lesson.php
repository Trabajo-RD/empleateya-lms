<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    public function getCompletedAttribute(){
        return $this->users->contains( auth()->user()->id );
    }

    use HasFactory;

    /**
     * Relation 1:1
     */
    public function description(){
        return $this->hasOne('App\Models\Description');
    }

    /**
     * Relation 1:N reverse
     */
    public function section(){
        return $this->belongsTo('App\Models\Section');
    }

    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }

    /**
     * Relation N:M
     */

    //returns the users who have marked a lesson as finished
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function subjects(){
        return $this->belongsToMany('App\Models\Subject');
    }

    public function skills(){
        return $this->belongsToMany(Skill::class);
    }

    /**
     * Relation 1:1 Polymorphic
     */
    public function resource(){
        return $this->morphOne(Resource::class, 'resourceable');
    }

    /**
     * Relation 1:N Polymorphic
     */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions(){
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
