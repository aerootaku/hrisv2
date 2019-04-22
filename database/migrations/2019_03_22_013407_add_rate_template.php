<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRateTemplate extends Migration
{
    public function up()
    {
        Schema::create('rate_template', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rate_name')->nullable();
            $table->double('per_day','20','2')->nullable();
            $table->integer('hours')->nullable();
            $table->double('per_hour','20','3')->nullable();
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
        Schema::table('rate_template', function (Blueprint $table) {
            //
        });
    }
}
