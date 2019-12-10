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

        //Pour le pain!
        //Farine
        $q2 = new Quantite();
        $q2->id_recette = 2;
        $q2->id_aliment = 17;
        $q2->id_unite = 2; //Gramme
        $q2->qte = 500;
        $q2->save();

        //Levure
        $q2 = new Quantite();
        $q2->id_recette = 2;
        $q2->id_aliment = 20;
        $q2->id_unite = 9; //Pièces
        $q2->qte = 1;
        $q2->save();

        //Eau
        $q2 = new Quantite();
        $q2->id_recette = 2;
        $q2->id_aliment = 18;
        $q2->id_unite = 8; //ml
        $q2->qte = 300;
        $q2->save();

        //Sel
        $q2 = new Quantite();
        $q2->id_recette = 2;
        $q2->id_aliment = 4;
        $q2->id_unite = 7;//cc solide
        $q2->qte = 1;
        $q2->save();

        //Huile d'olive
        $q2 = new Quantite();
        $q2->id_recette = 2;
        $q2->id_aliment = 19;
        $q2->id_unite = 4; //cs liquide
        $q2->qte = 1;
        $q2->save();

        //Pour le velouté de potiron!
        //Potiron
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 16;
        $q3->id_unite = 1; //Kilogramme
        $q3->qte = 1;
        $q3->save();

        //Carotte
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 8;
        $q3->id_unite = 2; //Gramme
        $q3->qte = 500;
        $q3->save();

        //Pomme de terre
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 10;
        $q3->id_unite = 9; //Piece
        $q3->qte = 2;
        $q3->save();

        //Ail
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 11;
        $q3->id_unite = 9; //Piece
        $q3->qte = 1;
        $q3->save();

        //Oignon
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 13;
        $q3->id_unite = 9; //Piece
        $q3->qte = 1;
        $q3->save();

        //Lait
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 9;
        $q3->id_unite = 3; //Litre
        $q3->qte = 0.5;
        $q3->save();

        //Bouillon
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 12;
        $q3->id_unite = 3; //Litre
        $q3->qte = 0.5;
        $q3->save();

        //Huile olive
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 19;
        $q3->id_unite = 4; //cs liquide
        $q3->qte = 1;
        $q3->save();

        //Persil
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 14;
        $q3->id_unite = 9; //Pièce
        $q3->qte = 1;
        $q3->save();
        
        //Sel
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 4;
        $q3->id_unite = 9; //Pièce
        $q3->qte = 1;
        $q3->save();

        //Poivre
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 5;
        $q3->id_unite = 9; //Pièce
        $q3->qte = 1;
        $q3->save();

        //Muscade
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 15;
        $q3->id_unite = 9; //Pièce
        $q3->qte = 1;
        $q3->save();

        //Crème liquide
        $q3 = new Quantite();
        $q3->id_recette = 3;
        $q3->id_aliment = 7;
        $q3->id_unite = 8; //ml
        $q3->qte = 100;
        $q3->save();

        //Pour le gateau au chocolat
        //Chocolat
        $q4 = new Quantite();
        $q4->id_recette = 4;
        $q4->id_aliment = 21;
        $q4->id_unite = 2; //g
        $q4->qte = 200;
        $q4->save();

        //Oeuf
        $q4 = new Quantite();
        $q4->id_recette = 4;
        $q4->id_aliment = 22;
        $q4->id_unite = 9; //pcs
        $q4->qte = 4;
        $q4->save();

        //Oeuf
        $q4 = new Quantite();
        $q4->id_recette = 4;
        $q4->id_aliment = 23;
        $q4->id_unite = 2; //g
        $q4->qte = 125;
        $q4->save();

        //Sucre
        $q4 = new Quantite();
        $q4->id_recette = 4;
        $q4->id_aliment = 6;
        $q4->id_unite = 2; //pcs
        $q4->qte = 200;
        $q4->save();

        //Farine
        $q4 = new Quantite();
        $q4->id_recette = 4;
        $q4->id_aliment = 17;
        $q4->id_unite = 2; //pcs
        $q4->qte = 100;
        $q4->save();

        //Levure
        $q4 = new Quantite();
        $q4->id_recette = 4;
        $q4->id_aliment = 20;
        $q4->id_unite = 9; //pcs
        $q4->qte = 1;
        $q4->save();

        //Eau
        $q4 = new Quantite();
        $q4->id_recette = 4;
        $q4->id_aliment = 18;
        $q4->id_unite = 4; //cs liquide
        $q4->qte = 3;
        $q4->save();

        //Pour les carbo
        //Spaghetti
        $q5 = new Quantite();
        $q5->id_recette = 5;
        $q5->id_aliment = 24;
        $q5->id_unite = 2; //g
        $q5->qte = 400;
        $q5->save();

        //Pecorino Romano
        $q5 = new Quantite();
        $q5->id_recette = 5;
        $q5->id_aliment = 25;
        $q5->id_unite = 2; //g
        $q5->qte = 200;
        $q5->save();

        //Joue de porc
        $q5 = new Quantite();
        $q5->id_recette = 5;
        $q5->id_aliment = 26;
        $q5->id_unite = 2; //g
        $q5->qte = 150;
        $q5->save();

        //Jaune d'oeuf
        $q5 = new Quantite();
        $q5->id_recette = 5;
        $q5->id_aliment = 27;
        $q5->id_unite = 9; //pcs
        $q5->qte = 4;
        $q5->save();

        //Oeuf
        $q5 = new Quantite();
        $q5->id_recette = 5;
        $q5->id_aliment = 22;
        $q5->id_unite = 9; //pcs
        $q5->qte = 1;
        $q5->save();

        //Poivre
        $q5 = new Quantite();
        $q5->id_recette = 5;
        $q5->id_aliment = 5;
        $q5->id_unite = 9; //pcs
        $q5->qte = 1;
        $q5->save();

        //Sel
        $q5 = new Quantite();
        $q5->id_recette = 5;
        $q5->id_aliment = 4;
        $q5->id_unite = 9; //pcs
        $q5->qte = 1;
        $q5->save();

        //Sel
        $q5 = new Quantite();
        $q5->id_recette = 5;
        $q5->id_aliment = 10;
        $q5->id_unite = 4; //cs liquide
        $q5->qte = 1;
        $q5->save();
    }
}
