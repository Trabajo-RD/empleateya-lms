<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    protected $withCount = ['resource'];

    protected $fillable = [
        'uid', 'title', 'slug', 'order', 'url', 'iframe', 'duration_in_minutes', 'section_id', 'platform_id', 'type_id', 'language_id'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    // Attributes

    /**
     * Confirma si una lección está marcada como completada
     */
    public function getCompletedAttribute()
    {
        return $this->users->contains( auth()->user()->id );
    }

    /**
     * Relation 1:1
     */
    public function description(){
        return $this->hasOne(Description::class);
    }

    // 1:N inverse ------------------------------------------

    /**
     * returns the section to which the lesson belongs
     */
    public function section(){
        return $this->belongsTo(Section::class);
    }

    /**
     * returns the platform to which the lesson belongs
     */
    public function platform(){
        return $this->belongsTo(Platform::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    // N:M --------------------------------------------------

    //returns the users who have marked a lesson as finished
    public function users() {
        return $this->belongsToMany(User::class, 'lesson_user', 'lesson_id', 'user_id');
    }

    public function subjects(){
        return $this->belongsToMany('App\Models\Subject');
    }

    public function skills(){
        return $this->belongsToMany(Skill::class);
    }

    /**
     * Relation 1:1 Polymorphic
     */
    public function resource(){
        return $this->morphOne(Resource::class, 'resourceable');
    }

    /**
     * Relation 1:N Polymorphic
     */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions(){
        return $this->morphMany(Reaction::class, 'reactionable');
    }

    // N:M polymorphic


}
