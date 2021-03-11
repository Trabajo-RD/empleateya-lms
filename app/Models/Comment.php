<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    use HasFactory;

    public function commentable(){
        return $this->morphTo();
    }

    /**
     * Relation 1:N reverse
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Relation 1:N polymorphic
     */
    // Comments in comments
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Comment', 'reactionable');
    }

}
