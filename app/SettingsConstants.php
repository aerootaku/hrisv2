<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsConstants extends Model
{
    // use SoftDeletes;
    protected $table = "settings_constants";
    protected $guarded = [];
}
