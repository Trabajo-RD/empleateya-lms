<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISHED = 3;
    const TRASHED = 4;

    const PRIVATE = 'private';
    const PUBLIC = 'public';

    protected $guarded = ['id'];

    protected $fillable = ['name', 'title', 'description', 'status', 'visibility'];
}
