<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class AddEmployeeAwards extends Migration
{
    public function up()
    {
        Schema::create('employee_awards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('award_type_id')->nullable();
            $table->string('gift_item')->nullable();
            $table->double('cash_price',20,2)->nullable();
            $table->string('award_photo')->nullable();
            $table->string('award_month_year')->nullable();
            $table->string('award_information')->nullable();
            $table->string('description')->nullable();
            $table->date('award_date')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('employee_awards', function (Blueprint $table) {
            //
        });
    }
}
