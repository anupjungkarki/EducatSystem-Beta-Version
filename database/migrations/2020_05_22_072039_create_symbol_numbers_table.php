<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSymbolNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symbol_numbers', function (Blueprint $table) {
             $table->Increments('id');
             $table->string('symbol_number',100);
             $table->unsignedInteger('symbol_number_category_id')->nullable()->default(null);
             $table->foreign('symbol_number_category_id')->references('id')->on('symbol_number_catogeries');
             $table->unsignedInteger('student_id')->nullable()->default(null);
             $table->foreign('student_id')->references('id')->on('students');
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
        Schema::dropIfExists('symbol_numbers');
    }
}
