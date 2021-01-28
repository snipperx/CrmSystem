<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id');
          //  $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->integer('user_id')->nullable();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('access_level')->nullable();
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('module_accesses');
    }
}
