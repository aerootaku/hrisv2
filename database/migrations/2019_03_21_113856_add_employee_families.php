<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeFamilies extends Migration
{
    public function up()
    {
        Schema::create('employee_families', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->string('father_lastname')->nullable();
            $table->string('father_firstname')->nullable();
            $table->string('father_middlename')->nullable();
            $table->date('father_birthdate')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_employer')->nullable();
            $table->string('father_deceased')->nullable();
            $table->date('father_mobile_no')->nullable();
            $table->string('mother_lastname')->nullable();
            $table->string('mother_firstname')->nullable();
            $table->string('mother_middlename')->nullable();
            $table->date('mother_birthdate')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_employer')->nullable();
            $table->string('mother_deceased')->nullable();
            $table->date('mother_mobile_no')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('employee_families', function (Blueprint $table) {
            //
        });
    }
}
