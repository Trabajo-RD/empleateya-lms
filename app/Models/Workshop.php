<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;


    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISH = 3;
    const TRASH = 4;
    const INITIATED = 5;
    const FINALIZED = 6;

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'subtitle',
        'summary',
        'url',
        'duration_in_minutes',
        'status',
        'slug',
        'required_min_age',
        'required_max_age',
        'audience',
        'start_date',
        'end_date',
        'include_certificate',
        'user_id',
        'program_id',
        'price_id',
        'modality_id',
        'course_id'
    ];

    /**
     * 1:N inverse
     */
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function price(){
        return $this->belongsTo(Price::class);
    }

    public function modality(){
        return $this->belongsTo(Modality::class);
    }

    public function program(){
        return $this->belongsTo(Program::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    /**
     * N:M
     */
    public function participants(){
        return $this->belongsToMany(User::class);
    }

    public function languages(){
        return $this->belongsToMany(Language::class);
    }

    public function abilities(){
        return $this->belongsToMany(Ability::class);
    }

    public function attitudes(){
        return $this->belongsToMany(Attitude::class);
    }

    /**
     * Relation 1:N Polymorphic
     */
    public function reviews(){
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    /**
     * 1:N
     */
    public function activities(){
        return $this->hasMany(Activity::class);
    }

    /**
     * 1:1 polymorphic
     */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tasks(){
        return $this->hasManyThrough(Task::class, Activity::class);
    }

}
