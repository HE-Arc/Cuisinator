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
        $unite = new Unite();
        $unite->nom = 'Kilogramme';
        $unite->abbrv = 'kg';
        $unite->multiple = 1;
        $unite->save();

        
        $unite = new Unite();
        $unite->nom = 'Gramme';
        $unite->abbrv = 'g';
        $unite->multiple = 1000;
        $unite->id_type = DB::table('unites')->where('nom', '=', 'Kilogramme')->first()->id;
        $unite->save();

        $unite = new Unite();
        $unite->nom = 'Litre';
        $unite->abbrv = 'l';
        $unite->multiple = 1;
        $unite->save();

        $unite = new Unite();
        $unite->nom = 'Cuillère à soupe (liquide)';
        $unite->abbrv = 'cs (l)';
        $unite->multiple = 66.6;
        $unite->id_type =  DB::table('unites')->where('nom', '=', 'Litre')->first()->id;
        $unite->save();
    
        $unite = new Unite();
        $unite->nom = 'Cuillère à soupe (solide)';
        $unite->abbrv = 'cs (s)';
        $unite->multiple = 66.6;
        $unite->id_type =  DB::table('unites')->where('nom', '=', 'Kilogramme')->first()->id;
        $unite->save();
    
        
        $unite = new Unite();
        $unite->nom = 'Cuillère à café (liquide)';
        $unite->abbrv = 'càc (l)';
        $unite->multiple = 200;
        $unite->id_type =  DB::table('unites')->where('nom', '=', 'Litre')->first()->id;
        $unite->save();
    
        $unite = new Unite();
        $unite->nom = 'Cuillère à café (solide)';
        $unite->abbrv = 'càc (s)';
        $unite->multiple = 200;
        $unite->id_type =  DB::table('unites')->where('nom', '=', 'Kilogramme')->first()->id;
        $unite->save();

        $unite = new Unite();
        $unite->nom = 'Millilitre';
        $unite->abbrv = 'ml';
        $unite->multiple = 1000;
        $unite->id_type = DB::table('unites')->where('nom', '=', 'Litre')->first()->id;
        $unite->save();
    }
}
