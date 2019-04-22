<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class department extends Model
{
     use SoftDeletes;
    protected $table = "company_department";

    protected $guarded = [];
}
