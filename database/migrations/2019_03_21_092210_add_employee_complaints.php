<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeComplaints extends Migration
{
    public function up()
    {
        Schema::create('employee_complaints', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('complaint_from')->nullable();
            $table->string('title')->nullable();
            $table->date('complaint_date')->nullable();
            $table->unsignedInteger('complaint_against')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('employee_complaints', function (Blueprint $table) {
            //
        });
    }
}
