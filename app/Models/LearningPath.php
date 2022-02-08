<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningPath extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISH = 3;
    const TRASH = 4;


    /**
     * 1:N
     */

    // learning path courses
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }

    /**
     * 1:N inverse
     */

     // retrieve the record of the user who created the learning path
    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // returns the record of the organization to which a learning path belongs
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    // retorna el tipo de publicación, por defecto es ruta de aprendizaje
    public function type()
    {
        return $this->belongsTo(Type::class);
    }    

    /**
     * N:M
     */
    // recupera los usuarios registrados en una ruta de aprendizaje
    public function participants()
    {
        return $this->belongsToMany(User::class);
    }

    // filter learning paths by profession
    public function professions()
    {
        return $this->belongsToMany(Profession::class);
    }

    // filter learning paths by tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // filter learning paths by levels
    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }
}
