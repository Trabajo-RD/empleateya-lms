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
        'partner_id',
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
        // return $this->hasMany('App\Models\Course');
        return $this->hasMany(Course::class);
    }

    /**
     * Relation 1:N Reverse
     */
    public function partner()
    {
        // return $this->belongsTo('App\Models\Partner');
        return $this->belongsTo(Partner::class);
    }
}
