<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    use HasFactory;

    // Guarded: do not allow massive income
    protected $table = 'sections';
    protected $guarded = ['id'];
    protected $withCount = ['lessons', 'tests', 'scorms'];
    protected $fillable = [
        'uid', 'title', 'slug', 'summary', 'order', 'course_id', 'type_id'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function getCompletedAttribute(){
        return $this->users->contains( auth()->user()->id );
    }


    /**
     * Relation 1:N
     */
    public function lessons() {
        return $this->hasMany(Lesson::class);
    }

    public function scorms() {
        return $this->morphMany(Scorm::class, 'scormable');
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    /**
     * Relation 1:N Inverse
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    /**
     * Return the section type
     */
    public function type() : BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    /**
     * N:M
     */
    public function users(){
        return $this->belongsToMany(User::class, 'section_user', 'section_id', 'user_id');
    }


}
