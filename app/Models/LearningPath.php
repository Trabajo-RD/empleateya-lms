<?php

namespace App\Models;

use App\Scopes\PublishScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LearningPath extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCount = ['modules', 'users', 'reviews'];

    // const
    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISH = 3;
    const TRASH = 4;

    const EXCERPT_LENGTH = 75;

    protected $fillable = ['uid', 'title', 'subtitle', 'slug', 'summary', 'duration_in_minutes', 'user_id', 'language_id', 'topic_id', 'type_id', 'modality_id', 'level_id', 'program_id'];

    /**
     * The attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**************************
     *   LOG TRANSACTIONS
     **************************/

    public static function boot()
    {
        parent::boot();

        // static::addGlobalScope(new PublishScope);

        // Log transactions in local environment only
        // if(app()->environment(['local'])){
        //     static::creating(function($item){
        //         Log::info("[CREATING] Creando Learning Path " . $item);
        //     });

        //     static::created(function($item){
        //         Log::info("[CREATED] Learning Path creado " . $item);
        //     });
        // }
    }


    /******************
     *    STATES
     ******************/

    public static function published()
    {
        $allLearningPaths = LearningPath::get();
        $publishedLearningPaths = $allLearningPaths->where('status', self::PUBLISH);
        return $publishedLearningPaths;
    }

    /******************
     *   ATTRIBUTES
     ******************/

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function getShortTitleAttribute()
    {
        return Str::limit($this->title, 75, '...');
    }

     /**
      * Return the learning path rating.
      */
    public function getRatingAttribute()
    {
        if($this->reviews_count)
        {
            return round($this->reviews->avg('rating'), 1);
        } else
        {
            return 5;
        }
    }

    /**
     * Return learning path complete status
     *
     * @return  boolean
     */
    public function getCompletedAttribute()
    {
        $path = DB::table('learning_path_user')
            ->select('learning_path_user.status')
            ->where('learning_path_user.user_id', auth()->user()->id)
            ->where('learning_path_user.learning_path_id', $this->id)
            ->first();

            if($path->status == 1){
                return true;
            } else {
                return false;
            }
    }

    /******************
     *    HELPERS
     ******************/

    /**
     * Return the learning path summary excerpt
     */
    public function excerpt()
    {
        return Str::limit($this->summary, self::EXCERPT_LENGTH);
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
     * Returns the distribution of the time you can dedicate to a course
     */
    public function getLearningTimePerWeek()
    {
        $time = $this->duration_in_minutes;

        switch ($time) {
            case ($time <= 1680):
                $time = $time / 7; // minutes a week
                return intval($time) . ' ' . __('min/week');
                break;
            case ($time > 1680 && $time < 2880):
                $time = ($time / 7) / 60 * 100; // minutes per 1 week / 60 = hours per week
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

    /**
     * Return the level SVG badge image
     */
    public function getLevelBadge()
    {
        $level = $this->level;

        switch ($level->id) {
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
                break;
        }
    }



    /*************************
     *   QUERY SCOPES
     *************************/

    public function scopeModality($query, $modality_id)
    {
        if($modality_id)
        {
            return $query->where('modality_id', $modality_id);
        }
    }

    public function scopeTopic($query, $topic_id) {
        if($topic_id){
            return $query->where('topic_id', $topic_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if($level_id)
        {
            return $query->where('level_id', $level_id);
        }
    }

    public function scopePrice($query, $price_id)
    {
        if($price_id)
        {
            return $query->where('price_id', $price_id);
        }
    }

    public function scopeLanguage($query, $language_id)
    {
        if($language_id)
        {
            return $query->where('language_id', $language_id);
        }
    }

    public function scopeProgram($query, $program_id)
    {
        if($program_id)
        {
            return $query->where('program_id', $program_id);
        }
    }

    /**
     * 1:N
     */

    // learning path modules
    // public function modules()
    // {
    //     return $this->hasMany(Module::class);
    // }


    /**
     * 1:N inverse
     */

     // retrieve the record of the user who created the learning path
    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    // returns the record of the organization to which a learning path belongs
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // retorna el tipo de publicación, por defecto es ruta de aprendizaje
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    /**
     * Return learning path topic
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * N:M
     */
    // recupera los usuarios registrados en una ruta de aprendizaje
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function modules() : BelongsToMany {
        return $this->belongsToMany(
            Module::class,
            'learning_path_has_module',
            'learning_path_id',
            'module_id'
        );
    }

    // filter learning paths by profession
    public function professions() : BelongsToMany
    {
        return $this->belongsToMany(
            Profession::class,
            'learning_path_has_professions',
            'profession_id',
            'learning_path_id'
        );
    }

    public function products() : BelongsToMany {
        return $this->belongsToMany(
            Product::class,
            'learning_path_has_products',
            'product_id',
            'learning_path_id'
        );
    }

    // filter learning paths by levels
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    //------------- 1:1 polymorphic --------------//

    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    /**
     * Access to learning path image
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Relation 1:N Polymorphic
     */
    public function reviews(){
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    // Has many through ------------------------------------

    public function units()
    {
        return $this->hasManyThrough(Unit::class, Module::class);
    }

    // N:M polymorphic

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


}
