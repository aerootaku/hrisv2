<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeContact extends Model
{
    use SoftDeletes;
    protected $table = "employee_contacts";
    protected $guarded = [];
}
