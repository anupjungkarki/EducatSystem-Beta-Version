<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_accesses', function (Blueprint $table) {
           $table->Increments('id');
            $table->unsignedInteger('user_role_id')->nullable()->default(null);
            $table->foreign('user_role_id')->references('id')->on('user_roles');
            $table->unsignedInteger('module_id')->nullable()->default(null);
            $table->foreign('module_id')->references('id')->on('modules');
            $table->boolean('view')->default(0);
            $table->boolean('add')->default(0);
            $table->boolean('edit')->default(0);
            $table->boolean('delete')->default(0);
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
        Schema::dropIfExists('user_accesses');
    }
}
