<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeEducations extends Migration
{
    public function up()
    {
        Schema::create('employee_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('education_level_id')->nullable();
            $table->string('school')->nullable();
            $table->string('description')->nullable();
            $table->date('attended_from')->nullable();
            $table->date('attended_until')->nullable();
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
        Schema::table('employee_educations', function (Blueprint $table) {
            //
        });
    }
}
