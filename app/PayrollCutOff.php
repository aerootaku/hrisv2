<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayrollCutOff extends Model
{
    use SoftDeletes;
    protected $table = "payroll_cutoff";
    protected $guarded = [];
}
