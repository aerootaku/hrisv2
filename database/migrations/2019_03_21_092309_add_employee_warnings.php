<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeWarnings extends Migration
{
    public function up()
    {
        Schema::create('employee_warnings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('warning_to')->nullable();
            $table->unsignedInteger('warning_by')->nullable();
            $table->date('warning_date')->nullable();
            $table->unsignedInteger('warning_type_id')->nullable();
            $table->string('subject')->nullable();
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
        Schema::table('employee_warnings', function (Blueprint $table) {
            //
        });
    }
}
