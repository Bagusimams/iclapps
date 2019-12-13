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
            $table->string('purpose')
                  ->nullable();
            $table->integer('room_id')
                  ->unsigned()
                  ->nullable();
            $table->integer('isApproved')
                  ->nullable()
                  ->comment('0 -> not checked, 1 -> approved, 2 -> rejected')
                  ->default(0);

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
