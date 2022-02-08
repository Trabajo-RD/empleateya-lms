<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningPath extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISH = 3;
    const TRASH = 4;
}
