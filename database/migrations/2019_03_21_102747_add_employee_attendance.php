<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeAttendance extends Migration
{
    public function up()
    {
        Schema::create('employee_attendance', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id')->nullable();
            $table->unsignedInteger('employee_id')->nullable();
            $table->timestamp('date_time')->nullable();
            $table->string('action','50')->nullable();
            $table->binary('image_blob')->nullable();
            $table->string('image_file')->nullable();


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
        Schema::table('employee_attendance', function (Blueprint $table) {
            //
        });
    }
}
