<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    use HasFactory;

    const LIKE = 1;
    const DISLIKE = 2;

    /**
     * Polimorfic relation table
     */
    public function reactionable(){
        return $this->morphTo();
    }

    /**
     * Relation 1:N reverse
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
