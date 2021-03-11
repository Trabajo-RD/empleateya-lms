<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    use HasFactory;

    const MALE = 'M';
    const FEMALE = 'F';
    const OTHER = 'O';
    const NOT_SPECIFIED = 'NS';

    /**
     * Relation 1:1 reverse
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
