<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCatogeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_catogeries', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('faculty_id')->nullable()->default(null);
            $table->foreign('faculty_id')->references('faculty_id')->on('faculties');
            $table->unsignedInteger('program_id')->nullable()->default(null);
            $table->foreign('program_id')->references('program_id')->on('programs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_catogeries');
    }
}
