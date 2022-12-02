<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];

    protected $fillable = [
        'question',
        'answer',
        'icon'
    ];

    // How many tags FAQ has
    // protected $withCount = ['tags'];

    // Relation 1:N Reverse
    public function category(){
        return $this->belongsTo('App\Models\FaqCategory');
    }

    /**
     * Relation N:M
     *
     * return all FAQ tags
     */
    // public function tags(){
    //     return $this->belongsToMany('App\Models\Tag');
    // }


}
