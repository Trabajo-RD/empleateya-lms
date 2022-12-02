<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

// Laravel Permission
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasRoles;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    //const IDENTITY = 'CED';
    //const PASSPORT = 'PAS';

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'document_id',
        'document_type',
        'gender',
        'email',
        'phone',
        'mobile',
        'options',
        'profile_visibility',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'options' => 'array'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The attributes that should be mutated to dates
     */
    protected $dates = [
        'last_login',
        'terms_acceptance_timestamp',
        'birthday'
    ];

    /**
     * Custom manage model events using listeners to Log all events (optional)
     * TODO: Create this custom dispatches events
     */
    protected $dispatchesEvents = [
        "registering" => \App\Events\User\UserRegisteringEvent::class,
        "registered" => \App\Events\User\UserRegisteredEvent::class,
        "connecting" => \App\Events\User\UserConnectingEvent::class,
        "connected" => \App\Events\User\UserConnectedEvent::class,
        "enrolled" => \App\Events\User\UserEnrolledEvent::class
    ];

    /**
     * Parent boot function to log model events
     */
    // public static function boot(){
    //     parent::boot();

    //     static::creating(function($item){
    //         Log::info("[Creating event] Creando usuario ". $item);
    //     });

    //     static::created(function($item){
    //         Log::info("[Created event] Usuario creado " . $item);
    //     });

    //     static::updating(function($item){
    //         Log::info("[Updating event] Actualizando usuario " . $item);
    //     });

    //     static::updated(function($item){
    //        Log::info("[Updated event] Usuario actualizado " . $item);
    //     });

    //     static::deleting(function($item){
    //         Log::info("[Deleting event] Eliminando usuario " . $item);
    //     });

    //     static::deleted(function($item){
    //         Log::info("[Deleted event] Usuario eliminado " . $item);
    //     });

    //     static::saving(function($item){
    //         Log::info("[Saving event] Guardando datos de usuario " . $item);
    //     });

    //     static::saved(function($item){
    //         Log::info("[Saved event] Datos de usuario guardados " . $item);
    //     });
    // }

    public static function getUsers()
    {
        // TODO: Add phone and mobile
        $record = User::select('document_id', 'name', 'lastname', 'gender', 'email', 'active', 'last_login')->orderBy('name', 'asc')->get()->toArray();

        return $record;
    }


    /****************************
     *       ATTRIBUTES
     ****************************/

    // public function getCoursesAttribute() {
    //     return Course::join('course_user', 'course_user.course_id', '=', 'course.id')->where('course.id', $this->course)
    // }



    /****************************
     *    DEFINING MUTATORS
     ****************************/




    /*******************
     *   QUERY SCOPES
     *******************/

    /**
     * Return users filtered by gender
     *
     * @param string $gender
     */
    public function scopeGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }

    /**
     * Return users created this month filtered by gender
     *
     * @param string $gender
     */
    public function scopeInThisMonthByGender($query, $gender)
    {
        return $query->where('gender', $gender)
            ->whereMonth('created_at', now()->month);
    }

    /**
     * Return users filtered by document type
     *
     * @param string $document_type
     */
    public function scopeDocumentType($query, $document_type)
    {
        return $query->where('document_type', $document_type);
    }


    /********************
     *   RELATIONSHIPS
     ********************/

    // 1:1

    /**
     * Return user profile
     */
    public function profile() : HasOne
    {
        return $this->hasOne(Profile::class);
    }

    // 1:N Reverse

    public function team() : BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    // 1:N

    /**
     * Return dictated user's courses
     */
    public function courses_dictated() : HasMany
    {
        return $this->hasMany(Course::class)
            ->orderBy('id', 'DESC')
            ->orderBy('title', 'ASC')
            ->orderBy('created_at', 'ASC');
    }

    public function scorms() {
        return $this->morphMany(Scorm::class, 'scormable');
    }

    /**
     * Return dictated user's learning paths
     */
    public function learning_paths_dictated() : HasMany
    {
        return $this->hasMany(LearningPath::class);
    }

    /**
     * Return dictated user's workshops
     */
    public function workshops_dictated() : HasMany
    {
        return $this->hasMany(Workshop::class);
    }

    public function organizations_owned() : HasMany
    {
        return $this->hasMany(Organization::class);
    }

    public function tests_dictated() : HasMany
    {
        return $this->hasMany(Test::class);
    }

    public function reviews() : HasMany
    {
        return $this->hasMany(Review::class);
    }

    // Relation User : Comments
    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Relation User : Reactions
    public function reactions() : HasMany
    {
        // return $this->hasMany('App\Models\Reaction');
        return $this->hasMany(Reaction::class);
    }

    public function subscriptions() : HasMany
    {
        // return $this->hasMany('App\Models\Subscription');
        return $this->hasMany(Subscription::class);
    }

    public function messages() : HasMany
    {
        return $this->hasMany(Message::class);
    }

    // test results
    public function results() : HasMany
    {
        return $this->hasMany(Result::class, 'user_id', 'id');
    }

    // N:M

    /**
     * Return user enrolled courses
     */
    public function courses_enrolled() : BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'course_user',
            'user_id',
            'course_id'
        )->orderBy('id', 'DESC');
    }

    public function learning_paths_enrolled() : BelongsToMany
    {
        return $this->belongsToMany(LearningPath::class, 'learning_path_user');
    }

    public function workshops_enrolled() : BelongsToMany
    {
        return $this->belongsToMany(Workshop::class, 'workshop_user');
    }

    public function completed_activities() : BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'user_activity');
    }

    public function completed_tasks() : BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'user_task');
    }

    public function organizations() : BelongsToMany
    {
        return $this->belongsToMany(Organization::class, 'organization_user');
    }

    /**
     * Return user competencies
     */
    public function competencies() : BelongsToMany
    {
        return $this->belongsToMany(Competency::class, 'user_competency');
    }

    /**
     * Return user skills
     */
    public function skills() : BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }

    /**
     * Return user moderated courses
     */
    public function courses_moderated() : BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    /**
     * Return user moderated workshops
     */
    // public function workshops_moderated() : BelongsToMany
    // {
    //     return $this->belongsToMany(Workshop::class);
    // }

    /**
     * Return all user contributed courses
     */
    // public function courses_contributed() : BelongsToMany
    // {
    //     return $this->belongsToMany(Course::class);
    // }

    /**
     * Return all user lessons
     */
    public function lessons() : BelongsToMany
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function chats() : BelongsToMany
    {
        return $this->belongsToMany(Chat::class);
    }

    public function tests() : BelongsToMany
    {
        return $this->belongsToMany(Test::class);
    }

    public function answers() : BelongsToMany
    {
        return $this->belongsToMany(Answer::class);
    }
}
