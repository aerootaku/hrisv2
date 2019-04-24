<?php



namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MakePayment extends Model
{

    //

    use SoftDeletes;
    protected $table = "make_payment";
    protected $guarded = [];

}

