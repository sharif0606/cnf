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
            $table->string('name_bn')->nullable();
            $table->string('name_en')->nullable();
            $table->unsignedBigInteger('role_id')->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('personal_phone')->nullable();
            $table->string('password')->nullable();
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
            $table->integer('image_change_approve')->default(0)->comment('0 Cancel, 1 Approved');
            $table->integer('finger_print_change_approve')->default(0)->comment('0 Cancel, 1 Approved');
            $table->bigInteger('member_serial_no')->nullable();
            $table->bigInteger('member_serial_no_new')->nullable();
            $table->bigInteger('renew_serial_no')->nullable();
            $table->date('approval_date')->nullable();
            $table->date('renew_approval_date')->nullable();
            $table->string('applicant_signature')->nullable();
            $table->integer('show_font')->nullable()->default(0);
            $table->integer('membership_applied')->nullable()->default(0);
            $table->integer('status')->default(0)->comment('0 Cancel, 1 Active, 2 Owner,3 Retirement, 4 Late');
            $table->integer('approvedstatus')->default(0)->comment('0 pending, 1 gs approved, 2 chairman approved');
            $table->date('member_approval_date')->nullable();
            $table->longText('finger_print')->nullable();
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
