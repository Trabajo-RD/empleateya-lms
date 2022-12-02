<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    use HasFactory;

    protected $fillable = [
        'name',
        'value'
    ];

    /**
     * Relation 1:N
     */
    public function course(){
        return $this->hasMany(Course::class);
    }

    public function learningpaths(){
        return $this->hasMany(LearningPath::class);
    }

    public function workshop(){
        return $this->hasMany(Workshop::class);
    }
}
