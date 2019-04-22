<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompany extends Migration
{
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_type_id');
            $table->string('company_code','90')->unique()->nullable();
            $table->string('logo')->nullable();
            $table->string('name')->nullable();
            $table->string('nature_business')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('has_branch')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_position')->nullable();
            $table->string('website_url')->nullable();
            $table->string('license_key')->nullable();
            $table->string('starting_year')->nullable();
            $table->string('expiration_year')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('blogger_link')->nullable();
            $table->string('linkdedin_link')->nullable();
            $table->string('google_plus_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('pinterest_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('skype_id')->nullable();
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
        Schema::table('company', function (Blueprint $table) {
            //
        });
    }
}
