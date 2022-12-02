<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCount = ['tasks'];
    protected $fillable = [
        'name', 'slug', 'summary', 'duration_in_minutes', 'url', 'type_id', 'language_id'
    ];

    public function getCompletedAttribute(){
        return $this->users->contains( auth()->user()->id );
    }

    /**
     * 1:N inverse
     */
    public function workshops() : BelongsToMany {
        return $this->belongsToMany(
            Workshop::class,
            'workshop_has_activities',
            'activity_id',
            'workshop_id'
        );
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
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
        return $this->belongsToMany(User::class, 'user_activity');
    }

    // N:M polymorphic


}
