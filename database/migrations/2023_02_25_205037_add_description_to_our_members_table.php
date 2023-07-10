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
        Schema::table('our_members', function (Blueprint $table) {
            $table->string('member_id')->after('surname')->nullable();
            $table->text('description')->after('company')->nullable();
            $table->string('attach_pdf')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('our_members', function (Blueprint $table) {
            $table->dropColumn('member_id');
            $table->dropColumn('description');
            $table->dropColumn('attach_pdf');
        });
    }
};
