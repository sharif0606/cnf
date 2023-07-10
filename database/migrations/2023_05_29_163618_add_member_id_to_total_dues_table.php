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
        Schema::table('total_dues', function (Blueprint $table) {
            $table->integer('member_id');
            $table->decimal('y2022',10,2)->nullable()->default(0);
            $table->decimal('y2023',10,2)->nullable()->default(0);
            $table->decimal('y2024',10,2)->nullable()->default(0);
            $table->dropColumn('member_name');
            $table->dropColumn('email');
            $table->dropColumn('contact');
            $table->dropColumn('address');
            $table->dropColumn('membership_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('total_dues', function (Blueprint $table) {
            //
        });
    }
};
