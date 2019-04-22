<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDayTemplate extends Migration
{
    public function up()
    {
        Schema::create('tax_day_template', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day_type_code')->nullable();
            $table->string('day_type')->nullable();
            $table->double('overtime_pay','20','2')->nullable();
            $table->double('night_differential_pay','20','2')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tax_day_template', function (Blueprint $table) {
            //
        });
    }
}
