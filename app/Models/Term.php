<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    const HIDDEN = 1;
    const VISIBLE = 2;

    protected $guarded = ['id'];
    // protected $withCount = ['tags'];

    protected $fillable = [
        'name',
        'description'
    ];

    // N:M polymorphic

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
