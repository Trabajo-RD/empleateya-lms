<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url'
    ];

    protected $casts = ['metadata' => 'array'];

    /**
     * Relation 1:N Reverse
     */
    public function category(){
        return $this->belongsTo('App\Models\LinkCategory');
    }
}
