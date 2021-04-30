<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'link',
        'status',
    ];

   
    /**
     * Relation 1:1 Polymorphic
     */
     public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
