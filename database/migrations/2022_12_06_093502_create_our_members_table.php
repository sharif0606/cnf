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
        Schema::create('our_members', function (Blueprint $table) {
            $table->id();
            $table->string('form_serial');
            $table->string('name_bn');
            $table->string('name_en');
            $table->unsignedBigInteger('role_id')->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('personal_phone')->unique();
            $table->string('password');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('nid')->nullable();
            $table->string('word_no')->nullable();
            $table->text('present_address')->nullable();
            $table->string('village')->nullable();
            $table->string('post_office')->nullable();
            $table->string('upazila')->nullable();
            $table->string('district')->nullable();
            $table->text('nameAddress_of_present_institute')->nullable();
            $table->string('office_teliphone')->nullable();
            $table->string('license')->nullable();
            $table->date('issue_date')->nullable();
            $table->string('designation_of_present_job')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('nameOf_instituteOf_previousJob')->nullable();
            $table->string('designation_of_previous_job')->nullable();
            $table->string('job_expiration')->nullable();
            $table->date('form_date')->nullable();
            $table->string('image')->nullable();
            $table->string('member_serial_no')->nullable();
            $table->date('approval_date')->nullable();
            $table->string('applicant_signature')->nullable();
            $table->integer('show_font')->default(0);
            $table->integer('membership_applied')->default(0);
            $table->integer('status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('our_members');
    }
};
