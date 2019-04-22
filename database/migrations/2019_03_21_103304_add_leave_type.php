<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLeaveType extends Migration
{
    public function up()
    {
        Schema::create('leave_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_name')->nullable();
            $table->integer('days_per_year')->nullable();
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
        Schema::table('leave_type', function (Blueprint $table) {
            //
        });
    }
}
