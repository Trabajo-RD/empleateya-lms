<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    use HasFactory;

    public function reviewable(){
        return $this->morphTo();
    }

    /**
     * Relation 1:N reverse
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function course(){
    //     return $this->belongsTo(Course::class);
    // }


}
