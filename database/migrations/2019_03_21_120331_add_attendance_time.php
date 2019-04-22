<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttendanceTime extends Migration
{
    public function up()
    {
        Schema::create('attendance_time', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('day_type_id')->nullable();
            $table->timestamp('attendance_date')->nullable();
            $table->timestamp('time_in_work')->nullable();
            $table->timestamp('time_out_work')->nullable();
            $table->timestamp('time_in_break')->nullable();
            $table->timestamp('time_out_break')->nullable();
            $table->time('overtime')->nullable();
            $table->time('undertime')->nullable();
            $table->time('tardiness')->nullable();
            $table->time('total_work')->nullable();
            $table->time('total_rest')->nullable();
            $table->time('total_night_diff')->nullable();
            $table->integer('overtime_approved')->nullable();
            $table->string('attendance_status')->nullable();

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
        Schema::table('attendance_time', function (Blueprint $table) {
            //
        });
    }
}
