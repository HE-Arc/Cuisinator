<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aliment extends Model
{
    protected $fillable = ['nom', 'nom_photo', 'id_createur'];

    public static function allWithCreatorName(){
        return DB::table('aliments')
        ->join('users', 'users.id', '=', 'aliments.id_createur')
        ->select('users.name AS username','aliments.id','aliments.nom','aliments.nom_photo')
        ->get();
    }/*
    public function recettes(){
        return $this->belongsToMany('App\Recette', 'quantites', 'id_aliment','id_recette')
        ->as('quantites')
        ->using('App\Quantite')
        ->withPivot('qte', 'id_unite');
    }*/

    public function creator(){
        return $this->belongsTo('App\Users');
    }

    public function recettes(){
        return $this->belongsToMany('App\Recette','quantites', 'id_recette','id_aliment');
    }
}
