<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Recette extends Model
{/*
    public function aliments(){
        return $this->belongsToMany('App\Aliment', 'quantites', 'id_recette', 'id_aliment')
        ->as('quantites')
        ->using('App\Quantite')
        ->withPivot('qte','id_unite');
    }*/

    public function aliments(){
        return $this->belongsToMany('App\Aliment','quantites', 'id_recette','id_aliment')
            ->withPivot('qte')
            ->join('unites','id_unite','=','unites.id')
            ->select("aliments.nom");    
    }

    public static function getAllAliments(){
        return DB::table('aliments')
        ->join('quantites', 'quantites.id_aliment', '=', 'aliments.id')
        ->join('recettes','quantites.id_recette','=','recettes.id')
        ->join('unites','quantites.id_unite','=','unites.id')
        ->select('recettes.nom', 'recettes.description',
        'recettes.nom_photo', 'recettes.steps',
        'aliments.id', 'aliments.nom', 'quantites.qte',
        'unites.nom')
        ->get();
    }

    public static function allWithCreatorName(){
        return DB::table('recettes')
        ->join('users', 'users.id', '=', 'recettes.id_createur')
        ->select('users.name AS username','recettes.id','recettes.nom','recettes.nom_photo', 'recettes.description', 'recettes.steps')
        ->get();
    }
}
