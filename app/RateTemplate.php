<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class RateTemplate extends Model

{

    use SoftDeletes;

    protected $table = "rate_template";

    protected $guarded = [];

}

