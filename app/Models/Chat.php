<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];

    // Relation N:M
    public function users(){
        return $this->belongsToMany(User::class);
    }

    // Relation 1:N
    public function messages(){
        return $this->hasMany(Message::class);
    }
}
