<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeContacts extends Migration
{
    public function up()
    {
        Schema::create('employee_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->string('relation')->nullable();
            $table->enum('is_primary', array("1", "0"))->nullable();
            $table->enum('is_dependent', array("1", "0"))->nullable();
            $table->string('contact_name')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('work_phone_extension')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('work_email')->nullable();
            $table->string('personal_email')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
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
        Schema::table('employee_contacts', function (Blueprint $table) {
            //
        });
    }
}
