<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('batch_year')
                  ->nullable();
            $table->string('nim')
                  ->nullable();
            $table->string('name')
                  ->nullable();
            $table->integer('school_id')
                  ->unsigned()
                  ->nullable();
            $table->integer('major_id')
                  ->unsigned()
                  ->nullable();
            $table->string('phone_number')
                  ->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            
            $table->rememberToken();
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
        Schema::drop('students');
    }
}
