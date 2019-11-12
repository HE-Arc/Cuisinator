<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 64);
            $table->text('description');
            $table->string('nom_photo', 32);
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
        Schema::dropIfExists('recettes');
    }
}
