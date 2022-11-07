<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'business_plan',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}