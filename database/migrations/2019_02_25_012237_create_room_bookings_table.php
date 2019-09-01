<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role')
                  ->nullable();
            $table->string('role_id')
                  ->nullable();
            $table->string('name')
                  ->nullable();
            $table->string('nim/nip')
                  ->nullable();
            $table->string('major/division')
                  ->nullable();
            $table->string('phone_number')
                  ->nullable();
            $table->string('email')
                  ->nullable();
            $table->date('date')
                  ->nullable();
            $table->string('start_time')
                  ->nullable();
            $table->string('end_time')
                  ->nullable();
            $table->string('activity_name')
                  ->nullable();
            $table->text('activity_detail')
                  ->nullable();
            $table->string('total_participant')
                  ->nullable();
            $table->integer('room_id')
                  ->unsigned()
                  ->nullable();
            $table->string('rundown_file')
                  ->nullable();
            $table->boolean('isApproved')
                  ->nullable()
                  ->default(0);
            $table->string('notes')
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
        Schema::dropIfExists('room_bookings');
    }
}
