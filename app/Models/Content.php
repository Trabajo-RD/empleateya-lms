<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Content extends Model
{
    use HasFactory;

    const HIDDEN = 0;
    const VISIBLE = 1;

    protected $guarded = ['id'];

    protected $fillable = ['lesson_id', 'unit_id', 'task_id', 'order', 'visibility'];

    public function contentable() : MorphTo {
        return $this->morphTo();
    }
}
