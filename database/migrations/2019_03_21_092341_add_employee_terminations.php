<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeTerminations extends Migration
{
    public function up()
    {
        Schema::create('employee_terminations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('terminated_by')->nullable();
            $table->unsignedInteger('termination_type_id')->nullable();
            $table->date('termination_date')->nullable();
            $table->date('notice_date')->nullable();
            $table->text('description')->nullable();

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
        Schema::table('employee_terminations', function (Blueprint $table) {
            //
        });
    }
}
