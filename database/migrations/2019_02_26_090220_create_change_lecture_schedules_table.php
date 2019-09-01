<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangeLectureSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_lecture_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject')
                  ->nullable();
            $table->string('code')
                  ->nullable();
            $table->integer('lecturer_id')
                  ->unsigned()
                  ->nullable();
            $table->string('class')
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
            $table->text('reason')
                  ->nullable();
            $table->string('phone_number')
                  ->nullable();
            $table->string('email')
                  ->nullable();
            $table->string('type')
                  ->comment('permanent/temporary')
                  ->nullable();

            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('change_lecture_schedules');
    }
}
