<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    use HasFactory;

    /**
     * Relation 1:N
     */
    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }

    /**
     * Relation 1:N reverse
     */
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
