<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * N:M
     */

    // recovers the learning paths associated with a profession
    public function learning_paths()
    {
        return $this->belongsToMany(LearningPath::class);
    }
}
