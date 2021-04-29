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
        'content',
        'title_color',
        'title_color_saturation',
        'content_color',
        'content_color_saturation',
        'background_color',
        'background_color_saturation',
        'background_color_opacity',
        'link',
        'link_text',
        'link_type',
        'link_color',
        'link_color_saturation',
        'link_bg_color',
        'link_bg_color_saturation',
        'information',
        'target',
        'status',
    ];

   
            

    /**
     * Relation 1:1 Polymorphic
     */
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
