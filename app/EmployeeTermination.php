<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeTermination extends Model
{
     use SoftDeletes;
    protected $table = "employee_terminations";
    protected $guarded = [];
}
