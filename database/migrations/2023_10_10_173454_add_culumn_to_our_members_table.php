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
            $table->string('spouse_name')->after('mother_name')->nullable();
            $table->string('place_of_work')->after('nameAddress_of_present_institute')->nullable();
            $table->string('address_of_present_institute')->after('place_of_work')->nullable();
            $table->string('registraion_no_of_present_institute')->after('address_of_present_institute')->nullable();
            $table->string('type_of_job')->after('registraion_no_of_present_institute')->nullable();
            $table->string('prottoyon')->after('type_of_job')->nullable();
            $table->date('exp_date')->after('issue_date')->nullable();
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
            $table->dropColumn('spouse_name');
            $table->dropColumn('place_of_work');
            $table->dropColumn('address_of_present_institute');
            $table->dropColumn('registraion_no_of_present_institute');
            $table->dropColumn('type_of_job');
            $table->dropColumn('prottoyon');
            $table->dropColumn('exp_date');
        });
    }
};
