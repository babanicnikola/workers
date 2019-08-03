<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use db;
use App\office;

class Employee extends Model
{
    protected $fillable = [
        'user_id','name', 'position', 'office_id', 'age', 'start_date', 'salary'
    ];
}
