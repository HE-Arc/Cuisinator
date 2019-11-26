<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aliment extends Model
{
    protected $fillable = ['nom', 'nom_photo', 'id_createur'];

    public static function allWithCreatorName(){
        return Aliment::join('users', 'users.id', '=', 'aliments.id_createur')
        ->select('users.name AS username','aliments.id','aliments.nom','aliments.nom_photo')
        ->get();
    }
    public function recettes(){
        return $this->belongsToMany('App\Recette', 'quantites', 'id_aliment','id_recette')
        ->as('quantites')
        ->using('App\Quantite')
        ->withPivot('qte', 'id_unite');
    }

    public function creator(){
        return $this->belongsTo('App\Users');
    }
}
