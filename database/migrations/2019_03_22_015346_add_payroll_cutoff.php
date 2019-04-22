<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPayrollCutoff extends Migration
{
    public function up()
    {
        Schema::create('payroll_cutoff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cutoff_name','90')->unique()->nullable();
            $table->date('cutoff_from')->nullable();
            $table->date('cutoff_to')->nullable();
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
        Schema::table('payroll_cutoff', function (Blueprint $table) {
            //
        });
    }
}
