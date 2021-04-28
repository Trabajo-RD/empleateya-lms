<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'content',
        'title_color',
        'content_color',
        'link',
        'link_color',
        'link_bg_color',
        'status'
    ];

    /**
     * Relation 1:1 Polymorphic
     */
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
