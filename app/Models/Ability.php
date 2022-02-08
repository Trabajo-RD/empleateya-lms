<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * N:M
     */
    public function workshops(){
        return $this->belongsToMany(Workshop::class);
    }
}
