<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummerSchoolPresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summer_school_pres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lecturer_id')
                  ->unsigned()
                  ->nullable();
            $table->integer('summer_school_id')
                  ->unsigned()
                  ->nullable();
            $table->string('pic')
                  ->nullable();
            $table->boolean('ensure')
                  ->default(0)
                  ->nullable();
            $table->boolean('confirm')
                  ->default(0)
                  ->nullable();
            $table->boolean('escort')
                  ->default(0)
                  ->nullable();
            $table->boolean('reintroduce')
                  ->default(0)
                  ->nullable();
            $table->boolean('meet')
                  ->default(0)
                  ->nullable();
            $table->boolean('make')
                  ->default(0)
                  ->nullable();
            $table->boolean('monitor')
                  ->default(0)
                  ->nullable();
            $table->boolean('remind')
                  ->default(0)
                  ->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lecturer_id')
                  ->references('id')
                  ->on('lecturers')
                  ->onDelete('cascade');

            $table->foreign('summer_school_id')
                  ->references('id')
                  ->on('summer_schools')
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
        Schema::dropIfExists('summer_school_pres');
    }
}
