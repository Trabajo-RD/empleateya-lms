<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['name'];

    protected $withCount = ['courses', 'faqs', 'terms'];

    /**
     * Relation 1:N reverse
     */
    public function tag(){
        return $this->belongsTo('App\Models\Topic');
    }

    /**
     * Relation N:M : Users enrolled in courses
     */
    public function courses(){
        return $this->belongsToMany('App\Models\Course');
    }

    public function faqs(){
        return $this->belongsToMany('App\Models\Faq');
    }

    public function terms(){
        return $this->belongsToMany('App\Models\Term');
    }

}
