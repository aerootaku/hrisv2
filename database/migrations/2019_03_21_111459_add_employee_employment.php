<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeEmployment extends Migration
{
    public function up()
    {
        Schema::create('employee_employment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('biometric_id')->nullable();
            $table->unsignedInteger('rate_id')->nullable();

            $table->unsignedInteger('branch')->nullable();
            $table->unsignedInteger('department')->nullable();
            $table->unsignedInteger('designation')->nullable();

            $table->date('date_hired')->nullable();
            $table->date('date_resign')->nullable();
            $table->date('contract_start')->nullable();
            $table->date('contract_end')->nullable();
            $table->unsignedInteger('employment_status')->nullable();
            $table->unsignedInteger('employee_type')->nullable();
            $table->unsignedInteger('schedule_type')->nullable();
            $table->string('position')->nullable();

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
        Schema::table('employee_employment', function (Blueprint $table) {
            //
        });
    }
}
