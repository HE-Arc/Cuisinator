<?php

use App\Aliment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlimentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a1 = new Aliment();
        $a1->nom = 'Avocat';
        $a1->id_createur = 1;
        $a1->save();

        $a2 = new Aliment();
        $a2->nom = 'Jus de citron';
        $a2->id_createur = 1;
        $a2->save();

        $a3 = new Aliment();
        $a3->nom = 'Jus de citron vert';
        $a3->id_createur = 1;
        $a3->save();

        $a4 = new Aliment();
        $a4->nom = 'Sel';
        $a4->id_createur = 1;
        $a4->save();

        $a5 = new Aliment();
        $a5->nom = 'Poivre';
        $a5->id_createur = 1;
        $a5->save();

        $a6 = new Aliment();
        $a6->nom = 'Sucre';
        $a6->id_createur = 1;
        $a6->save();
    }
}
