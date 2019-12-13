<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role')
                  ->nullable();
            $table->string('role_id')
                  ->nullable();
            $table->string('name')
                  ->nullable();
            $table->string('phone_number')
                  ->nullable();
            $table->integer('inventory_id')
                  ->unsigned()
                  ->nullable();
            $table->integer('status')
                  ->unsigned()
                  ->default(0)
                  ->comment('0 -> not checked, 1 -> rented, 2 -> returned')
                  ->nullable();
            $table->string('purpose')
                  ->nullable();
            $table->integer('isApproved')
                  ->nullable()
                  ->comment('0 -> not approved yet, 1 -> approved, 2 -> not approved')
                  ->default(0);
            $table->string('notes')
                  ->nullable();

            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('inventory_bookings');
    }
}
