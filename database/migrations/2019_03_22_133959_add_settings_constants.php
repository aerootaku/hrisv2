<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSettingsConstants extends Migration
{
    public function up()
    {
        Schema::create('settings_constants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('value')->nullable();
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
        Schema::table('settings_constants', function (Blueprint $table) {
            //
        });
    }
}
