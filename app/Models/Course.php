<?php

namespace App\Models;

use App\Scopes\PublishScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Course extends Model
{
    use HasFactory;

    // protected static function boot()
    // {
    //     parent::boot();

    //     // static::addGlobalScope(new PublishScope);
    // }

    // Guarded: do not allow massive income

    protected $guarded = ['id'];
    protected $withCount = ['users', 'workshops', 'sections', 'lessons', 'reviews', 'image']; // add attr students_count to Course Model


    /**
     * The attributes that should be mutated to dates
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'title', 'subtitle', 'summary', 'url', 'duration_in_minutes', 'status', 'slug', 'user_id', 'level_id', 'price_id', 'type_id', 'modality_id', 'topic_id', 'audience', 'start_date', 'end_date', 'program_id', 'language_id'
    ];

    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISH = 3;
    const TRASH = 4;
    const INITIATED = 5;
    const FINALIZED = 6;



    // Return the slug, not id
    public function getRouteKeyName()
    {
        return "slug";
    }


    /*****************
     *    STATES
     *****************/

    /**
     * Return all courses in publish status
     */
    public static function published()
    {
        $allCourses = Course::get();
        $publishedCourses = $allCourses->where('status', self::PUBLISH);
        return $publishedCourses;
    }


    /******************
     *    HELPERS
     ******************/


    /**
     * Return Carbon format course start date with localization
     */
    public function getCourseStartDateAttribute()
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



    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }

    // public function getUpdatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    // }

    /**
     * Return top 10 reviewers courses
     */
    public function topRatedCourses()
    {
       return $this->reviews()
       ->selectRaw('avg(rating) as average, reviewable_id')
       ->groupBy('reviewable_id');
    }


    public static function getCourses()
    {

        $record = DB::table('courses')
            ->join('users', 'courses.user_id', '=', 'users.id')
            ->join('levels', 'courses.level_id', '=', 'levels.id')
            ->join('types', 'courses.type_id', '=', 'types.id')
            ->join('modalities', 'courses.modality_id', '=', 'modalities.id')
            ->join('languages', 'courses.language_id', '=', 'languages.id')
            ->select(
                'courses.title AS Título',
                'courses.summary AS Descripción',
                'courses.url AS Url',
                'courses.duration_in_minutes AS Duración',
                'courses.status AS Status',
                DB::raw("CONCAT(users.name, ' ', users.lastname) AS Usuario"),
                'levels.name AS Nivel',
                'types.name AS Tipo',
                'modalities.name AS Modalidad'
            )
            ->groupBy(
                'courses.title',
                'courses.summary',
                'courses.url',
                'courses.duration_in_minutes',
                'courses.status',
                'users.name',
                'users.lastname',
                'levels.name',
                'types.name',
                'modalities.name',
                'languages.name',
            )
            ->orderBy('courses.title', 'asc')
            ->get()
            ->toArray();

        return $record;
    }


    public static function getPublishedCourses()
    {

        $record = DB::table('courses')
            ->join('users', 'courses.user_id', '=', 'users.id')
            ->join('levels', 'courses.level_id', '=', 'levels.id')
            ->join('types', 'courses.type_id', '=', 'types.id')
            ->join('modalities', 'courses.modality_id', '=', 'modalities.id')
            ->join('languages', 'courses.language_id', '=', 'languages.id')
            ->select(
                'courses.title AS Título',
                'courses.summary AS Descripción',
                'courses.url AS Url',
                'courses.duration_in_minutes AS Duración',
                'courses.status AS Status',
                DB::raw("CONCAT(users.name, ' ', users.lastname) AS Usuario"),
                'levels.name AS Nivel',
                'types.name AS Tipo',
                'modalities.name AS Modalidad'
            )
            ->where('courses.status', 3)
            ->groupBy(
                'courses.title',
                'courses.summary',
                'courses.url',
                'courses.duration_in_minutes',
                'courses.status',
                'users.name',
                'users.lastname',
                'levels.name',
                'types.name',
                'modalities.name',
                'languages.name',
            )
            ->orderBy('courses.title', 'asc')
            ->get()
            ->toArray();

        return $record;
    }


    // public static function search($query)
    // {

    //     return empty($query) ? static::query()
    //         : static::where('courses.title', 'LIKE', '%' . $query . '%')
    //         ->where('sections.name', 'LIKE', '%' . $query . '%');
    // }

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
                return 'images/badges/beginner.svg';
                break;
        }
    }

    // TODO: return true if user complete the course
    // public function getCourseCompletedAttribute()
    // {

    //     $course = DB::table('course_user')
    //         ->select(
    //             'course_user.status'
    //         )
    //         ->where('course_user.user_id', auth()->user()->id)
    //         ->where('course_user.course_id', $this->id)
    //         ->first();

    //     // return $course->status;

    //     if ($course->status == 1) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    /***********************
     *    QUERY SCOPES
     ***********************/

     // TODO: Create filter function ot livewire filter courses
    // public function scopeFilter($query, $params)
    // {
    //     // dd($params);

    //     // if( isset($params['level']) && trim($params['level'] !== '' ))
    //     // {
    //     //     $query->where('levels.name', 'LIKE', $params['level'] . '%')->join('levels', 'courses.level_id', '=', 'levels.id');
    //     // }

    //     // if( isset($params['modality']) && trim($params['modality'] !== '' ))
    //     // {
    //     //     $query->where('modalities.name', 'LIKE', $params['modality'] . '%')->join('modalities', 'courses.modality_id', '=', 'modalities.id');
    //     // }

    //     return $query;
    // }



    /**************************
     *    QUERY SCOPE
     **************************/

    // public function scopeCategory($query, $category_id){
    //     if($category_id){
    //         return $query->where('category_id', $category_id);
    //     }
    // }

    public function scopeTopic($query, $topic_id)
    {
        if ($topic_id) {
            return $query->where('topic_id', $topic_id);
        }
    }


    public function scopeType($query, $type_id)
    {
        if ($type_id) {
            return $query->where('type_id', $type_id);
        }
    }

    /**
     * Filter results by level(level_id)
     */
    public function scopeLevel($query, $level_id)
    {
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }

    public function scopeModality($query, $modality_id)
    {
        if ($modality_id) {
            return $query->where('modality_id', $modality_id);
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
        if ($program_id) {
            return $query->where('program_id', $program_id);
        }
    }

    public function scopePrice($query, $price_id)
    {
        if ($price_id) {
            return $query->where('price_id', $price_id);
        }
    }

    /**************************
     *    RELATIONSHIPS
     **************************/

    //-------------- 1:1---------------//

    /**
     * Return course observation
     */
    public function observation() : HasOne
    {
        return $this->hasOne(Observation::class);
    }

    //-------------- 1:N --------------//

    public function audiences() : HasMany
    {
        return $this->hasMany(Audience::class);
    }

    /**
     * Return course goals
     */
    public function goals() : HasMany
    {
        return $this->hasMany(Goal::class);
    }

    /**
     * Return course requirements
     */
    public function requirements() : HasMany
    {
        return $this->hasMany(Requirement::class);
    }

    /**
     * Return course sections
     */
    public function sections() : HasMany
    {
        return $this->hasMany(Section::class);
    }

    /**
     * Return course workshops
     */
    public function workshops() : HasMany
    {
        return $this->hasMany(Workshop::class);
    }

    public function tests() : HasMany
    {
        return $this->hasMany(Test::class);
    }

    public function certificates() : HasMany
    {
        return $this->hasMany(Certificate::class);
    }

    public function reactions() : HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    /**
     * Relation 1:N reverse
     */
    // public function language(){
    //     return $this->belongsTo(Language::class);
    // }

    /**
     * Return course dictated user
     */
    public function editor() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return the organization to which that course belongs
     */
    public function organization() : BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Return the course type
     */
    public function type() : BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Return course topic
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * Return course modality
     */
    public function modality() : BelongsTo
    {
        return $this->belongsTo(Modality::class);
    }

    /**
     * Return course language
     */
    public function language() : BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Return course level
     */
    public function level() : BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * Return course price
     */
    public function price() : BelongsTo
    {
        return $this->belongsTo(Price::class);
    }

    /**
     * Return course program
     */
    public function program() : BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    //----------------- N:M -----------------//

    /**
     * Return course enrolled users
     */
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'course_user',
            'course_id',
            'user_id'
        );
    }

    /**
     * Return all course contributors users
     */
    // public function contributors() : BelongsToMany
    // {
    //     return $this->belongsToMany(User::class, 'course_user', 'course_id', 'contributor_id');
    // }

    //-------------- 1:1 Polymorphic --------------//


    /**
     * Return course image
     */
    public function image() : MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Return course single comment
     */
    public function comment() : MorphOne
    {
        return $this->morphOne(Comment::class, 'commentable')
        ->latest();
    }

    //----------- 1:N Polymorphic -------------//

    /**
     * Return course reviews
     */
    public function reviews() : MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Return course comments
     */
    public function comments() : MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    //----------- HasOneThrough --------------//

    /**
     * Return course category
     */
    public function category() : HasOneThrough
    {
        return $this->hasOneThrough(Category::class, Topic::class);
    }

    //------------ HasManyThrough ----------//

    /**
     * Return course lessons
     */
    public function lessons() : HasManyThrough
    {
        return $this->hasManyThrough(
            Lesson::class, Section::class,
            'course_id',
            'section_id');
    }

    //------------ N:M polymorphic -------------//

    /**
     * Return course tags
     */
    public function tags() : MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


}
