<?php

use Illuminate\Database\Seeder;
use App\Recette;

class RecettesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = new Recette();
        $r1->nom = 'Guacamole';
        $r1->description = 'Le guacamole accompagne parfaitement chips, nachos ou biscuits salés. Laissez le noyau dans le guacamole pour le conserver plus longtemps ! ';
        $r1->nom_photo = 'guacamole.jpg';
        $r1->id_createur = 1;
        $r1->steps = '1. Ecrasez les avocats à l\'aide d\'une fourchette.\n2. Mélangez les ingrédients.\n3. Savourez!';
        $r1->save();
    }
}
