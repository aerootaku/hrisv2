<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeWorkExperience extends Model
{
     use SoftDeletes;
    protected $table = "employee_work_experience";
    protected $guarded = [];
}
