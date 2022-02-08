<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 1:N inverse
     */
    public function workshop(){
        return $this->belongsTo(Workshop::class);
    }

    /**
     * 1:N
     */
    public function tasks(){
        return $this->hasMany(Task::class);
    }

    /**
     * N:M
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }

}
