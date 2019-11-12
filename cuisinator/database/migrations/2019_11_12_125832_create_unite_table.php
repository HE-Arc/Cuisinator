<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Unite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('abbrv');
            $table->float('multiple', 10,2);
            $table->unsignedBigInteger('id_type')->nullable();
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
        Schema::dropIfExists('Unite');
    }
}
