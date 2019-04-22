<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeSpouse extends Migration
{
    public function up()
    {
        Schema::create('employee_spouse', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->date('birthday')->nullable();
            $table->string('occupation')->nullable();
            $table->string('employer')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('telephone_no')->nullable();

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
        Schema::table('employee_spouse', function (Blueprint $table) {
            //
        });
    }
}
