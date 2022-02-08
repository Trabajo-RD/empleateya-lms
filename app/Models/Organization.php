<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 1:N inverse
     */
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * 1:N
     */
    
    // organization courses
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function learning_paths()
    {
        return $this->hasMany(LearningPath::class);
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }

    /**
     * N:M
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
