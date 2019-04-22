<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMakePayment extends Migration
{
    public function up()
    {
        Schema::create('make_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('payroll_cutoff_id')->nullable();
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('location_id')->nullable();
            $table->unsignedInteger('designation_id')->nullable();
            $table->unsignedInteger('payment_method_id')->nullable();
            $table->double('basic_salary','20','2')->nullable();
            $table->double('payment_amount','20','2')->nullable();
            $table->double('gross_salary','20','2')->nullable();
            $table->double('total_allowances','20','2')->nullable();
            $table->double('total_deductions','20','2')->nullable();
            $table->double('net_salary','20','2')->nullable();
            $table->double('provident_fund','20','2')->nullable();
            $table->double('tax_deduction','20','2')->nullable();
            $table->double('overtime_rate','20','2')->nullable();
            $table->tinyInteger('is_payment')->nullable();
            $table->double('hourly_rate','20','2')->nullable();
            $table->integer('total_hours_work')->nullable();
            $table->string('comments')->nullable();

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
        Schema::table('make_payment', function (Blueprint $table) {
            //
        });
    }
}
