<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')
                  ->unsigned()
                  ->nullable();
            $table->integer('internship_program_id')
                  ->unsigned()
                  ->nullable();
            $table->integer('status')
                  ->default(0)
                  ->comment('1 -> accepted, 2 -> rejected, 0 -> nothing')
                  ->nullable();
            $table->string('cv_location')
                  ->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('student_id')
                  ->references('id')
                  ->on('students')
                  ->onDelete('cascade');

            $table->foreign('internship_program_id')
                  ->references('id')
                  ->on('internship_programs')
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
        Schema::dropIfExists('internship_applicants');
    }
}
