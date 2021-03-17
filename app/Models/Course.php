<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Guarded: do not allow massive income
    //protected $guarded = [];
    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews']; // add attr students_count to Course Model

    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISH = 3;
    const TRASH = 4;

    /**
     * New Attributes
     */
    public function getRatingAttribute(){
        if($this->reviews_count){
            return round($this->reviews->avg('rating'), 1);
        } else {
            return 5;
        }
    }

    // Query Scopes
    public function scopeCategory( $query, $category_id ){
        if( $category_id ){
            return $query->where('category_id', $category_id );
        }
    }

    public function scopeType( $query, $type_id ){
        if( $type_id ){
            return $query->where('type_id', $type_id );
        }
    }

    public function scopeLevel( $query, $level_id ){
        if( $level_id ){
            return $query->where('level_id', $level_id );
        }
    }

    public function scopeModality( $query, $modality_id ){
        if( $modality_id ){
            return $query->where('modality_id', $modality_id );
        }
    }

    // Return the slug, not id
    public function getRouteKeyName(){
        return "slug";
    }

    /**
     * Relation 1:1
     */
    public function observation(){
        return $this->hasOne('App\Models\Observation');
        //return $this->hasMany('App\Models\Observation');
    }

    /**
     * Relation 1:N
     */
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }

    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }

    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }

    public function sections(){
        return $this->hasMany('App\Models\Section');
    }

    /**
     * Relation 1:N reverse
     */
    public function editor(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function type(){
        return $this->belongsTo('App\Models\Type');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function modality(){
        return $this->belongsTo('App\Models\Modality');
    }

    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    public function price(){
        return $this->belongsTo('App\Models\Price');
    }

    /**
     * Relation N:M
     *
     * return all enrolled students in any course
     */
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Relation 1:1 Polymorphic
     */
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    // Relation Course : Lessons
    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}
