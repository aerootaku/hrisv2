<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeTravel extends Model
{
     use SoftDeletes;
    protected $table = "employee_travels";
    protected $guarded = [];
}
