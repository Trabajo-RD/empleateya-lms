<?php

namespace App\Models;

use App\Scopes\PublishScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Workshop extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        // static::addGlobalScope(new PublishScope);
    }


    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISH = 3;
    const TRASH = 4;
    const INITIATED = 5;
    const FINALIZED = 6;

    protected $guarded = ['id'];
    // protected $withCount = ['users', 'reviews', 'activities', 'tasks'];
    protected $withCount = ['users', 'reviews'];

    /**
     * The attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'end_date'
    ];

    protected $fillable = [
        'uid',
        'title',
        'subtitle',
        'summary',
        'description',
        'url',
        'duration_in_minutes',
        'status',
        'slug',
        'required_min_age',
        'required_max_age',
        'audience',
        'start_date',
        'end_date',
        'location',
        'include_certificate',
        'user_id',
        'program_id',
        'price_id',
        'modality_id',
        'type_id',
        'language_id',
        'topic_id',
    ];

    /*****************
     *    STATES
     *****************/

    /**
     * Return all workshops in publish status
     */
     public static function published()
     {
         $allWorkshops = Workshop::get();
         $publishedWorkshops = $allWorkshops->where('status', self::PUBLISH);
         return $publishedWorkshops;
     }

     /**
      * Return all workshops in draft status
      */
     public static function drafted()
     {
         $allWorkshops = Workshop::get();
         $draftedWorkshops = $allWorkshops->where('status', self::DRAFT);
         return $draftedWorkshops;
     }


    /******************
     *   ATTRIBUTES
     ******************/


    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * Return the workshop path rating.
    */
    public function getRatingAttribute()
    {
        if($this->reviews_count)
        {
            return round($this->reviews->avg('rating'), 1);
        } else {
            return 5;
        }
    }

    /**
     * Determines if a workshop has already been started
     */
    // public function getStartedAttribute()
    // {
    //     $workshop = DB::table('workshops')
    //         ->where(DB::raw('now()'), '>=', DB::raw('start_date'))
    //         ->get();

    //     if($workshop){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    /**
     * Return workshop complete status
     *
     * @return boolean
     */
    public function getCompletedAttribute()
    {
        $workshop = DB::table('workshop_user')
            ->select('workshop_user.status')
            ->where('workshop_user.user_id', auth()->user()->id)
            ->where('workshop_user.workshop_id', $this->id)
            ->first();

        if($workshop->status == 1){
            return true;
        } else {
            return false;
        }
    }

    /******************
     *    HELPERS
     ******************/

    /**
     * Return Carbon format course start date with localization
     */
    public function getWorkshopStartDateAttribute()
    {
        $months = array("January","February","March","April","May","June","July","August","September","October","November","December");
        $date = Carbon::parse($this->start_date);
        $month = $months[($date->format('n')) - 1];

        $locale = \App::getLocale();

        switch ($locale) {
            case 'es':
                $date = $date->format('d') . __(' de ') . __($month) . ', ' . $date->format('Y');
                break;
            case 'en':
                $date =  __($month) . ' ' . $date->format('d') .  ', ' . $date->format('Y');
                break;
            default:
                break;
        }

        return $date;
    }

    /**
     * Return the workshop summary excerpt
     *
     * @param string $length
     */
    public function excerpt($length)
    {
        return Str::limit($this->summary, $length);
    }


    /******************
     *   QUERY SCOPES
     ******************/



    public function scopeModality($query, $modality_id)
    {
        if ($modality_id)
        {
            return $query->where('modality_id', $modality_id);
        }
    }

    public function scopeTopic($query, $topic_id){
        if ($topic_id) {
            return $query->where('topic_id', $topic_id);
        }
    }

    public function scopeProgram($query, $program_id)
    {
        if($program_id)
        {
            return $query->where('program_id', $program_id);
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

    public function scopeStarted()
    {
        $workshop =  $this::whereDate('start_date', '<=', Carbon::today());

        if($workshop){
            return true;
        } else {
            return false;
        }
    }

    /*****************
     * RELATIONSHIPS
     *****************/

    /**
     * 1:N inverse
     */
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function price(){
        return $this->belongsTo(Price::class);
    }

    public function modality(){
        return $this->belongsTo(Modality::class);
    }

    public function program(){
        return $this->belongsTo(Program::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function learning_path()
    {
        return $this->belongsTo(LearningPath::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Return workshop topic
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * N:M
     */
    public function users(){
        return $this->belongsToMany(User::class, 'workshop_user' );
    }

    public function activities() : BelongsToMany {
        return $this->belongsToMany(
            Activity::class,
            'workshop_has_activities',
            'workshop_id',
            'activity_id'
        );
    }

    //----------------- 1:N ---------------//

    /**
     * Return workshop abilities
     */
    public function abilities() : HasMany
    {
        return $this->hasMany(Ability::class);
    }

    /**
     * Return workshop attitudes
     */
    public function attitudes() : HasMany
    {
        return $this->hasMany(Attitude::class);
    }

    // public function activities() : HasMany
    // {
    //     return $this->hasMany(Activity::class);
    // }

    public function reactions() : HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    //------------- 1:N Polymorphic ------------//

    /**
     * Return workshop reviews
     */
    public function reviews() : MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Return workshop comments
     */
    public function comments() : MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    //------------- 1:1 Polymorphic -------------//

    /**
     * Return workshop image
     */
    public function image() : MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Return workshop single comment
     */
    public function comment() : MorphOne
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    //------------- HasManyThrough -------------//

    // public function tasks() : HasManyThrough
    // {
    //     return $this->hasManyThrough(Task::class, Activity::class);
    // }

    //------------- N:M polymorphic -------------//

    /**
     * Return workshop tags
     */
    public function tags() : MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
