<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getCompletedAttribute(){
        return $this->users->contains( auth()->user()->id );
    }

    /**
     * 1:N inverse
     */
    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * N:M
     */
    public function users(){
        return $this->belongsToMany(User::class, 'user_task');
    }

    public function competencies(){
        return $this->belongsToMany(Competency::class);
    }

    // N:M polymorphic


}
