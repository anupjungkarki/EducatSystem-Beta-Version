<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_courses', function (Blueprint $table) {
             $table->Increments('id');
             $table->unsignedInteger('course_catogery_id')->nullable()->default(null);
             $table->foreign('course_catogery_id')->references('id')->on('course_catogeries');
             $table->unsignedInteger('semester_id')->nullable()->default(null);
             $table->foreign('semester_id')->references('id')->on('semesters');
             $table->unsignedInteger('year_id')->nullable()->default(null);
             $table->foreign('year_id')->references('id')->on('years');
             $table->string('subject_code');
             $table->string('subject_name');
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
        Schema::dropIfExists('program_courses');
    }
}
