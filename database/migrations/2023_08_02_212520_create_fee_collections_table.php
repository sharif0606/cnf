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
        Schema::create('fee_collections', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id');
            $table->string('vhoucher_no')->nullable();
            $table->date('date')->nullable();
            $table->string('national_id')->nullable();
            $table->string('name')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('year')->nullable();
            $table->decimal('total_amount',10,2)->default(0)->nullable();
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
        Schema::dropIfExists('fee_collections');
    }
};
