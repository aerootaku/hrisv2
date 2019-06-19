<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeGroups extends Model
{
    use SoftDeletes;
    protected $table = "employee_groups";
    protected $guarded = [];
}
