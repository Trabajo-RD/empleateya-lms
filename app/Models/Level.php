<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    use HasFactory;

    /**
     * Relation 1:N
     */

    // returns courses associated with a level
    public function courses(){
        return $this->hasMany(Course::class);
    }

    /**
     * N:M
     */
    // returns the records of the learning paths of a level
    public function learning_paths()
    {
        return $this->belongsToMany(LearningPath::class);
    }
}
