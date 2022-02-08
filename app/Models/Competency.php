<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function children()
    {
        return $this->hasMany(Competency::class, 'parent_id');
    }

    /**
     * N:M
     */
    public function tasks(){
        return $this->belongsToMany(Task::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    /**
     * 1:N polymorphic
     */
    public function scores(){
        return $this->morphMany(Score::class, 'scoreable');
    }
}
