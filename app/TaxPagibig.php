<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxPagibig extends Model
{
    use SoftDeletes;
    protected $table = "tax_pagibig";
    protected $guarded = [];
}
