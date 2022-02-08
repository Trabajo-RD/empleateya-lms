<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 1:N inverse
     */
    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    /**
     * N:M
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function competencies(){
        return $this->belongsToMany(Competency::class);
    }
}
