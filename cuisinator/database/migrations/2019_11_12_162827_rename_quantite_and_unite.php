<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameQuantiteAndUnite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('Quantite', function (Blueprint $table) {
            $table->dropForeign('Quantite_id_recette_foreign');
            $table->dropForeign('Quantite_id_aliment_foreign');
            $table->dropForeign('Quantite_id_unite_foreign');
        });

        Schema::rename('Quantite', 'quantites');
        Schema::rename('Unite','unites');

        Schema::table('quantites', function (Blueprint $table) {
            $table->foreign('id_recette')->references('id')->on('recettes');
            $table->foreign('id_aliment')->references('id')->on('aliments');
            $table->foreign('id_unite')->references('id')->on('unites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quantites', function (Blueprint $table) {
            $table->dropForeign('quantites_id_recette_foreign');
            $table->dropForeign('quantites_id_aliment_foreign');
            $table->dropForeign('quantites_id_unite_foreign');
        });

        Schema::rename('quantites', 'Quantite');
        Schema::rename('unites','Unite');

        Schema::table('Quantite', function (Blueprint $table) {
            $table->foreign('id_recette')->references('id')->on('recettes');
            $table->foreign('id_aliment')->references('id')->on('aliments');
            $table->foreign('id_unite')->references('id')->on('Unite');
        });
    }
}
