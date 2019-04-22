<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxWithholding extends Model
{
    use SoftDeletes;
    protected $table = "tax_withholding";
    protected $guarded = [];
}
