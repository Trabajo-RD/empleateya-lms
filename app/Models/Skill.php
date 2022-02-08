<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * N:M
     */
    public function lessons(){
        return $this->belongsToMany(Lesson::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    /**
     * 1:N polymorphic
     */
    public function scores(){
        return $this->morphMany(Score::class, 'scoreable');
    }
}
