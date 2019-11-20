<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    public function aliments(){
        return $this->belongsToMany('App\Aliment', 'quantites', 'id_recette', 'id_aliment')
        ->as('quantites')
        ->using('App\Quantite')
        ->withPivot('qte','id_unite');
    }
}
