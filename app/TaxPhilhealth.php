<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxPhilhealth extends Model
{
    use SoftDeletes;
    protected $table = "tax_philhealth";
    protected $guarded = [];
}
