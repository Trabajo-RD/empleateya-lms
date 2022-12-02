<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'description',
        'responsible_name',
        'responsible_position',
        'document_id_required',
        'adult_required',
        'organization_id',
        'slug',
    ];

    // Return the slug, not id
    public function getRouteKeyName(){
        return "slug";
    }

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

    public function platforms()
    {
        return $this->hasMany(Platform::class);
    }

    /**
     * Relation 1:N Reverse
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
