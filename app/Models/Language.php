<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['code', 'name', 'slug'];

    // Return the slug not id
    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * N:M Relationship
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function learning_paths()
    {
        return $this->hasMany(LearningPath::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }


}
