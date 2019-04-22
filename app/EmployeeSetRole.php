<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSetRole extends Model
{
      use SoftDeletes;
    protected $table = "";
    protected $guarded = [];
}
