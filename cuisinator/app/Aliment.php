<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aliment extends Model
{
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
