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

    // Getter

    public function getThumb(){
        return $this->thumb;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}