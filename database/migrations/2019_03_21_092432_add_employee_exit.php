<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeExit extends Migration
{
    public function up()
    {
        Schema::create('employee_exit', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->date('exit_date')->nullable();
            $table->unsignedInteger('exit_type_id')->nullable();
            $table->integer('exit_interview')->nullable();
            $table->integer('is_inactivate_account')->nullable();
            $table->text('reason')->nullable();

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
        Schema::table('employee_exit', function (Blueprint $table) {
            //
        });
    }
}
