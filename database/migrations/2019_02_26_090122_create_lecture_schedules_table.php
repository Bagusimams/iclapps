<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role')
                  ->nullable();
            $table->string('role_id')
                  ->nullable();
            $table->string('subject')
                  ->nullable();
            $table->string('code')
                  ->nullable();
            $table->string('sks')
                  ->nullable();
            $table->integer('lecturer_id')
                  ->unsigned()
                  ->nullable();
            $table->string('class')
                  ->nullable();
            $table->string('day')
                  ->nullable();
            $table->date('date')
                  ->nullable();
            $table->string('start_time')
                  ->nullable();
            $table->string('end_time')
                  ->nullable();
            $table->integer('room_id')
                  ->unsigned()
                  ->nullable();
            $table->integer('status')
                  ->comment('0 -> not checked, 1 -> approved, 2 -> rejected')
                  ->nullable();
            $table->string('mode')
                  ->comment('per/temp/new')
                  ->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lecturer_id')
                  ->references('id')
                  ->on('lecturers')
                  ->onDelete('cascade');

            $table->foreign('room_id')
                  ->references('id')
                  ->on('rooms')
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
        Schema::dropIfExists('lecture_schedules');
    }
}
