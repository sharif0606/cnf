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
        Schema::create('others_payment_details', function (Blueprint $table) {
            $table->id();
            $table->integer('others_payments_id');
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->decimal('amount',10,2)->default(0)->nullable();
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
        Schema::dropIfExists('others_payment_details');
    }
};
