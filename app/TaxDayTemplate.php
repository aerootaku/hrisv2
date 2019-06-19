<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxDayTemplate extends Model
{
    use SoftDeletes;
    protected $table = "tax_day_template";
    protected $guarded = [];
}
