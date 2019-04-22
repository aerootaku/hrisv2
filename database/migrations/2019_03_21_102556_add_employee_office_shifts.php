<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeOfficeShifts extends Migration
{
    public function up()
    {
        Schema::create('office_shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shift_name')->nullable();
            $table->string('default_shift')->nullable();
            $table->time('monday_in_time')->nullable();
            $table->time('monday_out_time')->nullable();
            $table->time('tuesday_in_time')->nullable();
            $table->time('tuesday_out_time')->nullable();
            $table->time('wednesday_in_time')->nullable();
            $table->time('wednesday_out_time')->nullable();
            $table->time('thursday_in_time')->nullable();
            $table->time('thursday_out_time')->nullable();
            $table->time('friday_in_time')->nullable();
            $table->time('friday_out_time')->nullable();
            $table->time('saturday_in_time')->nullable();
            $table->time('saturday_out_time')->nullable();
            $table->time('sunday_in_time')->nullable();
            $table->time('sunday_out_time')->nullable();

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
        Schema::table('office_shifts', function (Blueprint $table) {
            //
        });
    }
}
