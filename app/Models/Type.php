<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    use HasFactory;

    const LEARNING_PATH = 'Itinerario de Aprendizaje';
    const MODULE = 'Modulo';
    const VIDEO = 'Video';

    /**
     * Relation 1:N
     */
    public function course(){
        return $this->hasMany('App\Models\Course');
    }
}
