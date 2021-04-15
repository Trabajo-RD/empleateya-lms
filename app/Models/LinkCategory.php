<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkCategory extends Model
{
    use HasFactory;

    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    /**
     * Relation 1:N
     */
    public function link(){
        return $this->hasMany('App\Models\Link');
    }
}
