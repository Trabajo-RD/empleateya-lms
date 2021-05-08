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
     * Relation 1:1
     */
    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }

    /**
     * Relation 1:N : User courses dictated
     */
    public function courses_dictated(){
        return $this->hasMany('App\Models\Course');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    // Relation User : Comments
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    // Relation User : Reactions
    public function reactions(){
        return $this->hasMany('App\Models\Reaction');
    }

    public function subscriptions(){
        return $this->hasMany('App\Models\Subscription');
    }

    /**
     * Relation N:M : Users enrolled in courses
     */
    public function courses_enrolled(){
        return $this->belongsToMany('App\Models\Course');
    }

    public function lessons(){
        return $this->belongsToMany('App\Models\Lesson');
    }
}
