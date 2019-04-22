<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeLeaveCredits extends Migration
{
    public function up()
    {
        Schema::create('employee_leave_credits', function (Blueprint $table) {
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
        Schema::table('employee_leave_credits', function (Blueprint $table) {
            //
        });
    }
}
