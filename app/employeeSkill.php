<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeeSkill extends Model
{
    protected $table = 'employee_skill';
    protected $fillable = [
        'employee_id',
        'skill_name',
        'yrs_exp',
        'rating',
    ];
}
