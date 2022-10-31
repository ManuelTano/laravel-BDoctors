<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'text',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
