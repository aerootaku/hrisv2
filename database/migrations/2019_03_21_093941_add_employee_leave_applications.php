<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeLeaveApplications extends Migration
{
    public function up()
    {
        Schema::create('employee_leave_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('leave_type_id')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->text('reason')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('without_pay')->nullable();
            $table->integer('half_day')->nullable();
            $table->integer('is_deducted')->nullable();
            $table->date('date_applied')->nullable();
            $table->double('leave_amount','20','2')->nullable();
            $table->enum('status', array("Pending", "Approved","Declined"))->default('Pending')->nullable();

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
        Schema::table('employee_leave_applications', function (Blueprint $table) {
            //
        });
    }
}
