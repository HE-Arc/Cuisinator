<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyQuantiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Quantite', function (Blueprint $table) {
            $table->foreign('id_recette')->references('id')->on('Recette');
            $table->foreign('id_aliment')->references('id')->on('Aliment');
            $table->foreign('id_unite')->references('id')->on('Unite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Quantite', function (Blueprint $table) {
            $table->dropForeign('Quantite_id_recette_foreign');
            $table->dropForeign('Quantite_id_aliment_foreign');
            $table->dropForeign('Quantite_id_unite_foreign');
        });
    }
}
