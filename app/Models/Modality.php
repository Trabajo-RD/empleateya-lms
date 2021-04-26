<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    protected $fillable = [
        'name'
    ];

    use HasFactory;

    const E_LEARNING = 'E-learning';
    const B_LEARNING = 'Mixta';
    const M_LEARNING = 'M-learning';
    const PRESENCIAL = 'Presencial';

    /**
     * Relation 1:N
     */
    public function course(){
        return $this->hasMany('App\Models\Course');
    }

    public function categories(){
        return $this->hasMany('App\Models\Category');
    }
}
