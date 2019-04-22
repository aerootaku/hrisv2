<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceTime extends Model
{
    //
    use SoftDeletes;
    protected $table = "attendance_time";
    protected $guarded = [];

}
