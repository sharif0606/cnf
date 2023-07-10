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
        Schema::table('video_notices', function (Blueprint $table) {
            $table->text('short_description')->after('title')->nullable();
            $table->text('long_description')->after('short_description')->nullable();
            $table->string('image')->after('long_description')->nullable();
            $table->string('notice_file')->after('image')->nullable();
            $table->string('publish_date')->after('notice_file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_notices', function (Blueprint $table) {
            $table->dropColumn('short_description');
            $table->dropColumn('long_description');
            $table->dropColumn('image');
            $table->dropColumn('notice_file');
            $table->dropColumn('publish_date');
        });
    }
};
