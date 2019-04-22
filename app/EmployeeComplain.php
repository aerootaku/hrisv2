<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeComplain extends Model
{
   use SoftDeletes;
    protected $table = "employee_complaints";
    protected $guarded = [];

}
