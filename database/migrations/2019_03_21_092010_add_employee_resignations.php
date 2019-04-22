<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeResignations extends Migration
{
    public function up()
    {
        Schema::create('employee_resignations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->date('notice_date')->nullable();
            $table->date('resignation_date')->nullable();
            $table->string('reason')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('employee_resignations', function (Blueprint $table) {
            //
        });
    }
}
