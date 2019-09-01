<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJointFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joint_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')
                  ->unsigned()
                  ->nullable();
            $table->string('full_name')
                  ->nullable();
            $table->string('passport_number')
                  ->nullable();
            $table->date('passport_expiry_date')
                  ->nullable();
            $table->date('birth_date')
                  ->nullable();
            $table->string('gender')
                  ->nullable();
            $table->string('phone_number')
                  ->nullable();
            $table->string('email')
                  ->nullable();
            $table->string('address')
                  ->nullable();
            $table->string('whatsapp')
                  ->nullable();
            $table->string('id_number')
                  ->nullable();
            $table->integer('school_id')
                  ->unsigned()
                  ->nullable();
            $table->integer('major_id')
                  ->unsigned()
                  ->nullable();
            $table->string('class')
                  ->nullable();
            $table->string('gpa')
                  ->nullable();
            $table->string('toefl')
                  ->nullable();
            $table->string('semester')
                  ->nullable();
            $table->string('batch')
                  ->nullable();
            $table->integer('university_joint_id')
                  ->unsigned()
                  ->nullable();
            $table->string('semester_applied')
                  ->nullable();
            $table->string('father_name')
                  ->nullable();
            $table->string('father_occupation')
                  ->nullable();
            $table->string('father_phone_number')
                  ->nullable();
            $table->string('father_email')
                  ->nullable();
            $table->string('father_postal_address')
                  ->nullable();
            $table->string('mother_name')
                  ->nullable();
            $table->string('mother_occupation')
                  ->nullable();
            $table->string('mother_phone_number')
                  ->nullable();
            $table->string('mother_email')
                  ->nullable();
            $table->string('mother_postal_address')
                  ->nullable();
            $table->string('file_passport')
                  ->nullable();
            $table->string('file_toefl')
                  ->nullable();
            $table->string('file_transcript')
                  ->nullable();
            $table->string('file_financial')
                  ->nullable();
            $table->boolean('is_form_complete')
                  ->default(0)
                  ->nullable();
            $table->string('file_admission_letter')
                  ->nullable();
            $table->string('file_ticket')
                  ->nullable();
            $table->string('file_visa')
                  ->nullable();
            $table->boolean('is_ticket_complete')
                  ->default(0)
                  ->nullable();
            $table->string('file_payment')
                  ->nullable();
            $table->boolean('is_payment_complete')
                  ->default(0)
                  ->nullable();
            $table->integer('status')
                  ->comment('0 -> not set, 1 -> accepted, 2 -> rejected')
                  ->nullable();
            $table->longText('final_report')
                  ->nullable();
            $table->integer('lecturer_id')
                  ->unsigned()
                  ->nullable();
            $table->longText('lecturer_second_week_report')
                  ->nullable();
            $table->longText('lecturer_mid_report')
                  ->nullable();
            $table->longText('lecturer_final_report')
                  ->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('student_id')
                  ->references('id')
                  ->on('students')
                  ->onDelete('cascade');

            $table->foreign('school_id')
                  ->references('id')
                  ->on('schools')
                  ->onDelete('cascade');

            $table->foreign('major_id')
                  ->references('id')
                  ->on('majors')
                  ->onDelete('cascade');

            $table->foreign('university_joint_id')
                  ->references('id')
                  ->on('university_joints')
                  ->onDelete('cascade');

            $table->foreign('lecturer_id')
                  ->references('id')
                  ->on('lecturers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joint_forms');
    }
}
