<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'answer_text',
        'answer_value'
    ];

    /**
     * Relation 1:N reverse
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    /**
     * Relation N:M
     */
    public function students()
    {
        return $this->belongsToMany(User::class);
    }
}
