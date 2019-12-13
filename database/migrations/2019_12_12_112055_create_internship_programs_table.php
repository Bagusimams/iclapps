<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')
                  ->nullable();
            $table->date('start_date')
                  ->nullable();
            $table->date('end_date')
                  ->nullable();
            $table->boolean('is_active')
                  ->default(1)
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
        Schema::dropIfExists('internship_programs');
    }
}
