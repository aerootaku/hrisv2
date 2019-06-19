<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSalaryAdjustment extends Model
{
    use SoftDeletes;
    protected $table = "employee_salary_adjustment";
    protected $guarded = [];
}
