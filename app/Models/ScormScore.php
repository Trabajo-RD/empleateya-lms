<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScormScore extends Model
{
    use HasFactory;

    protected $table = "scorm_scores";

    protected $guarded = ['id'];

    protected $fillable = [
        'scorm_id', 'uuid', 'sco_parent_id', 'entry_url', 'identifier', 'title', 'visible', 'sco_parameters', 'launch_data', 'max_time_allowed', 'time_limit_action', 'block', 'score_int', 'score_decimal', 'completion_threshold', 'prerequisites'
    ];

    public function scorm() {
        return $this->belongsTo(Scorm::class, 'scorm_id', 'id');
    }

    public function scoreTrackings() {
        return $this->hasMany(ScormScoreTracking::class, 'scorm_score_id', 'id');
    }

    public function children() {
        return $this->hasMany(ScormScore::class, 'sco_parent_id', 'id');
    }
}
