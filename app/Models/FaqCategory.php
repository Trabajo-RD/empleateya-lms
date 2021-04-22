<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['name'];

    /**
     * Relation 1:N
     */
    public function faq(){
        return $this->hasMany('App\Models\Faq');
    }
}
