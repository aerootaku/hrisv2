<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeLoan extends Migration
{
    public function up()
    {
        Schema::create('employee_loan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('loan_type_id')->nullable();
            $table->double('total_amount','20','2')->nullable();
            $table->double('payable','20','2')->nullable();
            $table->enum('payment_term', array("Semi-Monthly", "Monthly"))->default('Semi-Monthly')->nullable();
            $table->double('paid_amount','20','2')->nullable();
            $table->double('balance','20','2')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('employee_loan', function (Blueprint $table) {
            //
        });
    }
}
