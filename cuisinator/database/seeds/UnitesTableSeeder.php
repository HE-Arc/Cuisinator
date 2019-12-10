<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Unite;

class UnitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unite1 = new Unite();
        $unite1->nom = 'Kilogramme';
        $unite1->abbrv = 'kg';
        $unite1->multiple = 1;
        $unite1->save();

        $unite2 = new Unite();
        $unite2->nom = 'Gramme';
        $unite2->abbrv = 'g';
        $unite2->multiple = 1000;
        $unite2->id_type = DB::table('unites')->where('nom', '=', 'Kilogramme')->first()->id;
        $unite2->save();

        $unite3 = new Unite();
        $unite3->nom = 'Litre';
        $unite3->abbrv = 'l';
        $unite3->multiple = 1;
        $unite3->save();

        $unite4 = new Unite();
        $unite4->nom = 'Cuillère à soupe (liquide)';
        $unite4->abbrv = 'cs (l)';
        $unite4->multiple = 66.6;
        $unite4->id_type =  DB::table('unites')->where('nom', '=', 'Litre')->first()->id;
        $unite4->save();

        $unite5 = new Unite();
        $unite5->nom = 'Cuillère à soupe (solide)';
        $unite5->abbrv = 'cs (s)';
        $unite5->multiple = 66.6;
        $unite5->id_type =  DB::table('unites')->where('nom', '=', 'Kilogramme')->first()->id;
        $unite5->save();

        $unite6 = new Unite();
        $unite6->nom = 'Cuillère à café (liquide)';
        $unite6->abbrv = 'càc (l)';
        $unite6->multiple = 200;
        $unite6->id_type =  DB::table('unites')->where('nom', '=', 'Litre')->first()->id;
        $unite6->save();

        $unite7 = new Unite();
        $unite7->nom = 'Cuillère à café (solide)';
        $unite7->abbrv = 'càc (s)';
        $unite7->multiple = 200;
        $unite7->id_type =  DB::table('unites')->where('nom', '=', 'Kilogramme')->first()->id;
        $unite7->save();

        $unite8 = new Unite();
        $unite8->nom = 'Millilitre';
        $unite8->abbrv = 'ml';
        $unite8->multiple = 1000;
        $unite8->id_type = DB::table('unites')->where('nom', '=', 'Litre')->first()->id;
        $unite8->save();

        $unite9 = new Unite();
        $unite9->nom = 'Pièce';
        $unite9->abbrv = 'pce';
        $unite9->multiple = 1;
        $unite9->save();
    }
}
