<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeAllowance extends Model
{
    use SoftDeletes;
    protected $table = "employee_allowance";
    protected $guarded = [];
}
