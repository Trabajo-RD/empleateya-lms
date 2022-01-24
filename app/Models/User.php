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

use Spatie\Permission\Traits\HasRoles;

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
    public static function boot(){
        parent::boot();

        static::creating(function($item){
            Log::info("[Creating event] Creando usuario ". $item);
        });

        static::created(function($item){
            Log::info("[Created event] Usuario creado " . $item);
        });

        static::updating(function($item){
            Log::info("[Updating event] Actualizando usuario " . $item);
        });

        static::updated(function($item){
           Log::info("[Updated event] Usuario actualizado " . $item);
        });

        static::deleting(function($item){
            Log::info("[Deleting event] Eliminando usuario " . $item);
        });

        static::deleted(function($item){
            Log::info("[Deleted event] Usuario eliminado " . $item);
        });

        static::saving(function($item){
            Log::info("[Saving event] Guardando datos de usuario " . $item);
        });

        static::saved(function($item){
            Log::info("[Saved event] Datos de usuario guardados " . $item);
        });
    }

    public static function getUsers()
    {
        // TODO: Add phone and mobile
        $record = User::select('document_id', 'name', 'lastname', 'gender', 'email', 'active', 'last_login')->orderBy('name', 'asc')->get()->toArray();

        return $record;
    }

    /**
     * Relation 1:1
     */
    public function profile()
    {
        // return $this->hasOne('App\Models\Profile');
        return $this->hasOne(Profile::class);
    }

    /**
     * Relation 1:N : User courses dictated
     */
    public function courses_dictated()
    {
        // return $this->hasMany('App\Models\Course');
        return $this->hasMany(Course::class);
    }

    public function tests_dictated()
    {
        // return $this->hasMany('App\Models\Course');
        return $this->hasMany(Test::class);
    }

    public function reviews()
    {
        // return $this->hasMany('App\Models\Review');
        return $this->hasMany(Review::class);
    }

    // Relation User : Comments
    public function comments()
    {
        // return $this->hasMany('App\Models\Comment');
        return $this->hasMany(Comment::class);
    }

    // Relation User : Reactions
    public function reactions()
    {
        // return $this->hasMany('App\Models\Reaction');
        return $this->hasMany(Reaction::class);
    }

    public function subscriptions()
    {
        // return $this->hasMany('App\Models\Subscription');
        return $this->hasMany(Subscription::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // test results
    public function results()
    {
        return $this->hasMany(Result::class, 'user_id', 'id');
    }

    /**
     * Relation N:M : Users enrolled in courses
     */
    public function courses_enrolled()
    {
        // return $this->belongsToMany('App\Models\Course');
        return $this->belongsToMany(Course::class);
    }

    /**
     * Return all courses moderated by user
     */
    public function courses_moderated(){
        return $this->belongsToMany(Course::class);
    }

    /**
     * Return all courses contributed by user
     */
    public function courses_contributed(){
        return $this->belongsToMany(Course::class);
    }

    public function lessons()
    {
        // return $this->belongsToMany('App\Models\Lesson');
        return $this->belongsToMany(Lesson::class);
    }

    public function chats()
    {
        return $this->belongsToMany(Chat::class);
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class);
    }

    public function answers()
    {
        return $this->belongsToMany(Answer::class);
    }
}
