<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeLeave extends Model
{
     use SoftDeletes;
    protected $table = "employee_leave_applications";
    protected $guarded = [];
}
