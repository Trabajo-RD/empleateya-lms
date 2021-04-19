<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    protected $fillable = [
        'name'
    ];

    use HasFactory;

    /**
     * Relation 1:N
     */
    public function course(){
        return $this->hasMany('App\Models\Course');
    }
}
