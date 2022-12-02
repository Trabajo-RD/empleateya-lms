<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Module extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCount = ['units', 'reviews'];
    protected $fillable = ['uid', 'title', 'subtitle', 'summary', 'url', 'duration_in_minutes',  'status', 'slug', 'user_id', 'level_id', 'topic_id', 'price_id', 'type_id', 'modality_id', 'language_id', 'program_id'];

    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISH = 3;
    const TRASH = 4;
    const INITIATED = 5;
    const FINALIZED = 6;

    /***************************
     *    LOG TRANSACTIONS
     ***************************/

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($item){
    //         Log::info("[CREATING] Creando el Modulo: ".$item);
    //     });
    //     static::created(function($item){
    //         Log::info("[CREATED] Modulo creado: ".$item);
    //     });
    // }

    /**
     * Obtener la informacion de si el modulo esta marcado como culminado
     *
     * @return bool
     */
    public function getCompletedAttribute(){
        return $this->users->contains( auth()->user()->id );
    }

    /***************************
     *       QUERY SCOPE
     ***************************/

    public function scopeTopic($query, $topic_id)
    {
        if( $topic_id )
        {
            $query->where('topic_id', $topic_id);
        }
    }

    /***************************
     *         HELPERS
     ***************************/

    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * New Attributes
     */
    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        } else {
            return 5;
        }
    }

    /**
     * Convert course duration in minutes to hours
     */
    public function getHoursAttribute()
    {
        $minutes = $this->duration_in_minutes;
        $hours = intval($minutes / 60 );

        if($hours != 1)
            return $hours . ' ' . __('Hours');
        else {
            return $hours . ' ' . __('Hour');
        }
    }

    /**
     * Return the level SVG badge image
     */
    public function getLevelBadge()
    {
        $level = $this->level;

        switch ($level->id){
            case 1:
                return 'images/badges/beginner.svg';
                break;
            case 2:
                return 'images/badges/intermediate.svg';
                break;
            case 3:
                return 'images/badges/advanced.svg';
                break;
            default:
                return 'images/badges/beginner.svg';
                break;
        }
    }

    /**
     * Returns the distribution of the time you can dedicate to a course
     */
    public function getLearningTimePerWeek()
    {
        $time = $this->duration_in_minutes;

        switch ($time) {
            case ($time <= 60):
                $time = $time / 7; // minutes a week
                return intval($time) . ' ' . __('min/week');
                break;
            case ($time > 60 && $time < 2880):
                $time = ($time / 7) / 60; // minutes per 1 week / 60 = hours per week
                if($time > 1){
                    return intval($time) . ' ' . __('hours/week');
                } else {
                    return intval($time) . ' ' . __('hour/week');
                }
                break;
            default:
                $time = ($time / 30) / 60; // minutes per 1 week / 60 = hours per week
                if($time > 1){
                    return intval($time) . ' ' . __('hours/day');
                } else {
                    return intval($time) . ' ' . __('hour/day');
                }
                break;
        }
    }


    /***************************
     *      RELATIONSHIPS
     ***************************/

    // 1:N ------------------------------------------

    /**
     * Return all module units
     */
    public function units() : BelongsToMany {
        return $this->belongsToMany(
            Unit::class,
            'module_has_unit',
            'module_id',
            'unit_id'
        );
    }

    //--------------- 1:N Inverse ---------------//

    /**
     * Return module learning path
     */
    public function learning_paths() : BelongsToMany
    {
        return $this->belongsToMany(
            LearningPath::class,
            'learning_path_has_module',
            'module_id',
            'learning_path_id'
        );
    }

    /**
     * Return module language
     */
    public function language() : BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Return module type
     */
    public function type() : BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Return module price
     */
    public function price() : BelongsTo
    {
        return $this->belongsTo(Price::class);
    }

    /**
     * Return module dictated user
     */
    public function instructor() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function level() : BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function topic() : BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    //-------------- N:M polymorphic -------------//

    /**
     * Return module enrolled users
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'module_user');
    }

    //-------------- 1:1 polymorphic -------------//

    /**
     * Return module image
     */
    public function image() : MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    //-------------- 1:N polymorphic --------------//

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }


}
