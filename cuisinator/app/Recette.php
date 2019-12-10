<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class Recette extends Model
{/*
    public function aliments(){
        return $this->belongsToMany('App\Aliment', 'quantites', 'id_recette', 'id_aliment')
        ->as('quantites')
        ->using('App\Quantite')
        ->withPivot('qte','id_unite');
    }*/

    protected $fillable = ['nom_photo'];
    public function aliments(){
        return $this->belongsToMany('App\Aliment','quantites', 'id_recette','id_aliment')
            ->as('quantites')
            ->using('App\Quantite')
            ->withPivot('qte', 'id_unite')
            ->withTimestamps();
    }

    public function creator(){
        return $this->belongsTo('App\User', 'id_createur');
    }

    public static function insertRecette(Request $request){


        $newRecette = new Recette;
        $newRecette->nom = $request->nom;
        $newRecette->description = $request->description;
        $newRecette->nom_photo = $request->nom_photo;
        $newRecette->id_createur = $request->id_createur;
        $newRecette->steps = $request->steps;
 
        $newRecette->save();

        foreach ($request->recette as $quantity){
            $newRecette->aliments()->attach(Aliment::find($quantity['aliment']), ['id_unite' => $quantity['unite'], 'qte' => $quantity['quantite']]);
        }
    }

    /**
     * @param $alimentsIDs array containing the IDs of all the aliments
     * @return mixed The corresponding recipes
     */
    public static function getRecetteContainingAliments($alimentsIDs){
//        $recipes = DB::table('recettes')
//            ->join('quantites', 'recettes.id', '=', 'quantites.id_recette')
//            ->whereIn('quantites.id_aliment', $alimentsIDs)
//            ->select('recettes.id', 'recettes.nom', 'recettes.id_createur', 'recettes.nom_photo', 'recettes.description', 'recettes.steps')
//            ->distinct()
//            ->get();
//
//        $recipes = Recette::all()
//                            -> belongsToMany('App\Quantite')
//                            -> whereIn('quantites.id_aliment', $alimentsIDs)
//                            -> distinct()
//                            -> get();
        $recipes = Recette::whereHas('aliments', function($q) use($alimentsIDs) {
            $q->whereIn('id', $alimentsIDs);
        })->get();

        return $recipes;
    }
}
