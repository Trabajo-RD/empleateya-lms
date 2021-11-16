<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'question_text',
        'question_type',
        'test_id',
    ];

    /**
     * Relation 1:N
     */
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    /**
     * Relation 1:N Reverse
     */
    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

    /**
     * Relation N:M
     */
    public function results()
    {
        return $this->belongsToMany(Result::class);
    }
}
