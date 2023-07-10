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
        Schema::create('total_dues', function (Blueprint $table) {
            $table->id();
            $table->string('member_type')->nullable();
            $table->string('member_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('membership_code')->nullable();
            $table->decimal('y2016',10,2)->nullable()->default(0);
            $table->decimal('y2017',10,2)->nullable()->default(0);
            $table->decimal('y2018',10,2)->nullable()->default(0);
            $table->decimal('y2019',10,2)->nullable()->default(0);
            $table->decimal('y2020',10,2)->nullable()->default(0);
            $table->decimal('y2021',10,2)->nullable()->default(0);
            $table->decimal('subscription_interest',10,2)->nullable()->default(0);
            $table->decimal('land_interest',10,2)->nullable()->default(0);
            $table->decimal('land_developmnet_fee',10,2)->nullable()->default(0);
            $table->string('status')->nullable();
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
        Schema::dropIfExists('total_dues');
    }
};
