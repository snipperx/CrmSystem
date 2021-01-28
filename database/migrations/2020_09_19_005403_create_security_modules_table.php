<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('security_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->integer('active')->nullable();
            $table->string('font_awesome')->nullable();
            $table->string('glyph_icon')->nullable();
            $table->timestamps();
        });


        $table->foreign('permission_id')
            ->references('id')
            ->on($tableNames['permissions'])
            ->onDelete('cascade');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('security_modules');
    }
}
