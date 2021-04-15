<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * Relation N:M : Users enrolled in courses
     */
    public function courses(){
        return $this->belongsToMany('App\Models\Course');
    }
}
