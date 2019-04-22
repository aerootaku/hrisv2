<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaxPhilhealth extends Migration
{
    public function up()
    {
        Schema::create('tax_philhealth', function (Blueprint $table) {
            $table->increments('id');
            $table->double('range_from','20','2')->nullable();
            $table->double('range_to','20','2')->nullable();
            $table->double('monthly_salary_credit','20','2')->nullable();
            $table->double('er_share','20','2')->nullable();
            $table->double('ee_share','20','2')->nullable();
            $table->double('total_share','20','2')->nullable();
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
        Schema::table('tax_philhealth', function (Blueprint $table) {
            //
        });
    }
}
