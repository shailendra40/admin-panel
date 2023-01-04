<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('govn_name')->nullable();
            $table->string('ministry_name')->nullable();
            $table->string('department_name');
            $table->string('office_name');
            $table->string('office_address');
            $table->string('office_contact');
            $table->string('office_mail');
            $table->longText('slogan');
            $table->string('main_logo');
            $table->string('side_logo')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('social_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
};
