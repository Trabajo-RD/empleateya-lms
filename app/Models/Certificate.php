<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'certificate_number',
    //     'url',
    //     'date',
    //     'responsible_name',
    //     'responsible_position',
    //     'user_id',
    //     'course_id',
    //     'program_id',
    //     'partner_id',
    // ];

    /**
     * Relation 1:N reverse
     */
    // public function course(){
    //     return $this->belongsTo(Course::class);
    // }

    public function certificateable(){
        return $this->morphTo();
    }

}
