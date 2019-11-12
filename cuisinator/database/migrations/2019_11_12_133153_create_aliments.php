<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAliments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aliments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom', 64)->index();
            $table->string('nom_photo', 32)->nullable();
            $table->unsignedBigInteger('id_createur');

            $table->timestamps();

            $table->foreign('id_createur')->references('id')->on('users');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aliments');
    }
}
