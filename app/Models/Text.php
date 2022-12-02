<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use HasFactory;

    const PRIVATE = 'private';
    const PUBLIC = 'public';

    protected $guarded = ['id'];

    protected $fillable = [
        'title', 'subtitle', 'content', 'visibility'
    ];
}
