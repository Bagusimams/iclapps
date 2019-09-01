<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('complaint_id')
                  ->unsigned()
                  ->nullable();
            $table->integer('staff_id')
                  ->unsigned()
                  ->nullable();
            $table->date('date')
                  ->nullable();
            $table->text('action')
                  ->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('complaint_id')
                  ->references('id')
                  ->on('complaints')
                  ->onDelete('cascade');

            $table->foreign('staff_id')
                  ->references('id')
                  ->on('staff')
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
        Schema::dropIfExists('complaint_actions');
    }
}
