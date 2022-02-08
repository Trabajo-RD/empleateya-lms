<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    use HasFactory;

    const HOLD = 1;
    const APPROVE = 2;
    const SPAM = 3;
    const TRASH = 4;

    public function commentable(){
        return $this->morphTo();
    }

    /**
     * Relation 1:N reverse
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function workshop(){
        return $this->belongsTo(Workshop::class);
    }

    /**
     * Relation 1:N polymorphic
     */
    // Comments in comments
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions(){
        return $this->morphMany(Reaction::class, 'reactionable');
    }

}
