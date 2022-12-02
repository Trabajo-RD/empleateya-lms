<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScormScoreTracking extends Model
{
    use HasFactory;

    protected $table = "scorm_score_trackings";

    protected $guarded = ['id'];

    protected $fillable =   [
        'user_id',
        'scorm_score_id',
        'uuid',
        'progression',
        'score_raw',
        'score_min',
        'score_max',
        'score_scaled',
        'lesson_status',
        'completion_status',
        'session_time',
        'total_time_int',
        'total_time_string',
        'entry',
        'suspend_data',
        'credit',
        'exit_mode',
        'lesson_location',
        'lesson_mode',
        'is_locked',
        'details',
        'latest_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'details'        => 'array',
    ];

    public function score() : BelongsTo {
        return $this->belongsTo(ScormScore::class, 'scorm_score_id', 'id');
    }
}
