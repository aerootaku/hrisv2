<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeShift extends Model
{
     use SoftDeletes;
    protected $table = "office_shifts";
    protected $guarded = [];

}
