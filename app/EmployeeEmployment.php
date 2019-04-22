<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeEmployment extends Model
{
    use SoftDeletes;
    protected $table = "employee_employment";
    protected $guarded = [];
}
