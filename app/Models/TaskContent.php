<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskContent extends Model
{
    use HasFactory;

    // status
    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISHED = 3;
    const TRASHED = 4;

    // visibility
    const PRIVATE = 'private';
    const PUBLIC = 'public';

    protected $guarded = ['id'];

    protected $fillable = ['title', 'name', 'slug', 'type', 'lesson_id', 'status', 'visibility'];
}
