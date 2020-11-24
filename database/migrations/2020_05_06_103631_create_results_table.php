<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('result_id');
            $table->integer('faculty_id')->unsigned();
            $table->string('faculty');
            $table->string('year');
            $table->string('semester');
            $table->integer('program_id');
            $table->string('program');
            $table->integer('symbol_no');
            $table->string('name');
            $table->string('email',100)->unique();
            $table->string('total_marks');
            $table->string('total_percentage');
            $table->string('remarks');
            $table->string('sub1_name');
            $table->string('sub1_marks');
            $table->string('sub2_name');
            $table->string('sub2_marks');
            $table->string('sub3_name');
            $table->string('sub3_marks');
            $table->string('sub4_name');
            $table->string('sub4_marks');
            $table->string('sub5_name');
            $table->string('sub5_marks');
            $table->string('sub6_name');
            $table->string('sub6_marks');
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
        Schema::dropIfExists('results');
    }
}
