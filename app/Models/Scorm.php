<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Scorm extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['title', 'slug', 'summary', 'origin_file','data_from_lms', 'version', 'ratio', 'uuid', 'identifier', 'entry_url', 'data'];

    public function scormable() {
        return $this->morphTo();
    }

    /**
     * Return the associated image
     *
     * @return void
     */
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getRouteKeyName() {
        return 'slug';
    }


}
