<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('faculty_id')->nullable()->default(null);
            $table->foreign('faculty_id')->references('faculty_id')->on('faculties');
            $table->string('teacher_name');
            $table->string('teacher_status');
            $table->string('teacher_email',100)->unique();
            $table->string('teacher_address');
            $table->string('contact_number');
            $table->string('subject');
            $table->date('join_year');
            $table->string('gender');
            $table->string('t_description');
            $table->string('address');
            $table->string('upload_image')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
