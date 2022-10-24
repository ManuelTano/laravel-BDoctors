<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{

    protected $fillable = [
        'address',
        'city',
        'phone',
    ];

    // # Methods

    public function getFullAddress(){
        return $this->address . ' , ' . $this->city;
    }

    public function getThumb(){
        return $this->thumb;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function specialties()
    {
        return $this->belongsToMany('App\Models\Specialty');
    }
}