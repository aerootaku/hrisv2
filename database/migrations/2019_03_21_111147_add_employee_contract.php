<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeContract extends Migration
{
    public function up()
    {
        Schema::create('employee_contract', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('contract_type_id')->nullable();
            $table->unsignedInteger('designation_id')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->enum('status', array("Active", "Inactive"))->default('Active')->nullable();
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
        Schema::table('employee_contract', function (Blueprint $table) {
            //
        });
    }
}
