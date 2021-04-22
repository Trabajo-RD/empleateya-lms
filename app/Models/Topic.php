<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['name'];

    /**
     * Relation 1:N
     */
    public function tags(){
        return $this->hasMany('App\Models\Tag');
    }

    /**
     * Relation 1:N reverse
     */
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

}
