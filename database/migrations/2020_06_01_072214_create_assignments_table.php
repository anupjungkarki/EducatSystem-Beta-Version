<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->Increments('id');

            $table->unsignedInteger('faculty_id')->nullable()->default(null);
            $table->foreign('faculty_id')->references('faculty_id')->on('faculties');

            $table->unsignedInteger('program_id')->nullable()->default(null);
            $table->foreign('program_id')->references('program_id')->on('programs');
             
            $table->unsignedInteger('semester_id')->nullable()->default(null);
            $table->foreign('semester_id')->references('id')->on('semesters');

            $table->unsignedInteger('year_id')->nullable()->default(null);
            $table->foreign('year_id')->references('id')->on('years');

            $table->string('assignment_title');
            $table->longtext('message_to_student');
            $table->date('deadline');
            $table->string('assignment_subject');
            $table->string('teacher_name');
            $table->string('upload_file')->nullable();

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
        Schema::dropIfExists('assignments');
    }
}
