<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class designation extends Model
{
    use SoftDeletes;
    protected $table = "company_designation";
    protected $guarded = [];
}
