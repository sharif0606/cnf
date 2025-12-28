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
        Schema::create('member_id_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id')->index();
            $table->string('card_number')->unique();
            $table->integer('card_type')->default(3)->comment('1=nfc, 2=rfid, 3=plastic, 4=other');
            $table->integer('card_status')->default(1)->comment('1=active, 0=inactive');
            $table->date('card_expiration_date')->nullable();
            $table->date('card_allocation_date')->nullable();
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
        Schema::dropIfExists('member_id_cards');
    }
};
