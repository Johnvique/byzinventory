<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'national_id',
        'status',
        'dob',
        'address',
        'salary'
    ];
}

