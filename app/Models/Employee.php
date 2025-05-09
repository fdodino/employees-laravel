<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Employee extends Eloquent
{
    protected $fillable = [
        'name',
        'department',
        'employee_id',
        'position',
        'email',
        'phone',
        'hire_date',
        'salary'
    ];
}
