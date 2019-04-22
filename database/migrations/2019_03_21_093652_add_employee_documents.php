<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeDocuments extends Migration
{
    public function up()
    {
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('document_type_id')->nullable();
            $table->date('date_of_expiry')->nullable();
            $table->string('title')->nullable();
            $table->string('notification_email')->nullable();
            $table->tinyInteger('is_alert')->nullable();
            $table->string('description')->nullable();
            $table->string('document_file')->nullable();
            $table->enum('status', array("Active", "Inactive"))->default('Active')->nullable();
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
        Schema::table('employee_documents', function (Blueprint $table) {
            //
        });
    }
}
