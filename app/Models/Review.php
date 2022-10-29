<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'first_name',
        'last_name',
        'feedback',
        'rating',
        'email',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
