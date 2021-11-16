<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'summary',
        'is_required',
        'start_at',
        'end_at',
        'time_limit',
        'status',
        'handle_time_over',
        'grace_period',
        'attempts',
        'grade_method',
        'nav_method',
        'password',
        'sub_net',
        'browser_security'
    ];

    /**
     * Relation 1:N
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Relation 1:N reverse
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     *
     */

    /**
     * Relation N:M
     */
    public function test_students()
    {
        return $this->belongsToMany(User::class);
    }
}
