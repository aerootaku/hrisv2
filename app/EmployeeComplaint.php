<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeComplaint extends Model
{
   use SoftDeletes;
    protected $tbl="employee_complaints";
   protected $guarded=[];
}
