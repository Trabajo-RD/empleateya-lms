<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['name', 'slug', 'rnc', 'url', 'content', 'user_id', 'status', 'is_partnership'];
    protected $withCount = ['programs'];

    /**
     * The attributes that should be mutated to dates
     */
    protected $dates = [
        'deleted_at'
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

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

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    /**
     * N:M
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }

    // Has many through
    public function platforms()
    {
        return $this->hasManyThrough(Platform::class, Program::class);
    }
}
