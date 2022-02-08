<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'code',
        'name',
    ];

    /**
     * N:M Relationship
     */
    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public function workshops(){
        return $this->belongsToMany(Workshop::class);
    }


}
