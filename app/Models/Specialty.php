<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    public function userDetails()
    {
        return $this->belongsToMany('App\Models\UserDetail');
    }
}
