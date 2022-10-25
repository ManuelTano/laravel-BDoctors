<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'address',
        'password',
    ];

    // # Methods

    public function getFullName(){
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relazione OneToOne tra User e UserDetail

    public function userDetail()
    {
        return $this->hasOne('App\Models\UserDetail');
    }

    // Relazione ManyToMany tra User e Sponsorship

    public function sponsorships()
    {
        return $this->belongsToMany('App\Models\Sponsorship');
    }

    // Relazione OneToMany tra User e Message

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    // Relazione OneToMany tra User e Review

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    // Relazione ManyToMany tra User e Specialty

    public function specialties()
    {
        return $this->belongsToMany('App\Models\Specialty');
    }
}