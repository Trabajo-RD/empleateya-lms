<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    protected $fillable = [
        'name'
    ];

    use HasFactory;

    const PATH = 'Learning Path';
    const MODULE = 'Module';
    const UNIT = 'Unit';
    const COURSE = 'Course';
    const SECTION = 'Section';
    const LESSON = 'Lesson';
    const WORKSHOP = 'Workshop';
    const ACTIVITY = 'Activity';
    const TASK = 'Task';
    const VIDEO = 'Video';
    const AUDIO = 'Audio';
    const IMAGE = 'Image';
    const POST = 'Post';
    const PAGE = 'Page';
    const BANNER = 'Banner';


    /**
     * Relation 1:N
     */


    // filter courses by type
    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function workshops()
    {
        return $this->hasMany(workshop::class);
    }

    // filter learning paths by type
    public function learning_paths()
    {
        return $this->hasMany(LearningPath::class);
    }

    /**
     * Filter sections by type
     */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
