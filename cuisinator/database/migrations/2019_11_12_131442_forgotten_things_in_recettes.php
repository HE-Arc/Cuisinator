<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForgottenThingsInRecettes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recettes', function (Blueprint $table) {
            $table->renameColumn('name', 'nom');
            $table->index('nom');
            $table->string('nom_photo', 32)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recettes', function (Blueprint $table) {
            $table->string('nom_photo', 32)->nullable(false)->change();
            $table->dropIndex(['nom']);
            $table->renameColumn('nom', 'name');
        });
    }
}
