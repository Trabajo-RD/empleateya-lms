<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCount = ['tags'];

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * Relation N:M
     *
     * return all FAQ tags
     */
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
