<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'score',
        'correct',
        'incorrect',
        'incomplete',
        'status'
    ];

    /**
     * Relation 1:1
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withPivot(['answer_id', 'points']);
    }
}
