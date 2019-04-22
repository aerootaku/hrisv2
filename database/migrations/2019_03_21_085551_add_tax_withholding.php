<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaxWithholding extends Migration
{
    public function up()
    {
        Schema::create('tax_withholding', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', array("Monthly", "Semi-Monthly","Weekly","Daily"))->nullable();
            $table->double('range_from','20','2')->nullable();
            $table->double('range_to','20','2')->nullable();
            $table->integer('percentage')->nullable();
            $table->double('amount','20','2')->nullable();
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
        Schema::table('tax_withholding', function (Blueprint $table) {
            //
        });
    }
}
