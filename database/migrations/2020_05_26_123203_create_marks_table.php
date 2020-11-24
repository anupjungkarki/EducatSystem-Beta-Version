<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('subject_id')->nullable()->default(null);
            $table->foreign('subject_id')->references('id')->on('program_courses');

            $table->unsignedInteger('symbol_number_id')->nullable()->default(null);
            $table->foreign('symbol_number_id')->references('id')->on('symbol_numbers');

            $table->unsignedInteger('symbol_number_category_id')->nullable()->default(null);
            $table->foreign('symbol_number_category_id')->references('id')->on('symbol_number_catogeries');

            $table->string('marks')->nullable();
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
        Schema::dropIfExists('marks');
    }
}
