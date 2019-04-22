<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeTransfer extends Migration
{
    public function up()
    {
        Schema::create('employee_transfer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('transfer_department_id')->nullable();
            $table->unsignedInteger('transfer_branch_id')->nullable();
            $table->date('transfer_date')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', array("Pending", "Accepted"))->default('Pending')->nullable();
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
        Schema::table('employee_transfer', function (Blueprint $table) {
            //
        });
    }
}
