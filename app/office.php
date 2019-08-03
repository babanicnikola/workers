<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class office extends Model
{
    protected $fillable = [
        'user_id', 'name', 'city', 'street'
    ];

}
