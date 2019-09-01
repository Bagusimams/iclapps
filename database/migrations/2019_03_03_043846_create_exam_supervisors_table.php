<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_supervisors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role')
                  ->nullable();
            $table->string('role_id')
                  ->nullable();
            $table->string('name')
                  ->nullable();
            $table->string('nim')
                  ->nullable();
            $table->string('batch_year')
                  ->nullable();
            $table->string('phone_number')
                  ->nullable();
            $table->string('email')
                  ->nullable();
            $table->string('english_score')
                  ->nullable();
            $table->string('type')
                  ->nullable();
            $table->string('certificate_file')
                  ->nullable();
            $table->integer('status')
                  ->default(0)
                  ->comment('0 -> not checked, 1 -> accepted, 2 -> rejected')
                  ->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_supervisors');
    }
}
