<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxSSS extends Model
{
    use SoftDeletes;
    protected $table = "tax_sss";
    protected $guarded = [];
}
