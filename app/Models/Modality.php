<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    use HasFactory;

    // Guarded: do not allow massive income
    protected $guarded = ['id'];

    protected $fillable = ['name', 'slug', 'icon', 'description' ];

    // Return the slug, not id

    public function getRouteKeyName(){
        return "slug";
    }

    const E_LEARNING = 'E-learning';
    const B_LEARNING = 'Mixta';
    const M_LEARNING = 'M-learning';
    const PRESENCIAL = 'Presencial';


    /**
     * Relation 1:N
     */
    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function learning_paths()
    {
        return $this->hasMany(LearningPath::class);
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }
}
