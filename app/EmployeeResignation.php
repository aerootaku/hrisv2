<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeResignation extends Model
{
      use SoftDeletes;
    protected $table = "employee_resignations";
    protected $guarded = [];
}
