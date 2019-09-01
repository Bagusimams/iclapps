<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role')
                  ->nullable();
            $table->string('role_id')
                  ->nullable();
            $table->string('name')
                  ->nullable();
            $table->string('identity_number')
                  ->comment('nim/nip')
                  ->nullable();
            $table->integer('school_id')
                  ->unsigned()
                  ->nullable();
            $table->integer('major_id')
                  ->unsigned()
                  ->nullable();
            $table->string('phone_number')
                  ->nullable();
            $table->string('email')
                  ->nullable();
            $table->date('date')
                  ->nullable();
            $table->text('comment')
                  ->nullable();
            $table->string('complaint_type')
                  ->comment('lecturer/facilities')
                  ->nullable();
            $table->text('reason')
                  ->nullable();
            $table->integer('isDone')
                  ->comment('0 -> on progress, 1 -> done, 2 -> rejected')
                  ->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('school_id')
                  ->references('id')
                  ->on('schools')
                  ->onDelete('cascade');

            $table->foreign('major_id')
                  ->references('id')
                  ->on('majors')
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
        Schema::dropIfExists('complaints');
    }
}
