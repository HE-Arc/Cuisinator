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
        $a1->nom_photo = 'avocat.jpg';
        $a1->save();

        $a2 = new Aliment();
        $a2->nom = 'Jus de citron';
        $a2->id_createur = 1;
        $a2->nom_photo = 'jus-citron.jpg';
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

        $a7 = new Aliment();
        $a7->nom = 'Crème liquide';
        $a7->id_createur = 1;
        $a7->nom_photo = '67338_w100h100c1cx350cy350.jpg';
        $a7->save();

        $a8 = new Aliment();
        $a8->nom = 'Carotte';
        $a8->id_createur = 1;
        $a8->nom_photo = '67370_w100h100c1cx350cy350.jpg';
        $a8->save();

        $a9 = new Aliment();
        $a9->nom = 'Lait';
        $a9->id_createur = 1;
        $a9->nom_photo = '67388_w100h100c1cx350cy350.jpg';
        $a9->save();

        $a10 = new Aliment();
        $a10->nom = 'Pomme de terre';
        $a10->id_createur = 1;
        $a10->nom_photo = '67419_w100h100c1cx350cy350.jpg';
        $a10->save();

        $a11 = new Aliment();
        $a11->nom = 'Ail';
        $a11->id_createur = 1;
        $a11->nom_photo = '67514_w100h100c1cx350cy350.jpg';
        $a11->save();

        $a12 = new Aliment();
        $a12->nom = 'Bouillon de poulet';
        $a12->id_createur = 1;
        $a12->nom_photo = '67586_w100h100c1cx350cy350.jpg';
        $a12->save();

        $a13 = new Aliment();
        $a13->nom = 'Oignon';
        $a13->id_createur = 1;
        $a13->nom_photo = '67621_w100h100c1cx350cy350.jpg';
        $a13->save();

        $a14 = new Aliment();
        $a14->nom = 'Persil';
        $a14->id_createur = 1;
        $a14->nom_photo = '67650_w100h100c1cx350cy350.jpg';
        $a14->save();
        
        $a15 = new Aliment();
        $a15->nom = 'Muscade';
        $a15->id_createur = 1;
        $a15->nom_photo = '67662_w100h100c1cx350cy350.jpg';
        $a15->save();

        $a16 = new Aliment();
        $a16->nom = 'Potiron';
        $a16->id_createur = 1;
        $a16->nom_photo = '67669_w100h100c1cx350cy350.jpg';
        $a16->save();

        $a17 = new Aliment();
        $a17->nom = 'Farine';
        $a17->id_createur = 1;
        $a17->nom_photo = '67682_w100h100c1cx350cy350.jpg';
        $a17->save();

        $a18 = new Aliment();
        $a18->nom = 'Eau';
        $a18->id_createur = 1;
        $a18->nom_photo = '4032097-le-verre-deau-verre-deau-png-300_240.png';
        $a18->save();

        $a19 = new Aliment();
        $a19->nom = 'Huile d\'olive';
        $a19->id_createur = 1;
        $a19->nom_photo = 'i90929-.jpeg';
        $a19->save();

        $a20 = new Aliment();
        $a20->nom = 'Levure';
        $a20->id_createur = 1;
        $a20->nom_photo = 'Fotolia_54848946_S_levure_boulanger.jpg';
        $a20->save();

        $a21 = new Aliment();
        $a21->nom = 'Chocolat';
        $a21->id_createur = 1;
        $a21->nom_photo = '67423_w100h100c1cx350cy350.jpg';
        $a21->save();

        $a22 = new Aliment();
        $a22->nom = 'Oeuf';
        $a22->id_createur = 1;
        $a22->nom_photo = '67505_w100h100c1cx350cy350.jpg';
        $a22->save();

        $a23 = new Aliment();
        $a23->nom = 'Beurre doux';
        $a23->id_createur = 1;
        $a23->nom_photo = '68919_w100h100c1cxt0cyt0cxb300cyb300.jpg';
        $a23->save();

        $a24 = new Aliment();
        $a24->nom = 'Spaghetti';
        $a24->id_createur = 1;
        $a24->nom_photo = '2202014_1010_5_x700.jpg';
        $a24->save();

        $a25 = new Aliment();
        $a25->nom = 'Pecorino Romano';
        $a25->id_createur = 1;
        $a25->nom_photo = '12-pecorino-romano_001.jpg';
        $a25->save();

        $a26 = new Aliment();
        $a26->nom = 'Joue de porc séchée';
        $a26->id_createur = 1;
        $a26->nom_photo = 'guanciale.jpg';
        $a26->save();

        $a27 = new Aliment();
        $a27->nom = 'Jaune d\'oeuf';
        $a27->id_createur = 1;
        $a27->nom_photo = 'jaune_oeuf.jpg';
        $a27->save();
    }
}
