<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

// Relations
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Unit extends Model
{
    use HasFactory;

    const TYPE = 3; // type "Unit"

    // protected static function boot()
    // {
    //     parent::boot();

    //     // Log DB transactions in local environment only
    //     if(app()->environment(['local'])){

    //         static::creating(function ($item) {
    //             Log::info("Unit.CREATING... " . $item);
    //         });

    //         static::created(function($item){
    //             Log::info("Unit.CREATED: " . $item);
    //         });

    //         static::updating(function($item){
    //             Log::info("Unit.UPDATING... " . $item);
    //         });

    //         static::updated(function($item){
    //             Log::info("Unit.UPDATED: " . $item);
    //         });

    //         static::deleting(function($item){
    //             Log::info("Unit.DELETING... ". $item);
    //         });

    //         static::deleted(function($item){
    //             Log::info("Unit.DELETED: " . $item);
    //         });

    //         static::saving(function($item){
    //             Log::info("Unit.SAVING... " . $item);
    //         });

    //         static::saved(function($item){
    //             Log::info("Unit.SAVED: " . $item);
    //         });

    //     }
    // }

    protected $guarded = ['id'];
    protected $fillable = ['uid', 'title', 'slug', 'summary', 'url', 'iframe', 'duration_in_minutes', 'type_id', 'language_id'];

    // Attributes

    /**
     * Confirma si una unidad está marcada como completada
     */
    public function getCompletedAttribute()
    {
        return $this->users->contains( auth()->user()->id );
    }

    /*******************
     *  RELATIONSHIPS
     *******************/

    // 1:N -------------------------------------------

    /**
     * returns the module to which the unit belongs
     */
    public function modules() : BelongsToMany
    {
        return $this->belongsToMany(
            Module::class,
            'module_has_unit',
            'unit_id',
            'module_id'
        );
    }

    /**
     * returns the platform to which the unit belongs
     */
    // public function platform() : BelongsTo
    // {
    //     return $this->belongsTo(Platform::class);
    // }

    public function language() : BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    // N:M Relationships

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'unit_user');
    }

    // N:M polymorphic

}
