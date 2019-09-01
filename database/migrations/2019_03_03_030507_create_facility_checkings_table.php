<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityCheckingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_checkings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')
                  ->unsigned()
                  ->nullable();
            $table->date('date')
                  ->nullable();
            $table->integer('inventory_id')
                  ->unsigned()
                  ->nullable();
            $table->boolean('isGood')
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

            $table->foreign('inventory_id')
                  ->references('id')
                  ->on('inventories')
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
        Schema::dropIfExists('facility_checkings');
    }
}
