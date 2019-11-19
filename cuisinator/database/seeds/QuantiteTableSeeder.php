<?php

use Illuminate\Database\Seeder;
use App\Quantite;

class QuantiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Pour le guacamole!
        //Avocat
        $q1 = new Quantite();
        $q1->id_recette = 1;
        $q1->id_aliment = 1;
        $q1->id_unite = 9; //Pièces
        $q1->qte = 2;
        $q1->save();

        //Citron
        $q1 = new Quantite();
        $q1->id_recette = 1;
        $q1->id_aliment = 2;
        $q1->id_unite = 6; //càc (liquide)
        $q1->qte = 1;
        $q1->save();

        //Sel
        $q1 = new Quantite();
        $q1->id_recette = 1;
        $q1->id_aliment = 4;
        $q1->id_unite = 7; //càc (solide)
        $q1->qte = 0.5;
        $q1->save();
    }
}
