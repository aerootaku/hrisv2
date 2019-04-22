<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeExit extends Model
{
    use SoftDeletes;
    protected $table = "employee_exit";
    protected $guarded = [];
}
