<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class Employee extends Model
{
    protected $fillable = [
        'user_id','name', 'position', 'office', 'age', 'start_date', 'salary'
    ];
}
