<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeePromotion extends Model
{
    use SoftDeletes;
    protected $table = "employee_promotions";
    protected $guarded = [];
}
