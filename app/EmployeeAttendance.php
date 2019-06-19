<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeAttendance extends Model
{
    use SoftDeletes;
    protected $table ='employee_attendance';
    protected $guarded=[];
}
