<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
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
}
