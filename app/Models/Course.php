<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;

    // Guarded: do not allow massive income

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'subtitle',
        'summary',
        'url',
        'duration_in_minutes',
        'status',
        'slug',
        'user_id',
        'moderator_id',
        'contributor_id',
        'level_id',
        'category_id',
        'price_id',
        'type_id',
        'modality_id',
        'topic_id',
        'audience',
        'start_date',
        'end_date',
        'language_id',
    ];

    protected $withCount = ['students', 'reviews']; // add attr students_count to Course Model

    const DRAFT = 1;
    const PENDING = 2;
    const PUBLISH = 3;
    const TRASH = 4;

    public static function getCourses()
    {

        $record = DB::table('courses')
            ->join('users', 'courses.user_id', '=', 'users.id')
            ->join('levels', 'courses.level_id', '=', 'levels.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->join('types', 'courses.type_id', '=', 'types.id')
            ->join('modalities', 'courses.modality_id', '=', 'modalities.id')
            ->select(
                'courses.title AS Título',
                'courses.summary AS Descripción',
                'courses.url AS Url',
                'courses.duration_in_minutes AS Duración',
                'courses.status AS Status',
                DB::raw("CONCAT(users.name, ' ', users.lastname) AS Usuario"),
                // 'users.name AS Nombre',
                // 'users.lastname AS Apellidos',
                'levels.name AS Nivel',
                'categories.name AS Categoría',
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
                'categories.name',
                'types.name',
                'modalities.name'
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
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->join('types', 'courses.type_id', '=', 'types.id')
            ->join('modalities', 'courses.modality_id', '=', 'modalities.id')
            ->select(
                'courses.title AS Título',
                'courses.summary AS Descripción',
                'courses.url AS Url',
                'courses.duration_in_minutes AS Duración',
                'courses.status AS Status',
                DB::raw("CONCAT(users.name, ' ', users.lastname) AS Usuario"),
                // 'users.name AS Nombre',
                // 'users.lastname AS Apellidos',
                'levels.name AS Nivel',
                'categories.name AS Categoría',
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
                'categories.name',
                'types.name',
                'modalities.name'
            )
            ->orderBy('courses.title', 'asc')
            ->get()
            ->toArray();

        return $record;
    }


    public static function search($query)
    {

        return empty($query) ? static::query()
            : static::where('courses.status', 3)

            ->where('courses.title', 'LIKE', '%' . $query . '%')
            ->where('sections.name', 'LIKE', '%' . $query . '%')
            ->where('courses.status', '=', 3);
        //->where('lessons.name', 'LIKE', '%' . $query . '%');
        // ->where(function($q){
        //     $q->where('courses.status', 3);
        // });
        //->orWhere('lessons.name', 'LIKE', '%' . $query . '%');

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


    // TODO: return true if user complete the course
    public function getCompletedAttribute()
    {

        $course = DB::table('course_user')
            ->select(
                'course_user.status'
            )
            ->where('course_user.user_id', auth()->user()->id)
            ->where('course_user.course_id', $this->id)
            ->first();

        // return $course->status;

        if ($course->status == 1) {
            return true;
        } else {
            return false;
        }
    }





    // Query Scopes
    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }

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

    public function scopeLanguage($query, $language_id){
        if($language_id){
            return $query->where('language_id', $language_id);
        }
    }

    // Return the slug, not id
    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * Relation 1:1
     */
    public function observation()
    {
        return $this->hasOne('App\Models\Observation');
        //return $this->hasMany('App\Models\Observation');
    }

    /**
     * Relation 1:N
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function audiences()
    {
        return $this->hasMany('App\Models\Audience');
    }

    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    /**
     * Relation 1:N reverse
     */
    public function language(){
        return $this->belongsTo(Language::class);
    }
    public function editor()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function type()
    {
        // return $this->belongsTo('App\Models\Type');
        return $this->belongsTo(Type::class);
    }

    public function category()
    {
        // return $this->belongsTo('App\Models\Category');
        return $this->belongsTo(Category::class);
    }

    public function topic()
    {
        // return $this->belongsTo('App\Models\Topic');
        return $this->belongsTo(Topic::class);
    }

    public function modality()
    {
        // return $this->belongsTo('App\Models\Modality');
        return $this->belongsTo(Modality::class);
    }

    public function level()
    {
        // return $this->belongsTo('App\Models\Level');
        return $this->belongsTo(Level::class);
    }

    public function price()
    {
        // return $this->belongsTo('App\Models\Price');
        return $this->belongsTo(Price::class);
    }

    /**
     * Relation N:M
     *
     * return all enrolled students in any course
     */
    public function students()
    {
        // return $this->belongsToMany('App\Models\User');
        return $this->belongsToMany(User::class);
    }

    public function tags()
    {
        // return $this->belongsToMany('App\Models\Tag');
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Relation 1:1 Polymorphic
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    // Relation Course : Lessons
    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Section::class);
    }
}
