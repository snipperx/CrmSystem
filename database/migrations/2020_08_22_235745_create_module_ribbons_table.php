<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleRibbonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_ribbons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_id')->nullable();
            $table->integer('sort_order')->nullable();
            $table->integer('access_level')->nullable();
            $table->integer('active')->default(1);
            $table->string('ribbon_name')->nullable();
            $table->string('ribbon_path')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('module_ribbons');
    }
}
