<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeWarning extends Model
{
   use SoftDeletes;
    protected $table = "employee_warnings";
    protected $guarded = [];
}
