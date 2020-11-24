<?php

use Illuminate\Support\Facades\Schema;
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
            $table->Increments('id');
            //Foreign key Down//
            $table->unsignedInteger('program_id')->nullable()->default(null);
            $table->foreign('program_id')->references('program_id')->on('programs');

            $table->unsignedInteger('faculty_id')->nullable()->default(null);
            $table->foreign('faculty_id')->references('faculty_id')->on('faculties');

            $table->unsignedInteger('year_id')->nullable()->default(null);
            $table->foreign('year_id')->references('id')->on('years');

            $table->unsignedInteger('semester_id')->nullable()->default(null);
            $table->foreign('semester_id')->references('id')->on('semesters');

            $table->unsignedInteger('admission_year_id')->nullable()->default(null);
            $table->foreign('admission_year_id')->references('id')->on('admission_years');
            //Up Foreign Key//
            $table->string('name');
            $table->string('student_phone');
            $table->string('email',100)->unique();
            $table->longtext('permanent_address');
            $table->longtext('current_address');
            $table->date('dob');
            $table->string('gender');      
            $table->string('parents_name');
            $table->string('parents_phone');
            $table->string('total_fees');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('students');
    }
}
