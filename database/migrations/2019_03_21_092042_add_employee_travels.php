<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeTravels extends Migration
{
    public function up()
    {
        Schema::create('employee_travels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('visit_purpose')->nullable();
            $table->string('visit_place')->nullable();
            $table->integer('travel_mode_id')->nullable();
            $table->integer('arrangement_type_id')->nullable();
            $table->double('expected_budget','20','2')->nullable();
            $table->double('actual_budget','20','2')->nullable();
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
        Schema::table('employee_travels', function (Blueprint $table) {
            //
        });
    }
}
