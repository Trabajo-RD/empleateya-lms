<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * 1:N inverse
     */
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * N:M
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
