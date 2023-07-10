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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->text('address')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email_address')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('linkdin_link')->nullable();
            $table->string('we_accept')->nullable();
            $table->string('footer_top_p1_text')->nullable();
            $table->string('footer_top_p1_image')->nullable();
            $table->string('footer_top_p2_text')->nullable();
            $table->string('footer_top_p2_image')->nullable();
            $table->string('footer_top_p3_text')->nullable();
            $table->string('footer_top_p3_image')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
