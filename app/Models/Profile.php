<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    use HasFactory;

    /**
     * Relation 1:1 reverse
     */

    /**
     * Inverse Relationship let us access the user that owns the profile
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
