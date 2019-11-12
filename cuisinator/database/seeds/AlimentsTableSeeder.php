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
    }
}
