<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aliment extends Model
{
    protected $fillable = ['nom', 'nom_photo', 'id_createur'];

    public function creator(){
        return $this->belongsTo('App\User', 'id_createur');
    }

    public function recettes(){
        return $this->belongsToMany('App\Recette', 'quantites', 'id_aliment','id_recette')
        ->as('quantites')
        ->using('App\Quantite')
        ->withPivot('qte', 'id_unite')
        ->withTimestamps();
    }
}
